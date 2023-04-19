<?php
	//Creating Php Constants
  $hostname = "localhost";
  $hostuser = "root";
  $hostpass = "";
  $dbname = "houses";
  $conn = new mysqli($hostname, $hostuser, $hostpass, $dbname); 

	//Verify The Connection
	if ($conn -> connect_error){
		die("Connection Failed" . $conn->connect_error);
	}
	else {
		// print "Connection Successfull";
	}
