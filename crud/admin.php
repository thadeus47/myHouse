
<?php
	// Start Session
	session_start();

	// Import database connection
	include "../Connection/dbConnect.php";

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
				 <?php
			        if(isset($_SESSION["control"])){

			      ?>
			      <div style="float: right; margin-bottom: 30px; color: #744BCE;" class="usertitle">
			        Welcome <?php print $_SESSION["control"]["username"]; ?>
			      </div>
			      <?php
			        }
			      ?>
				<?php
                    if(isset($_SESSION["success"])){
                        $success = $_SESSION["success"];
                        echo "<center style='color: red;'>" . $success . "</center>";
                    }
                ?>  

		<table>
			<thead>
				<tr>
					<th> User ID </th>
					
					<th> Username </th>
					<th> Email </th>
					
					
					
				</tr>
			</thead>
			<?php
				$sql = "SELECT * FROM myusers";
				$query = $conn -> query($sql);
				if ($query -> num_rows > 0) {
					while ($row = mysqli_fetch_object($query)) {
						// $status = ($row -> status==1)?'Active':'Suspend';
			?>
			<tbody>
				<tr>
					<td> <?php echo $row ->id?> </td>
					
					<td> <?php echo $row ->username?> </td>
					<td> <?php echo $row ->email?> </td>
					
					<td> <a href="../crud/editusers.php?edited=1&id=<?php echo $row->id ?>">  Edit</a> </td>
					<td> <a href="../DB/userProcess.php?delete=1&id=<?php echo $row->id?>" onclick="return confirm('Are you sure you want to delete  <?php echo $row ->username ?>  from the database?')"> Delete </a> </td>
				</tr>
			</tbody>

			<?php
					}
				}else{
					echo "Error";
				}
			?>
		</table>
	</section>

</body>
</html>

<?php
	unset($_SESSION["success"])
?>