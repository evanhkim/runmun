<?php
/* Displays user information and some useful messages */
require './db.php';
session_start();

$remDel = $_POST['remDel'];
$id = $_SESSION['id'];
$tableName = $id . $_POST['type'];

foreach ($remDel as &$del) {
	$sql = "DELETE FROM $tableName WHERE Delegate_Name = '$del'";
	$result = $mysqli->query($sql);
}
?>