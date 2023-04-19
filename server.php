  <?php
    session_start();

    //$username = "";
    //$email = "";
    $errors = array();
   // $hostname = "localhost";
   // $hostuser = "root";
   // $dbname = "myhouse";
//connect to database
$db = mysqli_connect('localhost', 'root', '', 'houses');

//if the register button is clicked
if (isset($_POST['register'])) {
$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
$usertype = mysqli_real_escape_string($db, $_POST['usertype']);

//ensure that fields are filled properly
if (empty($username)) {
	array_push($errors, "Username is required");
}
if (empty($email)) {
	array_push($errors, "Email is required");
}
if (empty($password_1)) {
	array_push($errors, "Password is required");
}
if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
}

//if there are no errors, save user to database
if (count($errors) == 0) {
	$password = md5($password_1); //encrypt password before storing to database
	$sql = "INSERT INTO myusers (username, email, password, usertype)
	 VALUES ('$username', '$email', '$password', '$usertype')";
	
	mysqli_query($db, $sql);
	$_SESSION['username'] = $username;
	$_SESSION['success'] = "You are now logged in";
    header('location: login.html');//redirect to register page
  }

}
//log user in from log in page
if (isset($_POST['login'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);


//ensure that fields are filled properly
if (empty($username)) {
	array_push($errors, "Username is required");
}
if (empty($password)) {
	array_push($errors, "password is required");
}

if (count($errors) == 0 ) {

	$password = md5($password); 
	$spot_user = "SELECT * FROM myusers WHERE username = '$username' AND password = '$password' LIMIT 1";
	$result = mysqli_query($db, $spot_user);
	//$usertype = $row['usertype'];
	if(mysqli_num_rows($result) > 0 ){
		//log user in
	
	    $_SESSION['control'] = mysqli_fetch_assoc($result);
        header('location: cpanel.php');//redirect to homepage

	}else{
		print "The username/password does not exist";
		array_push($errors, "The username/password does not exist");
		
	}
}


}

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

		$unames = "SELECT * FROM mysusers WHERE username = '$username' LIMIT 1";

		$dup_names = $conn -> query($unames);

		if ($dup_names -> num_rows > 0) {
			$error = "Username already exists.";
			$_SESSION["error"] = $error;
			header("Location: ../crud/admin.php?Adduser=Failed");
			exit();
		}
		// Encrypting Password
		$hashpass = password_hash($password, PASSWORD_DEFAULT);

		//Insering into database
		$sql = "INSERT INTO customer (username, email, password) VALUES ('$username', '$email', '$hashpass')";

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

	$delete = "DELETE FROM customer WHERE UserID={$_GET['id']}";
		
	if ($conn -> query($delete) === TRUE) {


			$success = "User has been successfully Deleted.";
			$_SESSION["success"] = $success;

			header("Location: ../crud/admin.php?Update=Successful");
			exit();
		}else{
			die("Failed to insert new record" . $conn-> error);
		}
}
//images
$msg = "";
if(isset ($_POST['submitimg'])){
	$target = "uploads/".basename($_FILES['houseimage']['name']);

    $housenumber = $_POST['housenumber'];
	$houseimage = $_FILES['houseimage']['name'];
	$housedesciption = $_POST['housedesciption'];
    
$sql = "INSERT INTO houses (housenumber, houseimage, housedesciption) VALUES ('$housenumber', '$houseimage', '$housedesciption')";
mysqli_query($db, $sql);
if (move_uploaded_file($_FILES['houseimage']['tmp_name'], $target)) {
	$msg = "Image uploaded successfully";
}
else{
$msg = "There was an error uploading image";	
}
}
//allocating
if (isset($_POST['allocate'])) {
print_r($_POST);

//Array ( [houseslct] => 67 [tenantslct] => 5 [housedesciption] => gjhgjh [allocate] => )

$houseid = mysqli_real_escape_string($db, $_POST['houseslct']);
$userid = mysqli_real_escape_string($db, $_POST['tenantslct']);
$checkin= time();

$moredetails = mysqli_real_escape_string($db, $_POST['housedesciption']);

$sql = "INSERT INTO tenant_house (houseid, userid, checkin, moredetails) VALUES ('$houseid', '$userid', '$checkin', '$moredetails')";

mysqli_query($db, $sql);
 header('location: allocate.php');


}






// Sign Out process
	if (isset($_GET["signout"])) {
		//destroy the session
		unset($_SESSION['control']);

		header("Location: login.html?Sign Out=Sucess");
		exit();
	}
?>