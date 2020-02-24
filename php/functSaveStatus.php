<?php
/* Password reset process, updates database with new user password */
require './db.php';
session_start();

$id = $_SESSION['id'];
$table = $id . $_POST['type'];
$statusList = $_POST['statusList'];
$delList = $_POST['delList'];

$i = 0;
foreach ($statusList as &$status) {
	$sql = "UPDATE $table SET Status='$status' WHERE Delegate_Name='$delList[$i]'";
	$result = $mysqli->query($sql);
	$i++;
}
?>