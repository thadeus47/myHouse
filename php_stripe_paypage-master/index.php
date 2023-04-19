<?php
    session_start();
  require_once "../Connection/dbConnect.php";

     ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel = "stylesheet" href = "myHouse/css/style.css" />

    <!-- <link rel = "stylesheet" href = "style.css" />-->
         <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>C_Panel</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../css/style.css" rel="stylesheet">
 
  <title>Pay Page</title>
</head>
<body>

       <div><!--/ Nav Star /-->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>

        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="../cpanel.php">My<span class="color-b">House</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="../cpanel.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
       
          <li class="nav-item">
            <a class="nav-link" href="../php_stripe_paypage-master/index.php">Pay Rent</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../contact.php">Complain/Comment</a>
          </li>
        </ul>
<div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
            <?php
if($_SESSION['control']["usertype"] == "Admin") {
?>
<ul class="navbar-nav">
 <li class="nav-item">
            <a class="nav-link" href="../crud/admin.php">View Tenants</a>
          </li>
 <li class="nav-item">
            <a class="nav-link" href="../allocate.php">Allocate House</a>
          </li>
 <li class="nav-item">
            <a class="nav-link" href="../crud/transactions.php">View Transactions</a>
          </li>
</ul>
<?php
}
if($_SESSION['control']["usertype"] == "Owner") {
?>
<ul class="navbar-nav">
<li class="nav-item">
            <a class="nav-link" href="../allocate.php">Allocate House</a>
          </li>
<li class="nav-item">
            <a class="nav-link" href="../crud/admin.php">View Tenants</a>
          </li>
<li class="nav-item">
            <a class="nav-link" href="../crud/transactions.php">View Transactions</a>
          </li>
          </ul>
<?php
}
  ?>
</div>
           
        </div>
        <ul class="navbar-nav">
            <li class = "nav-item">
              <li class = "nav-item">
               <a href="userprofile.php"> Hello <?php print $_SESSION['control']["username"]; ?></a>
                 </li>
                   <a href="../server.php?signout">Sign Out</a>
            </li>  
            </ul>
               </div>   
    

    
  </nav>
</div>
  <!--/ Nav End /-->
      <div>
  <div class="container" >

<br />
<br />
<br />
<br />

    <h2 class="my-4 text-center"> Rent Payment </h2>
    <form margin-top=20 action="./charge.php" method="post" id="payment-form">
      <div class="form-row">

<?php

$userId = $_SESSION['control']["id"];

$spot_tenant_res = $conn->query("SELECT `tenant_house`.userid, `tenant_house`.`houseid`, `myusers`.email FROM `tenant_house` LEFT JOIN `myusers` ON (`myusers`.id = `tenant_house`.userid) WHERE `tenant_house`.userid = '$userId' AND `myusers`.usertype = 'Tenant'");

$spot_tenant_row = $spot_tenant_res->fetch_assoc();


?>

       <input type="text" name="1" class="form-control mb-3 StripeElement StripeElement--empty" value="<?php print $_SESSION['control']["username"]; ?>" disabled >
       <input type="text" name="2" class="form-control mb-3 StripeElement StripeElement--empty" value="House No: <?php print $spot_tenant_row["houseid"]; ?>" disabled >
       <input type="email" name="3" class="form-control mb-3 StripeElement StripeElement--empty" value="<?php print $_SESSION['control']["email"]; ?>" disabled>
       <input type="number" name="amount" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Enter Payment Amount">

<input type="hidden" name="first_name" value="<?php print $_SESSION['control']["username"]; ?>" />
<input type="hidden" name="house_id" value="House No: <?php print $spot_tenant_row["houseid"]; ?>" />
<input type="hidden" name="email" value="<?php print $_SESSION['control']["email"]; ?>" />

        <div id="card-element" class="form-control">
          <!-- a Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors -->
        <div id="card-errors" role="alert"></div>
      </div>

      <button>Submit Payment</button>
    </form>
  </div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="./js/charge.js"></script>

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
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../lib/popper/popper.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="../lib/easing/easing.min.js"></script>
  <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../lib/scrollreveal/scrollreveal.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../js/main.js"></script>

</body>
</html>
<?php
    unset($_SESSION["success"])
?>