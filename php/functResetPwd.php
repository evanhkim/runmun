<?php 
/* Reset your password form, sends reset.php password link */
require './db.php';
session_start();

$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 ) // User doesn't exist
{ 
        echo 'fail';
}
else {
	$user = $result->fetch_assoc(); 
        $hash = $user['hash'];
        
        $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
        . " for a confirmation link to complete your password reset!</p>";

        // Send registration confirmation link (reset.php)
        $headers = "From: Noreply <runmun.support@runmun.app>";
        $to      = $email;
        $subject = 'RunMUN Reset Password';
        $message_body = "
        Hello!

        There has been a request to change the password of your RunMUN account.
        If this was you, you can reset your password at the link below.
        
        Please don't forward this email to anyone for account security.
        
        Thanks,
        
        -RunMUN
        
        https://runmun.app/runmun/reset?email=".$email."&hash=".$hash;  

        mail($to, $subject, $message_body, $headers);
	
	echo 'success';
}
?>
	