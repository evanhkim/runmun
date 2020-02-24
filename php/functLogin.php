<?php
require './db.php';
session_start();

$email = $mysqli->escape_string($_POST['email']);
$pwd = $_POST['pwd'];

$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    echo "User does not exist.";
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($pwd, $user['password']) ) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['id'] = $user['id'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
	
	// Reset error message
    	$_SESSION['message'] = '';
        echo 'profile';
    }
    else {
        echo "The password is invalid.";
    }
}
?>
