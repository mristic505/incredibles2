<?php
header('Content-type: application/x-javascript');

// Import PHPMailer classes into the global namespace =================
require 'PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
// End Importing PHPMailer classes into the global namespace ==========

require_once 'meekrodb.2.3.class.php';
DB::$user     = 'matejar';
DB::$password = 'BCconnect1500$-';
DB::$dbName   = 'temp2';

function return_response($response)
{
    echo $_GET['callback'] . "([" . json_encode($response) . "])";
}

$errors = array(); // array to hold validation errors
$data   = array(); // array to pass back data

$firstName          = $_GET['firstName'];
$lastName           = $_GET['lastName'];
$email              = $_GET['email'];
$confirmEmail       = $_GET['confirmEmail'];
$phoneNumber        = $_GET['phoneNumber'];
$firstCode          = $_GET['firstCode'];
$secondCode         = $_GET['secondCode'];
$thirdCode          = $_GET['thirdCode'];
$ageCheck           = $_GET['ageCheck'];
$emailOptIn         = $_GET['emailOptIn'];
$sweepOptIn         = $_GET['sweepOptIn'];
$recaptcha          = $_GET['recaptcha'];
$captcha_secret_key = '6LcP2FQUAAAAALsa2qx_YAKAimbqykZm6rw7XNy3';

// Form validation ==============
// Empty value check
if (empty($firstName))
    $errors['firstName'] = 'Please enter your first name';
if (empty($lastName))
    $errors['lastName'] = 'Please enter your last name';
if (empty($email))
    $errors['email'] = 'Please enter your email';
if (empty($confirmEmail))
    $errors['confirmEmail'] = 'Please confirm your email';
if ($email != $confirmEmail)
    $errors['email'] = 'Emails do not match';
if (empty($firstCode))
    $errors['firstCode'] = 'Please enter your first code';
if (empty($secondCode))
    $errors['secondCode'] = 'Please enter your second code';
if (empty($thirdCode))
    $errors['thirdCode'] = 'Please enter your third code';
if (empty($ageCheck))
    $errors['ageCheck'] = 'Please confirm your age';
if (empty($recaptcha))
    $errors['recaptcha'] = 'Please check recaptcha';


if (!empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;
} else {
    // if there are no errors process our form, then return a message
    $data['success'] = true;
    
    // CURL TO VALIDATE CAPTCHA
    function file_get_contents_curl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
    $verifyResponse = file_get_contents_curl('https://www.google.com/recaptcha/api/siteverify?secret=' . $captcha_secret_key . '&response=' . $recaptcha);
    $responseData   = json_decode($verifyResponse);
    
    // IF reCAPTCHA RETURNS POSITIVE RESPONSE
    if ($responseData->success) {
        
        $data['message'] = 'success';
        
        // Put all submitted codes in one array
        $codes               = array(
            $firstCode,
            $secondCode,
            $thirdCode
        );
        // Create empty array to store code search results
        $codes_search_result = array();
        
        // ===============================================================
        // ======================== CODE VALIDATION ======================
        // =============================================================== 
        
        // Check if duplicate codes were submitted =========
        function array_has_dupes($array)
        {
            return count($array) !== count(array_unique($array));
        }
        // Put all submitted codes in one array
        $codes = array(
            $firstCode,
            $secondCode,
            $thirdCode
        );
        if (array_has_dupes($codes) > 0) {
            $data['message'] = 'duplicate_codes_submitted';
            return_response($data);
            die();
        }
        
        // Look up codes ===========
        include 'look-up-code.php';
        
        // Insert user info =========
        DB::insert('registered_users', array(
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'phoneNumber' => $phoneNumber,
            'firstCode' => $firstCode,
            'secondCode' => $secondCode,
            'thirdCode' => $thirdCode,
            'emailOptIn' => $emailOptIn
        ));


        //Look for available fandango code
        $result = DB::query("SELECT * FROM fandango_codes WHERE assigned_to = 'NONE' GROUP BY assigned_to;");
        $fandango_code_id = $result[0]['id'];
        // Update fandango table and assign code to user email
        DB::update('fandango_codes', array(
          'assigned_to' => $email          
        ), "id=%i", $fandango_code_id);

        // // Try to send email ==================
        $mail->isSMTP();
        $mail->Host = 'mail.brandconnections.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'juicyjuice@brandconnections.com';
        $mail->Password = 'TheJuiciestJuice';
        $mail->SMTPSecure = 'tls';

        $mail->From = 'juicyjuice@brandconnections.com';
        $mail->FromName = 'Juicy Juice';
        $mail->addAddress($email);
         
        $mail->isHTML(false);
        
        $mail->Subject = 'Your Fandango Code';
        $mail->Body = 'Thank you for participating in Juicy Juice\'s Incredible Family Adventure Sweepstakes! To receive your Fandango Movie Tickets, just follow these simple steps:'.PHP_EOL.
            '1.  Visit Fandango at Fandango.com or via the Fandango mobile app.'.PHP_EOL.
            '2. Select your date, theater, time, and ticket quantity for DisneyoPixar\'s Incredibles 2.'.PHP_EOL.
            '3. Sign in or create your free Fandango VIP account (or enter your email address for guest checkout).'.PHP_EOL.
            '4. Click "Promo Code," enter the code below and click "Apply".'.PHP_EOL.
            '   '.$result[0]['fandango_code'].PHP_EOL.
            '5. Complete your purchase and decide how you want to pick up your tickets.'.PHP_EOL.
            'Terms and Conditions: Fandango Promotional Code is good towards one movie ticket (up to $7.50 total ticket and convenience fee value) to see Incredibles 2 or any other Disney movie at Fandango partner theaters in the U.S. Fandango Promotional Code must be redeemed by March 31, 2019 and is void if not redeemed by the expiration date. Only valid for purchase of movie tickets made at www.fandango.com/promo/juicyjuice or via the Fandango app and cannot be redeemed directly at any Fandango partner theater box office. If lost or stolen, cannot be replaced and there will be no refunds. No cash value. Not valid with any other offer. Fandango Promotional Code is valid for one-time use only. Not for resale; void if sold or exchanged. If cost of movie ticket with Fandango\'s convenience fee included is more than maximum value of the Fandango Promotional Code, then user must pay the difference. Fandango Loyalty Solutions, LLC is not a sponsor or co-sponsor of this program. The redemption of Fandango Promotional Code is subject to Fandango\'s Terms and Policies at www.fandango.com/terms-and-policies. All Rights Reserved.';
        if(!$mail->send()) {
            $data['email'] = 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $data['email'] = 'Message has been sent';
        }
        
        
    // If robot verification fails ===========    
    } else {
        $data['message'] = 'robot_verification_failed';
    }
}

return_response($data);

?>