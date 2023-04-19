<?php   require_once "Connection/dbConnect.php"; 

    session_start();
      ?>
<!DOCTYPE html>
<html>
    <head>
       
       <!-- <link rel = "stylesheet" href = "style.css" />-->
         <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Sign Up</title>
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
    <body class="bg-dark">
  <!--/ Nav Star /-->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="cpanel.php">My<span class="color-b">House</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="cpanel.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
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
            <a class="nav-link" href="crud/transactions.php">View Transactions</a>
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
               </div>   
      </div>
      
    
  </nav>
  <!--/ Nav End /-->
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>


       
        <div class = "header">
      
        </div>


          <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold text-primary">Allocate House</h1>
        <hr class="bg-light">
        <!--<h5 class="text-center text-success"><?= $result; ?></h5>-->
        <form action="server.php" method="post" id="form-box" class="p-2">
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-home"></i>  </span>
            </div>
             <select name="houseslct" required>
              <?php 
$spot_hse = "SELECT * FROM houses";
$spot_hse_res = $conn->query($spot_hse);
if ($spot_hse_res->num_rows < 1) {
  print '<option value="Tenant">No House Available</option>';
}else{
              ?>
               <option value="">--Please Select House--</option>
<?php while($row = $spot_hse_res->fetch_assoc()){ ?>
               <option value="<?php print $row['housenumber']; ?>">Hse No <?php print $row['housenumber']; ?></option>
<?php
}
}
?>
             </select>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>


           <select name="tenantslct" required>
<?php
$spot_tnt = "SELECT * FROM myusers WHERE usertype = 'Tenant' ";
$spot_tnt_res = $conn->query($spot_tnt);
if ($spot_tnt_res->num_rows < 1) {
  print '<option value="">No Tenant Available</option>';
}else{
              ?>
               <option value="">--Please Select Tenant--</option>
<?php while($row = $spot_tnt_res->fetch_assoc()){ ?>
 <option value="<?php print $row['id']; ?>"><?php print $row['fullname'] . " ( " . $row['username'] . " ) " ; ?></option>
<?php
}
}
?>



             </select>
<?php
//date_default_timezone_set("Africa/Nairobi");
//print date("Y-F-d H:i:s", 1552580715);
//print date("Y-F-d H:i:s", $row['checkin'] );
?>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <textarea name="housedesciption" cols="40" rows="7" placeholder="More Details"></textarea>
          </div>
       
           <div class="form-group">
                           <button type="submit" name="allocate" class="btn btn-primary btn-block">Allocate</button>
                       </div>
         
        </form>
      </div>
    </div>
  </div>

         <!--/ footer Star /-->
  <section class="section-footer">
    <div class="container">
      <div class="row">
      
       
        <div class="col-sm-12 col-md-4 section-md-t3">
         
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
         
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-dribbble" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">MyHouse</span> All Rights Reserved.
            </p>
          </div>
          
        </div>
      </div>
    </div>
  </footer>
  <!--/ Footer End /-->


    <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/scrollreveal/scrollreveal.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
    </body>
</html>