<?php
header('Content-type: application/x-javascript');

require_once 'meekrodb.2.3.class.php';
DB::$user = 'matejar';
DB::$password = 'BCconnect1500$-';
DB::$dbName = 'temp2';

function return_response($response) {
    echo $_GET['callback']."([".json_encode($response)."])";    
}

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

$firstName = $_GET['firstName'];
$lastName = $_GET['lastName'];
$email = $_GET['email'];
$confirmEmail = $_GET['confirmEmail'];
$phoneNumber = $_GET['phoneNumber'];
$firstCode = $_GET['firstCode'];
$secondCode = $_GET['secondCode'];
$thirdCode = $_GET['thirdCode'];
$ageCheck = $_GET['ageCheck'];
$emailOptIn = $_GET['emailOptIn'];
$sweepOptIn = $_GET['sweepOptIn'];
// $recaptcha = $_GET['recaptcha'];
$captcha_secret_key = '6LcP2FQUAAAAALsa2qx_YAKAimbqykZm6rw7XNy3';

// Form validation ==============
// Empty value check
if(empty($firstName))
    $errors['firstName'] = 'Please enter your first name';
if(empty($lastName))
    $errors['lastName'] = 'Please enter your last name';
if(empty($email))
    $errors['email'] = 'Please enter your email';
if(empty($confirmEmail))
    $errors['confirmEmail'] = 'Please confirm your email';
if($email != $confirmEmail)
    $errors['email'] = 'Emails do not match';
if(empty($firstCode))
    $errors['firstCode'] = 'Please enter your first code';
if(empty($secondCode))
    $errors['secondCode'] = 'Please enter your second code';
if(empty($thirdCode))
    $errors['thirdCode'] = 'Please enter your third code';
if(empty($ageCheck))
    $errors['ageCheck'] = 'Please confirm your age';
// if(empty($recaptcha))
//     $errors['recaptcha'] = 'Please check recaptcha';


if ( ! empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;
} else {
    // if there are no errors process our form, then return a message
    $data['success'] = true;

    // // CURL TO VALIDATE CAPTCHA
    // function file_get_contents_curl($url) {
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    //     curl_setopt($ch, CURLOPT_HEADER, 0);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       
    //     $data = curl_exec($ch);
    //     curl_close($ch);
    //     return $data;
    // }
    // $verifyResponse = file_get_contents_curl('https://www.google.com/recaptcha/api/siteverify?secret='.$captcha_secret_key.'&response='.$recaptcha);
    // $responseData = json_decode($verifyResponse);

    // // IF reCAPTCHA RETURNS POSITIVE RESPONSE
    // if($responseData->success){
        
        $data['message'] =  'success';

        // Put all submitted codes in one array
        $codes = array($firstCode, $secondCode, $thirdCode);
        // Create empty array to store code search results
        $codes_search_result = array();

        // ===============================================================
        // ======================== CODE VALIDATION ======================
        // =============================================================== 

        // Check if duplicate codes were submitted =========
        function array_has_dupes($array) {
           return count($array) !== count(array_unique($array));
        }
        // Put all submitted codes in one array
        $codes = array($firstCode, $secondCode, $thirdCode);
        if(array_has_dupes($codes) > 0) {
            $data['message'] = 'duplicate_codes_submittes';
            return_response($data);
            die();
        }

        include 'look-up-code.php';


    // }
    // else {
    //     $data['message'] =  'robot_verification_failed';
    // }
} 

return_response($data);

?>