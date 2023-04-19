 
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
  <title>C_Panel</title>
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
            <a class="nav-link" href="about.php">About</a>
          </li>
       
          <li class="nav-item">
            <a class="nav-link" href="php_stripe_paypage-master">Pay Rent</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Complain/Comment</a>
          </li>
        </ul>
<!-- <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
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
               <a href="userProfile.php"> Hello <?php print $_SESSION['control']["username"]; ?></a>
                 </li>
                   <a href="server.php?signout">Sign Out</a>
            </li>  
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">Hello <?php print $_SESSION['control']["username"]; ?>  <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="userProfile.php" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></li>
       
          <li class="divider dropdown-divider"></li>
          <li><a href="server.php?signout" class="dropdown-item"><i class="material-icons"></i> Logout</a></li>
        </ul> -->
     
               </div>   
      </nav>
      
    
  </nav>
  <!--/ Nav End /-->


<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<!--/ Services Star /-->
  <section class="section-services section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Our Services</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-gamepad"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Lifestyle</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
               Please feel free to browse our featured listings. If you still don't find the home or Real Estate of your dreams there, please email us so we can start looking for the Property for you.
              </p>
            </div>
           
          </div>
        </div>
     
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-home"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Sell</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                We are real estate professionals with focus on sale of property, purchase of property, relocation services, property investments, property advise, real estate solutions, property management in furnished accommodation, 
              </p>
            </div>
            <
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Services End /-->

















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