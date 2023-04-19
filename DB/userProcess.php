<?php
	// Start Session
	session_start();

	// Import database connection
	require_once "../Connection/dbConnect.php";

	

if (isset($_POST["addusers"])){
		// Declaring the variables
		
		$username= mysqli_real_escape_string($conn, $_POST['username']);
		$Email = mysqli_real_escape_string($conn, $_POST['email']);	
		$Password = mysqli_real_escape_string($conn, $_POST['password']);
		// $cPassword = mysqli_real_escape_string($conn, $_POST['ConfirmPassword']);

		// if ($Password != $cPassword) {
		// 	$error = "Password does not match confirm password";
		// 	$_SESSION["error"] = $error;
		// 	header("Location: ../Templates/register.php?Signup=Failed");
		// 	exit();
		// }

		// if(isset($_POST['textid'])=="0"){
		// 	echo "add";
		// }else{
		// 	echo "update";
		// }

		$unames = "SELECT * FROM myusers WHERE username = '$username' LIMIT 1";

		$dup_names = $conn -> query($unames);

		if ($dup_names -> num_rows > 0) {
			$error = "Username already exists.";
			$_SESSION["error"] = $error;
			header("Location: ../crud/admin.php?Adduser=Failed");
			exit();
		}
		// Encrypting Password
		$hashpass = password_hash($Password, PASSWORD_DEFAULT);

		//Insering into database
		$sql = "INSERT INTO myusers (username, email, password) VALUES ('$username', '$Email', '$hashpass')";

		// mysqli_query($conn, $sql);
		if ($conn -> query($sql) === TRUE) {
			$success = "User has been successfully added to the database.";
			$_SESSION["success"] = $success;
			header("Location:../crud/admin.php?Add Users = Success");
		}else{
			die("Failed to insert new record" . $conn-> error);
		}
	}
//Delete users from database
if (isset($_GET['delete'])) {

	$delete = "DELETE FROM myusers WHERE id={$_GET['id']}";
		
	if ($conn -> query($delete) === TRUE) {


			$success = "User has been successfully Deleted.";
			$_SESSION["success"] = $success;

			header("Location: ../crud/admin.php?Update=Successful");
			exit();
		}else{
			die("Failed to insert new record" . $conn-> error);
		}
}


$msg = "";
if(isset ($_POST['submitimg'])){
	$target = "../uploads/".basename($_FILES['houseimage']['name']);

    $housenumber = $_POST['housenumber'];
	$houseimage = $_FILES['houseimage']['name'];
	$housedesciption = $_POST['housedesciption'];
    
if (move_uploaded_file($_FILES['houseimage']['tmp_name'], $target)) {
	$msg = "Image uploaded successfully";
	$sql = "INSERT INTO houses (housenumber, houseimage, housedesciption) VALUES ('$housenumber', '$houseimage', '$housedesciption')";
mysqli_query($conn, $sql);
}
else{
$msg = "There was an error uploading image";	
}
}
header("Location:../crud/admin.php?Add House = Success");
// Sign Out process
	if (isset($_GET["signout"])) {
		//destroy the session
		unset($_SESSION['control']);

		header("Location: ../login.html?Sign Out=Sucess");
		exit();
	}

?>