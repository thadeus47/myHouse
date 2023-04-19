<?php
	// Start Session
	session_start();

	// Import database connection
	require_once "Connection/dbConnect.php";
?>
<?php

	$uid = "SELECT * FROM myusers WHERE id = '{$_GET['id']}' LIMIT 1";

	$dup_id = $conn -> query($uid);

	$row = mysqli_fetch_object($dup_id);

	$id =  $row ->id;	
	
	$username =  $row ->username;	
	$email = $row ->email;	
	$password = $row ->password;
		
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
        <title>MY HOUSE</title>
        <meta name = "viewport" content = "width=device-width, initial-scale=1" />
        <meta charset = "uft-8" />
        <link rel = "stylesheet" href = "style.css" />
         <!-- <link rel = "stylesheet" href = "style.css" />-->
         <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>User Profile</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
      <!--/ Nav Star /-->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.html">My<span class="color-b">House</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">About</a>
          </li>
       
          <li class="nav-item">
            <a class="nav-link" href="php_stripe_paypage-master">Pay Rent</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Complain/Comment</a>
          </li>
        </ul>
<div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
            <?php
if($_SESSION['control']["usertype"] == "Admin") {
?>
 <li class="nav-item">
            <a class="nav-link" href="crud/admin.php">View Tenants</a>
          </li>
 <li class="nav-item">
            <a class="nav-link" href="allocate.php">Allocate House</a>
          </li>
 <li class="nav-item">
            <a class="nav-link" href="transactions.php">View Transactions</a>
          </li>

<?php
}
if($_SESSION['control']["usertype"] == "Owner") {
?>
<li class="nav-item">
            <a class="nav-link" href="allocate.php">Allocate House</a>
          </li>
<li class="nav-item">
            <a class="nav-link" href="crud/admin.php">View Tenants</a>
          </li>
<li class="nav-item">
            <a class="nav-link" href="transactions.php">View Transactions</a>
          </li>
<?php
}
  ?>
</div>
           
        </div>
        
            <li class = "nav-item">
              <li class = "nav-item">
               <a href="userprofile.php"> Hello <?php print $_SESSION['control']["username"]; ?></a>
                 </li>
                   <a href="server.php?signout">Sign Out</a>
            </li>  
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">Hello <?php print $_SESSION['control']["username"]; ?>  <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></li>
       
          <li class="divider dropdown-divider"></li>
          <li><a href="server.php?signout" class="dropdown-item"><i class="material-icons"></i> Logout</a></li>
        </ul>
     
               </div>   
      </nav>
      
    
  </nav>
  <!--/ Nav End /-->

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