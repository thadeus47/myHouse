<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);


$dbh = new PDO('mysql:host=localhost;dbname=houses', 'root', '');

$stmt= $dbh->prepare("SELECT * FROM myusers;");
$stmt->excute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC;

	foreach () {
		
		echo $row['user_username'];
	}


?>