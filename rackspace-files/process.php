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
DB::$dbName   = 'incredibles2';

function return_response($response)
{
    echo $_GET['callback'] . "([" . json_encode($response) . "])";
}

$errors = array(); // array to hold validation errors
$data   = array(); // array to pass back data

date_default_timezone_set("America/New_York");
$current_month = date('m');

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
if (empty($firstName)) {
    $errors['firstName'] = 'Please enter your first name';
}
if (empty($lastName)) {
    $errors['lastName'] = 'Please enter your last name';
}
if (empty($email)) {
    $errors['email'] = 'Please enter your email';
}
if (empty($confirmEmail)) {
    $errors['confirmEmail'] = 'Please confirm your email';
} else {
    if ($email != $confirmEmail) {
        $errors['email'] = 'Emails_do_not_match';
    }
}
if (empty($firstCode)) {
    $errors['firstCode'] = 'Please enter your first code';
}
if (empty($secondCode))
    $errors['secondCode'] = 'Please enter your second code';
if (empty($thirdCode)) {
    $errors['thirdCode'] = 'Please enter your third code';
}
if(isset($ageCheck) == false){
    $errors['ageCheck'] = 'Please confirm your age and that you agree to the official rules';
}
if(isset($sweepOptIn) == false){
    $errors['sweepOptIn'] = 'Please acknowledge that you will be entered into the Incredible Family Adventure Sweepstakes.';
}
if (empty($recaptcha)) {
    $errors['recaptcha'] = 'Please check captcha';
}


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

        // Get number of times codes were reedemed in one month by the same user ====
        include 'get_number_of_code_redemptions.php';
        
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

        // Email fandango code ==================
        include 'email-content.php';
        $mail->isSMTP();
        $mail->Host = 'mail.brandconnections.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'juicyjuice@brandconnections.com';
        $mail->Password = 'TheJuiciestJuice';
        $mail->SMTPSecure = 'tls';

        $mail->From = 'juicyjuice@brandconnections.com';
        $mail->FromName = 'Juicy Juice';
        $mail->addAddress($email);
         
        $mail->isHTML(true);
        
        $mail->Subject = 'Your Fandango Code';
        $mail->Body = email_content($result[0]['fandango_code']);
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