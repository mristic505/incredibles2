<?php

function email_content($fandangoCode) {
	return '<!DOCTYPE html>
                    <html>

                    <head>
                        <META http-equiv="Content-Type" content="text/html; charset=utf-8">
                        <style type="text/css">
                            table {
                                border-collapse: separate;
                            }
                            
                            a,
                            a:link,
                            a:visited {
                                text-decoration: none;
                                color: #00788a
                            }
                            
                            a:hover {
                                text-decoration: underline;
                            }
                            
                            h2,
                            h2 a,
                            h2 a:visited,
                            h3,
                            h3 a,
                            h3 a:visited,
                            h4,
                            h5,
                            h6,
                            .t_cht {
                                color: #000 !important
                            }
                            
                            p {
                                margin-bottom: 0
                            }
                            
                            .ExternalClass p,
                            .ExternalClass span,
                            .ExternalClass font,
                            .ExternalClass td {
                                line-height: 100%
                            }
                            
                            .ExternalClass {
                                width: 100%;
                            }
                            
                            #outlook a {
                                padding: 0;
                            }
                            
                            body {
                                width: 100% !important;
                            }
                            
                            .ReadMsgBody {
                                width: 100%;
                            }
                            
                            body {
                                -webkit-text-size-adjust: none;
                                margin: 0;
                                padding: 0;
                                background-color: #ffffff;
                            }
                            
                            img {
                                border: none;
                                height: auto;
                                line-height: 100%;
                                margin: 0;
                                outline: none;
                                padding: 0;
                                text-decoration: none;
                                display: block;
                            }
                        </style>
                    </head>

                    <body>
                        <div style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;display:block">
                            <div align="center">
                                <table style="width:638px" border="0" cellspacing="20" cellpadding="0" align="center" bgcolor="#ffffff" width="638">
                               		 <tr>
                                        <td style="text-align:center;"><img width="200"  style="width:200px;margin:auto;" src="http://juicyjuice.staging.wpengine.com/incredibles2/assets/imgs/jj-logo.png"></td>
                                    <tr>
                                    <tr>
                                        <td>
                                            <p style="font-size:14px;">Thank you for participating in the Juicy Juice Incredible Family Adventure Sweepstakes! To receive your Fandango Movie Tickets, just follow these simple steps:</p>
                                            </td>
                                    </tr>
                                    <tr>
                                                <td style="font-size:14px;padding 10px 0;">1.   Visit Fandango at Fandango.com or via the Fandango mobile app. </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:14px;padding 10px 0;">2.   Select your date, theater, time, and ticket quantity for Disney•Pixar\'s Incredibles 2.</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:14px;padding 10px 0;">3.   Sign in or create your free Fandango VIP account (or enter your email address for guest checkout).</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:14px;padding 10px 0;">4.  Click "Promo Code," enter the code below and click "Apply".<br><span style="color:#1b5733;font-size:25px;"><b>'.$fandangoCode.'</b></span></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:14px;padding 10px 0;">5.   Complete your purchase and decide how you want to pick up your tickets. </td>                            
                                            </tr>
                                    <tr>
                                        <td>
                                            <p style="font-size:14px;"><b>Terms and Conditions:</b> Fandango Promotional Code is good towards one movie ticket (up to $7.50 total ticket and convenience fee value) to see Incredibles 2 or any other Disney movie at Fandango partner theaters in the U.S. Fandango Promotional Code must be redeemed by March 31, 2019 and is void if not redeemed by the expiration date. Only valid for purchase of movie tickets made at www.fandango.com/promo/juicyjuice or via the Fandango app and cannot be redeemed directly at any Fandango partner theater box office. If lost or stolen, cannot be replaced and there will be no refunds. No cash value. Not valid with any other offer. Fandango Promotional Code is valid for one-time use only. Not for resale; void if sold or exchanged. If cost of movie ticket with Fandango\'s convenience fee included is more than maximum value of the Fandango Promotional Code, then user must pay the difference. Fandango Loyalty Solutions, LLC is not a sponsor or co-sponsor of this program. The redemption of Fandango Promotional Code is subject to Fandango\'s Terms and Policies at www.fandango.com/terms-and-policies. All Rights Reserved.</p>
                                        </td>
                                    </tr>                
                            
                                </table>
                            </div>
                        </div>
                    </body>

                    </html>';
}