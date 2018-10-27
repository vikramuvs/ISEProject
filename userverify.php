<?php
include('dbi.php');
include('encryption.php');

$encryptedCode = $_GET['code'];

$decryptedCode = encrypt_decrypt('decrypt', $encryptedCode);

$splitStrings = explode("+", $decryptedCode);

$email = $splitStrings[0];
$code = $splitStrings[1];

$query = "SELECT * FROM tbl_Users WHERE UserName = '$email' and (verifyCode = '$code' and isVerified = 0);";

if ($result = mysqli_query($connection, $query))
{
	$q = "UPDATE tbl_Users SET isVerified = 1 where UserName = '$email' and (verifyCode = '$code' and isVerified = 0); ";
	mysqli_query($connection, $q);
	echo 'Thank You for validating your email address.'.'<br>' . 'Please proceed to the login page to login.';
}
else
	echo 'Oops! Something went wrong. Please contact system administrator.';



?>