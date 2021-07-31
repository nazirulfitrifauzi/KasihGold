<?php

// Use:
//   php -S localhost:8000
// To quickly test

// Requires curl
// include 'Tulus.php';

// const PAYMENT_ENDPOINT = "https://pay.tulus.my/";
// const PAYMENT_ENDPOINT = "http://localhost:3001/payments/api";
const PAYMENT_ENDPOINT = "https://prod.snapnpay.co/payments/api";
// const PAYMENT_ENDPOINT = "https://snapnpay.my/v2/checkout";

// ----------------------------------------------------------------------------------------------------------------


// The returnUrl here is for getting the result of the transaction.
// There are two ways for this to happen: "indirect" and "direct"
// In this example, it's processed in the
//
// "Indirect" is a request POSTed by the client's browser with after
// the completion of the request.
// "Direct" is a request POSTed by SnapNPay's server after the completion
// of the request.

// This parameter can be set during "dev" mode, but "prod" mode may
// impose more restrictions in terms of which addresses are valid.

// The data returned in $_POST looks like this:
//
/*
    Array
    (
        [status] => success
        [orderNo] => LP-0000179356e010000
        [refNo] => test5dbfdd8d9db55
        [amount] => 1.00
        [fpxTxnId] => 1911041613340758
        [extraData] => 881225-08-1234
    )
*/

// ----------------------------------------------------------------------------------------------------------------
// Payment Order API Example
// This is vastly simplified. Use and adapt for your own class
// Unless otherwise stated, the types in the following fields are specified in string, and is up to 255 bytes ASCII
// Use of UTF-8 values in the following may result in undefined behaviours.

$order = array(
    'agency'    => 'KASIHGOLD',          // Enter your agency code here.
    'refNo'     => uniqid("test"),      // Generate a unique ID, prefixed with "test", but append some "extraData"
    'amount'    => "1.00",              // Amount in Ringgit
    'email'     => "sdk@snapnpay.my",   // Email address of payer to receive payment receipt
    'returnUrl' => "http://localhost:8000/pay2",          // callback url, change this to your form
);

// $extraData is extra, *optional* reference for helping the calling app, e.g. adding a MyKad reference.
// it can be anything alphanum, except "~"


// Default QR Code Generator for the SnapNPay App
// This is simplified structure of the QRCode generator. Use and adapt for your own class.

// Note the similarity of the qrcode structure with $order above, but:
// "email" is not used -- they will be filled in by the SnapNPay App
// "returnUrl" is optional

// There are two types of QRCode generation, secure ("signed/tamper resistant") and unsigned.
// You need to sign in (and get the secure token), to be able to generate the secured QR Code.

// ----------------------------------------------------------------------------------------------------------------
// *Indirect* + *Direct* handling:
// Example of getting and processing the result from SnapNPay/FPX:


// ----------------------------------------------------------------------------------------------------------------
// Payment Reports API Example


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="icon" type="image/png" href="https://assets.tulus.my/tulus-icon.png" sizes="32x32" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>
        <script>
            function isValidEmail(email) {
                var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                return email.match(regex);
            }
            function checkValidEmail(email) {
                if (!isValidEmail(email)) {
                    alert("Please enter a valid email");
                }
            }
        </script>
    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <h5 class="my-0 mr-md-auto font-weight-normal">SnapNPay API - For both Tulus and SnapNPay</h5>
        </div>
        <div class="container p-0">
            <div>
                The API can be logddically grouped in to two:<br />
            </div>
            <ol>
                <li>Payment Orders</li>
                <li>Payment Reports</li>
            </ol>
            
            <div class="row">
                There are multiple ways to authenticate for the API, but the current more secure and flexible way
                is to specify a user and an API key.
            </div>
        </div>

    <hr />
    <div class="container p-0">
    </div>
        <hr />
        <div class="container p-0">
            <h3>Payment Order</h3>
            <!-- Payment Example -->
            <div style="border: 2px solid; padding: 0.5em" class="container">
                Example Payment Order:
                <!-- API Key is optional, to sign and lock in the amount -->

                <pre>order = <?php print_r($order); ?></pre>

                <!-- ENDPOINT by default should be "https://pay.tulus.my/" for the most features and options -->
                <form method="post" action="https://prod.snapnpay.co/payments/api">
                    <div class="form-group p-0 m-0 row">
                        <label for="refNo" class="col-sm-2 col-form-label"><b>Reference No</b>:<br /><code>refNo</code>
                        (Required)</label>
                        <div class="col-sm-4">
                            <input type="text" size=40 name="refNo" value="<?php echo htmlentities($order["refNo"]); ?>" class="form-control" id="refNo" aria-describedby="refnoHelp" />
                        </div>
                    </div>

                    <div class="form-group p-0 m-0 row">
                        <label for="amount" class="col-sm-2 col-form-label"><b>Amount</b>:<br /><code>amount</code>
                            (Required)</label>
                        <div class="col-sm-4">
                            <input type="text" size=40 name="amount" value="<?php echo htmlentities($order["amount"]??""); ?>" class="form-control" id="amount" aria-describedby="amountHelp" />
                        </div>
                        <div class="col-sm-6">
                            <small id="amountHelp" class="form-text text-muted">
                            The Amount, in Ringgit Malaysia. e.g. <code>12.20</code>
                            </small>
                        </div>
                    </div>

                    <div class="form-group p-0 m-0 row">
                        <label for="email" class="col-sm-2 col-form-label"><b>Email</b>:<br /><code>email</code>
                        (Required)</label>
                        <div class="col-sm-4">
                            <input type="text" size=40 name="email" value="<?php echo htmlentities($order["email"]??""); ?>" onchange="checkValidEmail(this.value)" class="form-control" id="email" aria-describedby="emailHelp" />
                        </div>
                    
                    </div>

                    <div class="form-group p-0 m-0 row">
                        <label for="agency" class="col-sm-2 col-form-label"><b>Agency Code</b>:<br /><code>agency</code>
                        (Required)</label>
                        <div class="col-sm-4">
                            <input type="text" size=40 name="agency" value="<?php echo htmlentities($order["agency"]??""); ?>" class="form-control" id="email" aria-describedby="agencyHelp" />
                        </div>
                    
                        <div class="col-sm-6">
                            <small id="agencyHelp" class="form-text text-muted">
                            Valid Agency Code.
                            </small>
                        </div>
                    </div>
                    
                    <div class="form-group p-0 m-0 row">
                        <label for="returnUrl" class="col-sm-2 col-form-label"><b>Return URL</b>:<br /><code>returnUrl</code>
                        (to be hidden)</label>
                        <div class="col-sm-4">
                            <input type="text" size=40 name="returnUrl" value="<?php echo htmlentities($order["returnUrl"]??""); ?>" class="form-control" id="email" aria-describedby="returnUrlHelp" />
                        </div>
                    
                        <div class="col-sm-6">
                            <small id="returnUrlHelp" class="form-text text-muted">
                            Return URL. Redirect here when all done.
                            </small>
                        </div>
                    </div>

                    <div class="form-group p-0 m-0 row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End payment Example -->


        <hr />
        
    </div>

    <script>

    </script>
    </body>
</html>
