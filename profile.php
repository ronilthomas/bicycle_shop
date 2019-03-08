<?php

session_start();
if(isset($_SESSION['email']))
{
	require 'profilebase.php';
}
else
{

	header("location: home.php");
}





?>


<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
</head>
<body>

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

</body>
</html>