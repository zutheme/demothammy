<?php

require('library.php');

function send()
{

    $phone = '0967655819';

    $verifyCode = rand(11111, 99999);
    $smsMessage = "PIN number: " . $verifyCode;

    sendFromOneHealth($phone, $smsMessage);
    echo 'done';
}

send();

?>
