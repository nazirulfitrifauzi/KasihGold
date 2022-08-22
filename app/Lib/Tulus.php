<?php

// SnapNPay SDK, for both Tulus and SnapNPay
// This is the v2 SDK that is streamlined for more working features.
// New 2021 code should use Tulus.php, which uses more streamlined API.

namespace \app\Lib;

const DEFAULT_REPORT_ENDPOINT = 'https://reports.tulus.my';
const DEFAULT_PAYMENT_ENDPOINT = 'https://tulus.my';

if (!in_array('curl', get_loaded_extensions())) {
    die("libcurl should be enabled in PHP\n");
}

class LoginException extends \Exception {}
class DeprecatedException extends \Exception {}
class HttpsException extends \Exception {}

class Tulus
{
    private $report_endpoint = '';
    private $payment_endpoint = '';

    // Three methods to auth, "token" or "apikey", "authtoken".
    // The difference between "token" and "authtoken" is how it is obtained.
    // "token" used to be obtained by querying and logging in to with a user and password
    //
    // "token" is being deprecated, and you should obtained the AuthToken
    // by logging into the Merchant dashboard at https://reports.tulus.my/
    // and getting the AuthToken copied to clipboard from the top right menu,
    // "Copy AuthToken to Clipboard"
    private $token = ''; // Any usage of will trigger DeprecatedException

    // But "authtoken" is the correct new way, to support multiagency reports
    // seamlessly.
    private $authtoken = '';

    // API key is a 128bit key used to HMAC sign requests. Specified as the "signature" key.
    // Note that you *have* to pass the "agency" field as the key
    // This is not recommended for reports, as it does not allow reports across
    // different related agencies.
    private $apikey = '';
    private $agency = '';

    private $API_CALLS = array(
        'report.payment' => '/api/report/v1/payment',
        'report.fpxrequest' => '/api/report/v1/fpxrequest',
        'report.transactions' => '/api/user/v1/transactions',

        'qrcode.generator' => '/api/qrcode/v1/generator',
        'duitnowqr.generator' => '/api/duitnowqr/v1/generator',

        'version' => '/api/version',
        'echo' => '/api/echo',
    );

    private $items_per_page = 20;

    // Until we have a way to ensure everyone uses updated ca.cert, we turn it off
    public $strict_ssl = false;

