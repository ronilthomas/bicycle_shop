<?php

session_start();
if(isset($_SESSION['email']))
{
  require 'profilebase.php';
}
/*elseif(isset($_SESSION['staffemail']))
{
  require 'staffprofile.php';
}*/
else
{
  //die( "Login required." );
  require 'noregbase.php';
}
/*require 'profilebase.php';*/
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>

<!--     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="custom/css/custom.css">


    <script type="text/javascript" src="custom/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> -->




  </head>
  <body background="images/background.jpg">
    



<div  id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" style="height: 400px;" src="images/bike8.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" style="height: 400px;" src="images/bike9.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" style="height: 400px;" src="images/bike10.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<div style="padding: 100px;" class="container-fluid">
  <div class="bikedisp">
    <a href="clothes.php">
    <img class="bikedisp_image" src="images/bike1.jpg" height="250" width="100%"></a>
    <h4 style="text-align: center;">Clothing</h4></div>
  <div class="bikedisp">
    <a href="repair.php">
    <img class="bikedisp_image" src="images/bike1.jpg" height="250" width="100%"></a>
    <h4 style="text-align: center;">Repair</h4></div>
  <div class="bikedisp">
    <a href="parts.php">
    <img class="bikedisp_image" src="images/bike1.jpg" height="250" width="100%"></a>
    <h4 style="text-align: center;">Parts</h4></div>
</div>

<footer style="background-color: grey; color: black; height: 100px; margin-top: 30px; display: block;">
  <p>Please registe rwith us!</p>
</footer>
 
  </body>

</html>

<!-- <div class="list-group" style="width: 20%; background-color: pink; border-top-right-radius: 10px; border-bottom-right-radius: 10px; margin-top: 30px;">
  <a href="#" style="color: black;" class="list-group-item list-group-item-success list-group-item-action">Rentals</a>
  <a href="#" style="color: black;" class="list-group-item list-group-item-action">Amazing Deals</a>
  <a href="#" style="color: black;" class="list-group-item list-group-item-action">Best in Store</a>
  <a href="#" style="color: black;" class="list-group-item list-group-item-action">College Camps</a>
  <a href="#" style="color: black;" class="list-group-item list-group-item-action">Price List</a>
</div> -->