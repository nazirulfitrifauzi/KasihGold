<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Plain Jane Text</title>
    <style type="text/css">
        /* Based on The MailChimp Reset INLINE: Yes. */
        /* Client-specific Styles */
        #outlook a {
            padding: 0;
        }

        /* Force Outlook to provide a "view in browser" menu link. */
        body {
            width: 100% !important;
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        /* Prevent Webkit and Windows Mobile platforms from changing default font sizes.*/
        .ExternalClass {
            width: 100%;
        }

        /* Force Hotmail to display emails at full width */
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }

        /* Forces Hotmail to display normal line spacing.  More on that: http://www.emailonacid.com/forum/viewthread/43/ */
        #backgroundTable {
            margin: 0;
            padding: 0;
            width: 100% !important;
            line-height: 100% !important;
        }

        /* End reset */
        /* Some sensible defaults for images
          Bring inline: Yes. */

        img {
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        a img {
            border: none;
        }

        .image_fix {
            display: block;
        }

        /* Yahoo paragraph fix
          Bring inline: Yes. */
        p {
            margin: 1em 0;
        }

        /* Hotmail header color reset
          Bring inline: Yes. */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: black !important;
        }

        h1 a,
        h2 a,
        h3 a,
        h4 a,
        h5 a,
        h6 a {
            color: blue !important;
        }

        h1 a:active,
        h2 a:active,
        h3 a:active,
        h4 a:active,
        h5 a:active,
        h6 a:active {
            color: red !important;
            /* Preferably not the same color as the normal header link color.  There is limited support for psuedo classes in email clients, this was added just for good measure. */
        }

        h1 a:visited,
        h2 a:visited,
        h3 a:visited,
        h4 a:visited,
        h5 a:visited,
        h6 a:visited {
            color: #000;
            color: purple !important;
            /* Preferably not the same color as the normal header link color. There is limited support for psuedo classes in email clients, this was added just for good measure. */
        }

        /* Outlook 07, 10 Padding issue fix
          Bring inline: No.*/
        table td {
            border-collapse: collapse;
        }

        /* Remove spacing around Outlook 07, 10 tables
          Bring inline: Yes */
        table {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }


        /* Global */
        * {
            margin: 0;
            padding: 0;
        }

        body {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            width: 100% !important;
            height: 100%;
            font-family: Cambria, Utopia, "Liberation Serif", Times, "Times New Roman", serif;
            font-weight: 400;
            font-size: 100%;
            line-height: 1.6;
        }

        /* Styling your links has become much simpler with the new Yahoo.  In fact, it falls in line with the main credo of styling in email and make sure to bring your styles inline.  Your link colors will be uniform across clients when brought inline.
          Bring inline: Yes. */
        a {
            color: #348eda;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        p,
        ul,
        ol {
            /* This fixes Gmail's terrible text rendering  */
            font-family: Cambria, Utopia, "Liberation Serif", Times, "Times New Roman", serif;
            font-weight: 400;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            margin: 20px 0 10px;
            color: #000;
            line-height: 1.2;
        }

        h1 {
            font-size: 32px;
        }

        h2 {
            font-size: 26px;
        }

        h3 {
            font-size: 22px;
        }

        h4 {
            font-size: 18px;
        }

        h5 {
            font-size: 16px;
        }

        p,
        ul,
        ol {
            margin-bottom: 10px;
            font-weight: normal;
            font-size: 16px;
            line-height: 1.4;
        }

        ul li,
        ol li {
            margin-left: 5px;
            list-style-position: inside;
        }

        /* Body */
        table.body-wrap {
            width: 100%;
            padding: 30px;
        }


        /* Footer */
        table.footer-wrap {
            width: 100%;
            clear: both !important;
        }

        .footer-wrap .container p {
            font-size: 12px;
            color: #666;
        }

        table.footer-wrap a {
            color: #999;
        }


        /* Give it some responsive love */
        .container {
            display: block !important;
            max-width: 600px !important;
            margin: 0 auto !important;
            /* makes it centered */
            clear: both !important;
        }

        /* Set the padding on the td rather than the div for Outlook compatibility */
        .body-wrap .container {
            padding: 30px;
        }

        /* This should also be a block element, so that it will fill 100% of the .container */
        .content {
            max-width: 600px;
            margin: 0 auto;
            display: block;
        }

        /* Let's make sure tables in the content area are 100% wide */
        .content table {
            width: 100%;
        }
    </style>
    <!--[if gte mso 9]>
      <style>
        /* Target Outlook 2007 and 2010 */
      </style>
    <![endif]-->
</head>

<body>
    <table id="backgroundTable" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td>
                    <!-- body -->
                    <table class="body-wrap">
                        <tbody>
                            <tr>
                                <td>&nbsp;</td>
                                <td class="container" valign="top" bgcolor="#FFFFFF">
                                    <!-- content -->
                                    <div class="content">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <img src="{{ asset('img/kasihAPGold.png') }}"
                                                        style="width:250px; heigth:250px; margin-left:-15px " />
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h1>Pelanggan-pelanggan yang dihormati sekelian,</h1>
                                                        <p>Terima kasih kerana menjadi pelanggan kami.</p>
                                                        <p>Untuk makluman tuan/puan sehingga 31 Julai 2021 simpanan emas
                                                            digital tuan/puan adalah
                                                            sebanyak x.xx gram.</p>
                                                        <p>Teruskan simpanan emas tuan/puan sepanjang bulan Ogos 2021.
                                                            (<a href="https://digital.kasihgold.com.login"
                                                                target="_blank"
                                                                rel="noopener">https://digital.kasihgold.com.login</a>)
                                                        </p>
                                                        <p>Sekiranya tuan/puan mempunyai sebarang persoalan sila hubungi
                                                            kami di:</p>
                                                        <p><a href="mailto:customersupport@kasihapgold.com"
                                                                target="_blank"
                                                                rel="noopener">customersupport@kasihapgold.com</a> atau
                                                            whatapps kami di 0127499771</p>
                                                        <p>Terima kasih.</p>
                                                        <p>Kasih AP Gold Sdn. Bhd.</p>
                                                        <p>&nbsp;</p>
                                                        <h1>Dear clients,</h1>
                                                        <p>Thank you for being our customer.</p>
                                                        <p>Please note that up to 31 July 2021 your digital gold
                                                            deposit is&nbsp;<a
                                                                href="https://ssl.microsofttranslator.com/bv.aspx?ref=TAns&amp;from=&amp;to=en&amp;a=x.xx">x.xx</a>&nbsp;grams.<br />Continue
                                                            your gold savings throughout August 2021. (<a
                                                                href="https://digital.kasihgold.com.login">https://digital.kasihgold.com.login</a>)
                                                        </p>
                                                        <p>If you have any questions please contact us at:</p>
                                                        <p><a href="mailto:customersupport@kasihapgold.com"
                                                                target="_blank"
                                                                rel="noopener">customersupport@kasihapgold.com</a> or whatapps us in
                                                            0127499771</p>
                                                        <p>Thank you.</p>
                                                        <p>Kasih AP Gold Sdn. Bhd.</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /content -->
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- /body -->
                    <!-- footer -->
                    <table class="footer-wrap" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tbody>
                            <tr>
                                <td>&nbsp;</td>
                                <td class="container">
                                    <!-- content -->
                                    <div class="content">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td align="center" valign="top">
                                                        © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /content -->
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- /footer -->
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>