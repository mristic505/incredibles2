<?php
header('Content-type: application/x-javascript');
function return_response($response) {
    echo $_GET['callback']."([".json_encode($response)."])";    
}

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

$firstName = $_GET['firstName'];
$lastName = $_GET['lastName'];
$recaptcha = $_GET['recaptcha'];
$captcha_secret_key = '6LcP2FQUAAAAALsa2qx_YAKAimbqykZm6rw7XNy3';

// Form validation
if(empty($firstName))
    $errors['firstName'] = 'Please eneter your first name';
if(empty($lastName))
    $errors['lastName'] = 'Please eneter your last name';


if ( ! empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;
} else {
    // if there are no errors process our form, then return a message
    $data['success'] = true;

    // CURL TO VALIDATE CAPTCHA
    function file_get_contents_curl($url) {
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
    $verifyResponse = file_get_contents_curl('https://www.google.com/recaptcha/api/siteverify?secret='.$captcha_secret_key.'&response='.$recaptcha);
    $responseData = json_decode($verifyResponse);

    // IF reCAPTCHA RETURNS POSITIVE RESPONSE
    if($responseData->success){
        
        $data['message'] =  'success';
    }
    else {
        $data['message'] =  'robot_verification_failed';
    }
} 

return_response($data);

?>