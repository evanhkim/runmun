<?php
/* Password reset process, updates database with new user password */
require './db.php';
session_start();

$id = $_SESSION['id'];
$name = $_POST['name'];
$topic = $_POST['topic'];
$type = $_POST['type'];

if ($name) {
	if ($type == 'table') {
		$sql = "UPDATE users SET committee_name='$name' WHERE id=$id";
	}
	else {
		$sql = "UPDATE users SET crisisName='$name' WHERE id=$id";
	}
}
else {
	if ($type == 'table') {
		$sql = "UPDATE users SET committee_topic='$topic' WHERE id=$id";
	}
	else {
		$sql = "UPDATE users SET crisisTopic='$topic' WHERE id=$id";
	}
}
$result = $mysqli->query($sql);

echo $topic;