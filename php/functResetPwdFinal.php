<?php
/* Password reset process, updates database with new user password */
require './db.php';
session_start();

$new_password = password_hash($_POST['pwd'], PASSWORD_BCRYPT);
        
// We get $_POST['email'] and $_POST['hash'] from the hidden input field of reset.php form
$email = $mysqli->escape_string($_POST['email']);
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
 
$sql = "UPDATE users SET password='$new_password', hash='$hash' WHERE email='$email'";

if ( $mysqli->query($sql) ) {
	echo 'yes';
}
else {
	echo 'no';
}
?>