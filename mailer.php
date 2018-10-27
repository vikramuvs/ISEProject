<?php
function mailfn($toAddress, $code)
{
    $combined = $toAddress.'+'.$code;

    $encrypted_code = encrypt_decrypt('encrypt', $combined);

    $sub = '[verifymail] Kindly verify your email for Circulars Application.';
    $msg = 'Dear user, \n Kindly click on the given link to activate your account. \n'.'http://172.1.30.20:8888/site1/userverify.php?code='.$encrypted_code;

    if (mail($toAddress, $sub, $msg))
      return true;
    else
      return false;
}

?>