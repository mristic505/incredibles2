<?php
header('Content-type: application/x-javascript');
function return_response($response) {
    echo $_GET['callback']."([".json_encode($response)."])";    
}

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

$firstName = $_GET['firstName'];
$lastName = $_GET['lastName'];

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

    // VALIDATE CAPTCHA =================
    $secret         = '6LfoTjQUAAAAAJnpxLvTOYn2vkZwLkDZdfeY1QdS';
    //get verify response data
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $recaptcha);
    $responseData   = json_decode($verifyResponse);

    if ($responseData->success) { // If recpatcha response verified
        $data['success'] = true;
        $data['message'] =  'success';
        
        
    }
    else { // If recpatcha response not verified
        $data['message'] = 'robot_verification_failed';
    }
} 

return_response($data);

?>