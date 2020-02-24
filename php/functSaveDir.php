<?php
/* Displays user information and some useful messages */
require './db.php';
session_start();

$types = $_POST['dirType'];
$titles = $_POST['dirTitle'];
$dels = $_POST['dirDel'];
$sums = $_POST['dirSum'];
$status = $_POST['dirStatus'];
$empty = $_POST['empty'];
$id = $_SESSION['id'];
if (!$empty) {
	
	$i = 0;
	$finalArray = Array();
	
	foreach ($types as &$type) {
		$array = Array();
		$array[] = $type;
		$array[] = $titles[$i];
		$array[] = $dels[$i];
		$array[] = $status[$i];
		$array[] = $sums[$i];
	
		$finalArray[] = $array;
	
		$i++;
	}
	
	$finalJSON = json_encode($finalArray);
	$sql = "UPDATE users SET directive='$finalJSON' WHERE id=$id";
	$result = $mysqli->query($sql);	
}
else {
	$sql = "UPDATE users SET directive='' WHERE id=$id";
	$result = $mysqli->query($sql);	
}
?>