    // GetCurl does extra checks and settings
    private function GetCurl() {
        $ch = curl_init();

        if (!$this->strict_ssl) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }
        return $ch;
    }

    // CloseCurl checks for common errors
    private function CloseCurl($ch) {
        $err = curl_errno($ch);
        if ($err == 60 || $err == 59 || $err == 58) {
            print "WARNING: SSL issue ".$err;
        }
        curl_close($ch);
    }

    public function __construct()
    {
        $this->report_endpoint = DEFAULT_REPORT_ENDPOINT;
        $this->payment_endpoint = DEFAULT_PAYMENT_ENDPOINT;
    }

    public function SetReportEndpoint($endpoint)
    {
        $this->reportEndpoint = $endpoint;
    }

    // Deliberately renamed from SetToken to prevent misunderstandings
    public function SetAuthToken($tok)
    {
        $this->authtoken = $tok;
    }

    // 2nd way to authenticate, but Agency is fixed.
    public function SetApiKey($agency, $apikey) {
        $this->agency = $agency;
        $this->apikey = $apikey;
    }

    private $debug = false;
    /**
     * SetDebug turns on or off extra logging for debugging
     */
    public function SetDebug($debug)
    {
        $this->debug = $debug;
    }

    private $cachefile = "";
    private $cache = array(); // Indexed on fpx_seller_order_no
    public function SetCache($filename) {
        $this->cachefile = $filename;
    }
    public function LoadCache() {
        if ($this->cachefile != "") {
            @$c = file_get_contents($this->cachefile);
            if ($c != "") {
                $this->cache = json_decode($c, true);
            }
        }
    }
    public function SaveCache() {
        if ($this->cachefile != "") {
            $c = json_encode($this->cache);
            file_put_contents($this->cachefile, json_encode($this->cache));
        }
    }

    public function SetItemsPerPage($items)
    {
        $this->items_per_page = $items;
    }

    /**
     * GetPaymentReport returns a raw response from SnapNPay API for
     * the endpoint /api/report/v1/payment as used by reports.snapnpay.my
     *
     * params is an array optionally of:
     *
     * * items Limit number of items to return. "-1" is all items.
     *
     * * page Page number, starts from 0
     *
     * * seller_order_no Filter by this fpx_seller_order_no
     *
     * * start ISO date UTC+8 start filter on created_date
     *
     * * end ISO date UTC+8 end filter on created_date
     *
     * * is_approved either 0 or 1
     *
     * * is_download either 0 or 1. Pick 0.
     *
     * * view string "default"
     *
     * @return string Raw response from server json_decode required on it.
     */
    public function GetPaymentReport($output = 'json', $params = array())
    {
        $q = $params;
        $q['output'] = $output;

        if (!isset($q['items']) && $this->items_per_page) {
            $q['items'] = $this->items_per_page;
        }

        $ch = $this->GetCurl();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if (!empty($this->apikey)) {
            $q['agency'] = $this->agency;
            $url = $this->report_endpoint . $this->API_CALLS['report.payment'] . '?' . http_build_query($q, "", '&', PHP_QUERY_RFC3986);
            $url = $this->SignURL($url, $this->apikey);
        } else {
            $url = $this->report_endpoint . $this->API_CALLS['report.payment'] . '?' . http_build_query($q, "", '&', PHP_QUERY_RFC3986);
            $authorization = "Authorization: Bearer ".$this->authtoken;
            curl_setopt($ch, CURLOPT_HTTPHEADER, array($authorization));
        }

        curl_setopt($ch, CURLOPT_URL, $url);

        if ($this->debug) {
            print "GetPaymentReport: " . $url . "\n";
        }

        ini_set("memory_limit", "8G");
        $resp = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $this->CloseCurl($ch);

        if (!$resp) {
            print "error: $statusCode $resp\n";
            return false;
        }

        if ($statusCode == 403 || $statusCode == 401) {
            throw new LoginException('Forbidden: Bad username/password?');
        }

        if ($statusCode !== 200) {
            return false;
        }

        return $resp;
    }

    public function GetFpxRequestReport($refno)
    {
        $q = array(
            'refno' => $refno,
        );
        if (!empty($this->apikey)) {
            $q['agency'] = $this->agency;
            $url = $this->report_endpoint . $this->API_CALLS['report.fpxrequest'] . '?' . http_build_query($q, "", '&', PHP_QUERY_RFC3986);
            $url = $this->SignURL($url, $this->apikey);
        } else {
            // FIXME: DEPRECATED
            if (!empty($this->token)) {
                throw new DeprecatedException('token is deprecated as authentication. Use jwt based AuthToken');
            }
            $q['key'] = $this->token;
            $url = $this->report_endpoint . $this->API_CALLS['report.fpxrequest'] . '?' . http_build_query($q, "", '&', PHP_QUERY_RFC3986);
        }

        $ch = $this->GetCurl();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $resp = curl_exec($ch);

        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $this->CloseCurl($ch);

        if (!$resp) {
            print "error: $statusCode $resp\n";
            return false;
        }

        if ($statusCode == 403 || $statusCode == 401) {
            throw new LoginException('Forbidden: Bad username/password?');
        }

        if ($statusCode !== 200) {
            return false;
        }

        return $resp;
    }

    /**
     * GetFpxRequest gets a single order_no, unlike GetFpxRequestReport, return the json_decoded data.
     *
     * @param string $fpx_seller_order_no is a string for the FPxSellerOrderNo
     */
    public function GetFpxRequest($fpx_seller_order_no)
    {
        if (isset($this->cache[$fpx_seller_order_no])) {
            return $this->cache[$fpx_seller_order_no];
        }

        $q = array(
            'fpx_seller_order_no' => $fpx_seller_order_no,
        );
        if (!empty($this->apikey)) {
            $q['agency'] = $this->agency;
            $url = $this->report_endpoint . $this->API_CALLS['report.fpxrequest'] . '?' . http_build_query($q, "", '&', PHP_QUERY_RFC3986);
            $url = $this->SignURL($url, $this->apikey);
        } else {
            // FIXME: DEPRECATED
            if (!empty($this->token)) {
                throw new DeprecatedException('token is deprecated as authentication. Use jwt based AuthToken');
            }
            $q['key'] = $this->token;
            $url = $this->report_endpoint . $this->API_CALLS['report.fpxrequest'] . '?' . http_build_query($q, "", '&', PHP_QUERY_RFC3986);
        }

        if ($this->debug) {
            print "GetFpxRequest: " . $url . "\n";
        }

        $ch = $this->GetCurl();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $resp = curl_exec($ch);

        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $this->CloseCurl($ch);
        if ($resp === false) {
            if ($this->debug) {
                print "error: $statusCode $resp\n";
            }
            return false;
        }

        if ($statusCode == 403 || $statusCode == 401) {
            throw new LoginException('Forbidden: Bad username/password?');
        }

        if ($statusCode !== 200) {
            return false;
        }

        $r = json_decode($resp, true);
        if ($r['status'] == 'OK') {
            $r = $r['fpxrequest'];
        } else {
            $r = false;
        }
        if ($this->cachefile) {
            $this->cache[$fpx_seller_order_no] = $r;
        }
        return $r;
    }

    // GetFpxRequest gets a single order_no, unlike GetFpxRequestReport, return the json_decoded data.
    public function GetTransactionHistory($email)
    {
        $q = array(
            'email' => $email,
        );
        if (!empty($this->apikey)) {
            $q['agency'] = $this->agency;
            $url = $this->report_endpoint . $this->API_CALLS['report.transactions'] . '?' . http_build_query($q, "", '&', PHP_QUERY_RFC3986);
            $url = $this->SignURL($url, $this->apikey);
        } else {
            // FIXME: DEPRECATED
            if (!empty($this->token)) {
                throw new DeprecatedException('token is deprecated as authentication. Use jwt based AuthToken');
            }
            $q['key'] = $this->token;
            $q['agency'] = "SNAPNPAY";
            $url = $this->report_endpoint . $this->API_CALLS['report.transactions'] . '?' . http_build_query($q, "", '&', PHP_QUERY_RFC3986);
        }

        if ($this->debug) {
            print "GetTransactionHistory: " . $url . "\n";
        }

        $ch = $this->GetCurl();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $resp = curl_exec($ch);

        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $this->CloseCurl($ch);

        if ($resp === false) {
            print "error: $statusCode $resp\n";
            return false;
        }

        if ($statusCode == 403 || $statusCode == 401) {
            throw new LoginException('Forbidden: Bad username/password?');
        }

        if ($statusCode !== 200) {
            return false;
        }

        return json_decode($resp, true);
    }

    public function validateExtraData($extradata)
    {
        $errors = array();
        if (strpos($extradata, "~") !== false) {
            $errors[] = "You cannot have ~ in your extradata";
        }
        return $errors;
    }

    public function ValidateQRCode($qrcode)
    {
        $errors = array();
        $amount = $qrcode['amount'];
        if ($amount < 1.00) {
            $errors[] = "Amount must be more than or equal to 1.00";
        }

        if (isset($qrcode['refno']) && strpos($qrcode['refno'], "~") !== false) {
            $errors[] = "You cannot have ~ in your refno";
        }

        return $errors;
    }

    public function GetSecureQRCodeUrl($qrcode)
    {
        if (!empty($this->apikey)) {
            $qrcode['agency'] = $this->agency;
            $url = $this->report_endpoint . $this->API_CALLS['qrcode.generator'];
        } else {
            // FIXME: DEPRECATED
            if (!empty($this->token)) {
                throw new DeprecatedException('token is deprecated as authentication. Use jwt based AuthToken');
            }
            $qrcode['key'] = $this->token;
            $url = $this->report_endpoint . $this->API_CALLS['qrcode.generator'];
        }

        $qrcode_sanitized = $qrcode;
        if (isset($qrcode['refnoFull'])) {
            $qrcode_sanitized['refno'] = $qrcode['refnoFull'];
            unset($qrcode_sanitized['refnoFull']);
        }

        $ch = $this->GetCurl();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        $fields = $this->SignMessage($url, $qrcode_sanitized, $this->apikey);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        $resp = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $this->CloseCurl($ch);

        if (!$resp) {
            return false;
        }

        if ($statusCode !== 200) {
            return false;
        }
        return $resp;
    }

    public function GetDuitNowQRCodeUrl($qrcode) {
        if (!empty($this->apikey)) {
            $qrcode['agency'] = $this->agency;
            $url = $this->report_endpoint . $this->API_CALLS['duitnowqr.generator'];
        } else {
            // FIXME: DEPRECATED
            if (!empty($this->token)) {
                throw new DeprecatedException('token is deprecated as authentication. Use jwt based AuthToken');
            }
            $qrcode['key'] = $this->token;
            $url = $this->report_endpoint . $this->API_CALLS['duitnowqr.generator'];
        }

        $qrcode_sanitized = $qrcode;
        if (isset($qrcode['refnoFull'])) {
            $qrcode_sanitized['refno'] = $qrcode['refnoFull'];
            unset($qrcode_sanitized['refnoFull']);
        }

        $ch = $this->GetCurl();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        $fields = $this->SignMessage($url, $qrcode_sanitized, $this->apikey);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        $resp = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $this->CloseCurl($ch);

        if (!$resp) {
            return false;
        }

        if ($statusCode !== 200) {
            return false;
        }
        return $resp;
    }

    public function GetQRCodeUrl($qrcode)
    {
        $err = $this->ValidateQRCode($qrcode);
        if (sizeof($err) > 0) {
            return "";
        }

        $refno = $qrcode["refno"];
        if (isset($qrcode["refnoFull"])) {
            $refno = $qrcode["refnoFull"];
        }

        $refno = urlencode($refno);
        $url = "https://snapnpay.my/pay/" . urlencode($qrcode["agency"]) . "/" . urlencode($qrcode["paymentCategory"]) . "/" . $refno . "/" . $qrcode["amount"];
        return 'https://snapnpay.my/qr2/?q=' . urlencode($url);
    }

    public function GetPaymentV2Url($payment)
    {
        $err = $this->ValidateQRCode($payment);
        if (sizeof($err) > 0) {
            return "";
        }

        $refno = $payment["refno"];
        if (isset($payment["refnoFull"])) {
            $refno = $payment["refnoFull"];
        }
        $url = "https://snapnpay.my/pay/" . urlencode($payment["agency"]) . "/" . urlencode($payment["paymentCategory"]) . "/" . $refno . "/" . $payment["amount"];
        return $url;
    }


    public function TestVersion()
    {
        $url = $this->report_endpoint . $this->API_CALLS['version'];

        $ch = $this->GetCurl();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $resp = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $this->CloseCurl($ch);

        if (!$resp) {
            return false;
        }

        if ($statusCode !== 200) {
            return false;
        }

        return $resp;
    }

    public function TestExternalService()
    {
        $url = 'https://httpbin.org/get';

        $ch = $this->GetCurl();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $resp = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $this->CloseCurl($ch);

        if ($resp === false) {
            return false;
        }

        if ($statusCode !== 200) {
            return false;
        }

        return $resp;
    }

    public function TestEcho()
    {
        $url = $this->report_endpoint . $this->API_CALLS['echo'];

        $ch = $this->GetCurl();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bear"));
        $resp = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $this->CloseCurl($ch);

        if ($resp === false) {
            return false;
        }

        if ($statusCode !== 200) {
            return false;
        }

        return $resp;
    }

    public function Test()
    {
        echo '<pre>';

        $version = $this->TestVersion();
        echo "\nTesting version\t\t\t" . ($version !== false ? '1' : '0');
        echo "\n\nDiagnostic\n";
        echo $version;
        echo "\n";

        $external = $this->TestExternalService();
        echo "\nTesting external service\t" . ($external !== false ? '1' : '0');
        echo "\n\nDiagnostic\n";
        echo $external;
        echo "\n";

        $echo = $this->TestEcho();
        echo "\nTesting echo service\t\t" . ($echo !== false ? '1' : '0');
        echo "\n\nDiagnostic\n";
        echo $echo;
        echo "\n";

        echo '</pre>';
    }

    public function buildAndSign($url, $qrcode)
    {
        // FIXME: DEPRECATED
        if (!empty($this->token)) {
            throw new DeprecatedException('token is deprecated as authentication. Use jwt based AuthToken');
        }
        $url2 = $url . "?" . http_build_query($qrcode, "", '&', PHP_QUERY_RFC3986);
        return $this->SignURL($url2, $this->token);
    }

    public function SignMessage($url, $q, $hash)
    {
        $u = parse_url($url);
        $q['exp'] = time() + 60; // Expiry in 60 seconds
        ksort($q);
        $message = $u['path'] . '?' . http_build_query($q, "", '&', PHP_QUERY_RFC3986);

        $key = str_replace("-", "", $hash);
        $key = pack("H*", $key);

        $hashed = hash_hmac("sha256", $message, $key);
        $hashed = substr($hashed, 0, 16);
        return http_build_query($q, "", '&', PHP_QUERY_RFC3986) . "&signature=" . $hashed;
    }

    public function SignURL($url, $hash)
    {
        $u = parse_url($url);
        parse_str($u['query'], $q);
        $q['exp'] = time() + 60; // Expiry in 60 seconds
        ksort($q);
        $message = $u['path'] . '?' . http_build_query($q, "", '&', PHP_QUERY_RFC3986);

        $key = str_replace("-", "", $hash);
        $key = pack("H*", $key);

        $hashed = hash_hmac("sha256", $message, $key);
        $hashed = substr($hashed, 0, 16);
        return $u['scheme'] . "://" . $u['host'] . $message . "&signature=" . $hashed;
    }
};
