<?php
ERROR_REPORTING(E_ALL);

function reCAPTCHA_Verify($response){
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $secretKey = "6LdaeCwUAAAAALMoUubQpnoqBtCZf-EWtAQTQ6M7";

    //get verified response data
    $data = array('secret' => $secretKey, 'response' => $_POST[$response]);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $verifyResponse = curl_exec($ch);
    curl_close($ch);

    $responseData = json_decode($verifyResponse);
    if(empty($responseData)){
        return "cURL Error";
    } 
    if ($responseData->success == true){
        return true;
    } else {
        return $responseData;
    }
}
?>