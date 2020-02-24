<?php
/* Displays user information and some useful messages */
require './db.php';
session_start();

$content = $_POST['content'];
$type = $_POST['type'];

$id = $_SESSION['id'];

if ($type == 'crisis') {
	$sql = "UPDATE users SET CrisisNotes='$content' WHERE id=$id";
}
else if($type == 'committee'){
	$sql = "UPDATE users SET Notes='$content' WHERE id=$id";
}

$result = $mysqli->query($sql);
?>