<?php
ini_set('display_errors', 'On');
$username = 'root';
$password = 'root';
$connection = new PDO( 'mysql:host=localhost;dbname=Users', $username, $password );
?>