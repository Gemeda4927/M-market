<?php 
include 'header.php';

session_start();

if (!isset($_SESSION['username'])) {

    header("Location: login.php");
}
else{
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M-Market-Home-Page</title>
    <!-- Bootstrap core CSS -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="asset/css/carousel.css" rel="stylesheet">
    <!--footer CSS-->
    <link href="asset/css/footers.css" rel="stylesheet">
    <!--Defulet CSS-->
    <link rel="stylesheet" href="mycss/homepage.css">
    <!--custom CSS-->
    <link rel="stylesheet" href="mycss/nav.css">
    <style>
      body {
          padding-top: 0;
          margin-top: 0;
      }
      .carousel-item {
        width: 100%;
        height: 500px;
        background-color: blue;
        padding: 4rem;
      }
      .text-end {
        display:flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-bottom: 4rem;
      }
      .text-end #text-end-par{
          
      }
      .carousel-caption h1,
      .featurette-heading {
          color: #26D751;
      }
      #mmarket {
          color: #ff2770;
      }
      .carousel-caption {
        text-align: right;
        margin-bottom:5rem;
      }
      .btn-primary {
        background-color: #00b4d8;
      }
    </style>

</head>
<body>
   <!-- <div class="test">
    
    <a href="logout.php">Logout</a>
    <br>
    </div>-->

    
<main>

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner" >
      <div class="carousel-item active" >
        <img src="image/sh1.jpg" alt="caro-3" >
        <div class="container" >
          <div class="carousel-caption text-start" >
            <h1>M-Market</h1>
            <p>Sign up today and make your life esay. wishing isn't destiny.</p>
            <p>live your dreame now! with digital world...</p>
            <p><a class="btn btn-lg btn-primary" href="shewawallet.php">Need a Wallet?</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="image/sh2.jpg" alt="caro-1" >
        <div class="container">
          <div class="carousel-caption">
            <h1 id="mmarket">M-Market</h1>
            <p>Buy evrything you want online. Begin Today!</p>
            <p><a class="btn btn-lg btn-primary" href="Shop.php">Buy Now</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="image/sh4.webp" alt="caro-2">
        <div class="container">
          <div class="carousel-caption text-end">
            <h3>One more for good measure.</h3>
            <p id="text-end-par">Look for some Object you want.</p>
            <p><a class="btn btn-lg btn-primary" href="Shop.php">Go To Shop</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <div class="container marketing">

   


    <!-- START THE FEATURETTES -->

  
    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">M-Market</h2>
        <h3>The all-in-one eCommerce platform</h3>
        <p class="lead">Simplify your online business with the ultimate all-in-one eCommerce platform. From seamless inventory management to powerful marketing tools, we've got everything you need to thrive in the digital marketplace. Take your business to new heights with ease and efficiency.</p>
      </div>
      <div class="col-md-5">
        <img src="image/showa1.png" alt="programings" id="p-1" >
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Embrace the Extraordinar</h2>
        <p class="lead">Discover a world where ordinary becomes extraordinary. Our products are designed to add that touch of magic to your everyday life. Embrace the extraordinary and unlock the endless possibilities that await you.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="image/showa2.jpg" alt="shewaberOnlinne-2" id="p-2" >
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Ignite Your Passion</h2>
        <p class="lead">Fuel your passion with our exceptional products. Whether you're a creative soul, an adventure seeker, or a trendsetter, we've got something that will ignite your passion and inspire you to chase your dreams.</p>
      </div>
      <div class="col-md-5">
        <img src="image/M_MARKET3.JPG" alt="M-Market-3" id="p-3" >
      </div>
    </div>

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->

 <!-- <footer class="container">
        
        <ul>
            <li><img src="image/fb.png" alt=""></li>
            <li><img src="image/ig.png" alt=""></li>
            <li><img src="image/in.png" alt=""></li>
            <li><img src="image/tw.png" alt=""></li>
            <li><img src="image/yu.png" alt=""></li>
        </ul>
    <h3>CODECHAT &copy; 2014E.C</h3>
</footer>-->
<!-- footer elment-->
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  
  <symbol id="facebook" viewBox="0 0 16 16">
    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
  </symbol>
  <symbol id="instagram" viewBox="0 0 16 16">
      <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
  </symbol>
  <symbol id="twitter" viewBox="0 0 16 16">
    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
  </symbol>
</svg>
<!-- footer elment-->
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <span class="text-muted">&copy; 2024 M-Market</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="340" height="40"><use xlink:href="#twitter"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="340" height="40"><use xlink:href="#instagram"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="340" height="40"><use xlink:href="#facebook"></use></svg></a></li>
    </ul>
  </footer>
</div>

  <!--javascript bootstrap-->
  <script src="asset/js/bootstrap.bundle.min.js"></script>
</body>
</html>