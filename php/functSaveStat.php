<?php
/* Password reset process, updates database with new user password */
require './db.php';
session_start();

$id = $_SESSION['id'];
$table = $id . $_POST['type'];
$stat = $_POST['stat'];
$name = $_POST['name'];
$empty = $_POST['empty'];

if ($empty != 'yes') {
	$sql = "UPDATE $table SET Statistics='$stat' WHERE Delegate_Name='$name'";
	$result = $mysqli->query($sql);
}
else {
	$sql = "UPDATE $table SET Statistics='0,0,0,0,0'";
	$result = $mysqli->query($sql);
}
?>