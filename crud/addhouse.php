<?php
	// Start Session
	session_start();

	// Import database connection
	require_once "../Connection/dbConnect.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> MyHouse Dashboard </title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<script type="text/javascript" async defer src="https://buttons.github.io/buttons.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
	<section id="sidemenu">
		<nav>
			<a href="../cpanel.php" class="active"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
			<a href="admin.php"><i class="fa fa-cog" aria-hidden="true"> </i> View Users </a>			
			<a href="addusers.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Add User </a>
			<a href="viewhouse.php" class="active"><i class="fa fa-home" aria-hidden="true"></i> View House</a>
		<a href="../crud/addhouse.php" class="active"><i class="fa fa-home" aria-hidden="true"></i> Add House</a>
<a href="../crud/transactions.php" class="active"><i class="fa fa-home" aria-hidden="true"></i>View Transactions</a>
<a href="../crud/occupied.php" class="active"><i class="fa fa-home" aria-hidden="true"></i> View Occupied Houses</a>
<a href="../DB/userProcess.php?signout">Sign Out</a>
		</nav>
	</section>


	<section id="content-area">
		<form action="../DB/userProcess.php" method="POST" enctype = "multipart/form-data">
			<table style="border-radius: 25px;">
				
				<tr>
					<th>House Number</th>
					<td><input type="varchar" name="housenumber"></td>
				</tr>
				<tr>
					<th>House Image</th>
					<td><input type="file" name="houseimage"></td>
				</tr>
				
				<tr>
					<th>House Description</th>
					<td><textarea name="housedesciption" cols="40" rows="7" placeholder="House description"></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td><button type="submit" name="submitimg" class="btn"> Save </button></td>
				</tr>
			</table>
		</form>
		</table>
	</section>

</body>
</html>