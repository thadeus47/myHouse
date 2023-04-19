<?php
	// Start Session
	session_start();

	// Import database connection
	require_once "../Connection/dbConnect.php";
?>
<?php

	$uid = "SELECT * FROM myusers WHERE id = '{$_GET['id']}' LIMIT 1";

	$dup_id = $conn -> query($uid);

	$row = mysqli_fetch_object($dup_id);

	$id =  $row ->id;	
	
	$username =  $row ->username;	
	$email = $row ->email;	
		
	if(isset($_POST['editusers'])){

	
	$username= mysqli_real_escape_string($conn, $_POST['username']);
	$Email = mysqli_real_escape_string($conn, $_POST['email']);
	

	$update = "UPDATE myusers SET  username='$username', email='$Email' WHERE id={$_GET['id']}";

	
	if ($conn -> query($update) === TRUE) {


			$success = "User has been successfully Edited.";
			$_SESSION["success"] = $success;

			header("Location: admin.php?Update=Successful");
			exit();
		}else{
			die("Failed to insert new record" . $conn-> error);
		}
}

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
		<form action="" method="POST">
			<table style="border-radius: 25px;">
				
				<tr>
					<th>Username</th><br>
					<td><input type="text" name="username" value="<?php echo $username; ?>"></td>
				</tr>
				<tr>
					<th>Email</th><br>
					<td><input type="email" name="email" value="<?php echo $email; ?>"></td>
				</tr>
				
				<!-- <tr>
					<th>Password</th>
					<td><input type="Password" name="Password" value="<?php echo $userid; ?>"></td>
				</tr> -->
				<tr>
					<td></td>
					<td><button type="submit" name="editusers" class="btn"> Save </button></td>
				</tr>
			</table>
		</form>
		</table>
	</section>

</body>
</html>