<?php
require './db.php';
session_start();

$email = $_SESSION['email'];
$id = $_SESSION['id'];

$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

$user = $result->fetch_assoc();

$committeeName = $user['committee_name'];
$committeeTopic = $user['committee_topic'];	
$crisisName = $user['crisisName'];
$crisisTopic = $user['crisisTopic'];
$colorP = $user['colorP'];
$colorS = $user['colorS'];
$notes = $user['Notes'];
$crisisNotes = $user['crisisNotes'];
$logo = $user['logo'];
$directive =  json_decode($user['directive']);

$array = Array();
$array[] = $email;
$array[] = $logo;
$array[] = $colorP;
$array[] = $colorS;
$array[] = $committeeName;
$array[] = $committeeTopic;
$array[] = $notes;
$array[] = $crisisName;
$array[] = $crisisTopic;
$array[] = $crisisNotes;
$array[] = $directive;

$table = $id . $_POST['type'];
$delArray = Array();
$statusArray = Array();
$statsArray = Array();
$imgArray = Array();
$result = $mysqli->query("SELECT * FROM $table");

while($row = $result->fetch_assoc()) {
	$delArray[] = $row['Delegate_Name'];
	$statusArray[] = $row['Status'];
	$statsArray[] = $row['Statistics'];
	$imgArray[] = $row['Image'];
}

$finalArray = Array();
$finalArray[] = $array;
$finalArray[] = $delArray;
$finalArray[] = $statusArray;
$finalArray[] = $statsArray;
$finalArray[] = $imgArray;
$output = json_encode($finalArray);

echo $output;
?>
