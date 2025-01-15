<?php 
include 'header.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShewaberOnline-About-Page</title>
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
     
      @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,500&family=Poppins:wght@300&display=swap');

      * {
        margin: 0;
        padding: 0;   
      }
      body {
        background-color: #3498db;
        font-family: 'Poppins', sans-serif;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      #Logo-1 {
        width: 80px;
        height: 100px;
        margin: 0px;
      }
      .home img {
        width: 200px;
        height: 200px;
      }
      .home h1 {
        padding: 10px;
      }
      .home h2 {
        padding: 10px;
      }
      .home table {
        width: 90%;
      }
      .home {
        text-align: center;
        width: 100%;
        margin: 5%;
        color: #fff;
        padding:150px  0 0 0;
      }
        
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
        #head #head1 {
          border-right: 3px solid #fff;
          padding-right: 15px;
        }
        .containall {
          background-repeat: no-repeat;
          background-size: cover;
          width: 200vh;
        }
        .home {
          text-align: center;
          width: 80%;
          height: 200vh;
          margin: 10%;
          color: #fff;
          padding: 150px 0 150px 0;
        }
        .home img {
          width: 200px;
          height: 200px;
        }
        .home h1 {
          padding: 50px;
        }
        .home h2 {
          padding: 25px;
        }
        .home table {
          margin-left: 30%;
          color: #fff;
        }
        .home p {
          padding: 20px;
        }
      }
      .aboutUsimage {
        width: 100%;
        height: 25px;
      }
    </style>

</head>
<body>
<div class= "containall">
  <div class= "aboutUsimage"><img src="image/about-Us.jpg" alt="about" width= 100% ></div>


<div class="home">

        <img src="image/logo.png" alt="logo" width= '200px' height= 'auto'>
        <h1>Faculty of Computing and Informatics <br>
            Department of Software Engineering
            </h1>
            <h2>
                web design and programing  project
            </h2>
            <table border="1" style="width:400px;">
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Id</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Bamelak Tesfaye </td>
                    <td>RU 0069/14</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Eman Hussen</td>
                    <td>RU 0279/14</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Kedir Jabir </td>
                    <td>RU 1914/14 </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Gemeda Tamiru </td>
                    <td>RU 0227/14</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Seid Hussein</td>
                    <td>RU 2194/14</td>
                </tr> 
                <tr>
                    <td>6</td>
                    <td>Sena Kebede</td>
                    <td>RU 0191/14 </td>
                </tr> 
                <tr>
                    <td>7</td>
                    <td>Sintayehu Bikila</td>
                    <td>RU 0207/14 </td>
                </tr>
            </table>
            <p>Submitted To: Mr. Samuel>
            <p>2016 E.C</p>
    </div>
    </div>


  <!--javascript bootstrap-->
  <script src="asset/js/bootstrap.bundle.min.js"></script>
</body>
</html>