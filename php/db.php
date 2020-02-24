<?php
/* Database connection settings */
$host = 'localhost';
$user = 'runmun';
$pass = 'runmun123';
$db = 'runMun';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
?>