<?php
require './db.php';
session_start();

$_SESSION['email'] = $mysqli->escape_string($_POST['email']);
$_SESSION['pwd'] = $mysqli->escape_string(password_hash($_POST['pwd'], PASSWORD_BCRYPT));
$pwd = $_SESSION['pwd'];
$email = $_SESSION['email'];
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );

// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());
// We know user email exists if the rows returned are more than 0

if ( $result->num_rows > 0 ) {
    echo 'User with this email already exists!';
}
else { // Email doesn't already exist in a database, proceed...
    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (email, password, hash, committee_name, Notes, colorP, colorS,logo, committee_topic, crisisName, crisisTopic, crisisNotes, directive) VALUES ('$email','$pwd', '$hash', 'Committee Name', '<p>Type Notes Here</p>', '#c0b283', '#373737','./img/runmunlogo1.png','Committee Topic','Crisis Name','Crisis Topic', '<p>Type Notes Here</p>',' ')";
    // Add user to the database
    if ($mysqli->query($sql)){
	    //Create user table of delegates
    	$id = $mysqli->insert_id;
    	$table_id = "$id" . "table";
    	
	$sql = "CREATE TABLE $table_id ( 
	id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	Delegate_Name VARCHAR(50),
	Status VARCHAR(30),
	Statistics VARCHAR(1000),
	Image VARCHAR(10000000)
	)";
	
	if ($mysqli->query($sql)){
		$table_id = "$id" . "tableCrisis";
    	
		$sql = "CREATE TABLE $table_id (
		id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		Delegate_Name VARCHAR(50),
		Status VARCHAR(30),
		Statistics VARCHAR(1000),
		Image VARCHAR(10000000)
		)";
		$mysqli->query($sql);
		
	        $_SESSION['email'] = $user['email'];
        	$_SESSION['id'] = $user['id'];
        
       		$_SESSION['logged_in'] = true;
        	echo 'profile';
	}
    }
    else {
        echo 'Registration failed!';
    }
}
?>
