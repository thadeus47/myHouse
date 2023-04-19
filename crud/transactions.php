<!--date_default_timezone_set("Africa/Nairobi");-->
<?php
	// Start Session
	//session_start();

	// Import database connection
	include "../server.php";

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
	</section>-->


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
					<th> Transaction ID </th>
					<th> Customer ID </th>
					<th> Product ID </th>
					<th> Amount </th>
					<th> Currency </th>
					<th> Status </th>					
					
					
					
					
				</tr>
			</thead>
			<?php
				$sql = "SELECT * FROM transactions";
				$result = mysqli_query($db, $sql);
				
					if ($result -> num_rows > 0) {
					while ($row = mysqli_fetch_object($result)) {
						// $status = ($row -> status==1)?'Active':'Suspend';
			?>
			<tbody>
				<tr>
					<td> <?php echo $row ->id?> </td>
					
					<td> <?php echo $row ->customer_id?> </td>
					<td> <?php echo $row ->product?> </td>
					<td> <?php echo $row ->amount?> </td>
					<td> <?php echo $row ->currency?> </td>
					<td> <?php echo $row ->status?> </td>
					
					
					<td> <a href="../crud/editusers.php?edited=1&houseid=<?php echo $row->houseid ?>">  Edit</a> </td>
					<td> <a href="../DB/userProcess.php?delete=1&houseid=<?php echo $row->houseid?>" onclick="return confirm('Are you sure you want to delete house <?php echo $row ->housenumber ?>  from the database?')"> Delete </a> </td>
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

