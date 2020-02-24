<?php
/* Displays user information and some useful messages */
require './db.php';
session_start();

$delAdd = $_POST['delAdd'];
$imgDel = $_POST['imgDel'];
$id = $_SESSION['id'];
$tableName = $id . $_POST['type'];
$update = $_POST['update'];
$i=0;
if ($update == 'yes') {
	echo $delAdd[0];
	$sql = "UPDATE $tableName SET Image='$imgDel[0]' WHERE Delegate_Name='$delAdd[0]'";
	$result = $mysqli->query($sql);
}
else {
	foreach ($delAdd as &$del) {
		$sql = "INSERT INTO $tableName ( Delegate_Name,Status,Statistics,Image ) VALUES ( '$del','one','0,0,0,0,0','$imgDel[$i]')";
		$result = $mysqli->query($sql);
		$i++;
	}
}
?>