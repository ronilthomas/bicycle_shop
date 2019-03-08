<?php

session_start();
if(isset($_SESSION['email']))
{
  require 'profilebase.php';
}
else
{
  //die( "Login required." );
  require 'noregbase.php';
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Service</title>
</head>
<body>


<nav style="background-color: grey; margin-top: 10px; text-align: center;">
  <ul >
    <li style="margin-left: 15%;" class="navstuff"><b><a href="repair.php">Repair</a></b></li>
    <li class="navstuff"><b><a href="clothes.php">Clothes</a></b></li>
    <li class="navstuff"><b><a href="parts.php">Parts</a></b></li>
    <li class="navstuff"><b><a href="service.php">Service</a></b></li>
  </ul>
</nav>



<div class="container" style="background-color: yellow; margin-top: 30px;">
  <div style=" display: inline-block; height: 200px; width: 200px;">
    <img style="float: left; height: 200px; width: 200px;" src="images/bike1.jpg">
  </div>
  <div style="display: inline-block; height: 200px; width: 81%; background-color: blue;">
    <h4 style="float: left; margin-left: 30px;" >Service</h4>
    <p style="float: left; margin-left: 30px;">We can sort out all your repair problems. From punctures to pile ups, from brake blocks to broken bikes, so why not come in and talk to our experienced mechanics...
We take great pride in our repair work. All our mechanics are avid cyclists so you can be sure that your bike will get plenty of tender loving care.
Below are the prices for some of the more common repairs carried out in our workshop. Of course we can do far more than this. In fact our mechanics; Marcin, Antione and Michele love a challenge. They reckon they can have a good go at fixing even the most neglected bike!!</p>
  </div>
  <div style="background-color: pink;">
    <p>Repairs Price List</br>

Puncture Repair- from €12.00</br>
Tubes - 1 for €6.00 2 for €10.00</br>
New Tyre fixted - from €20.00</br>
New Tyre and Tube standard - from €25.00</br>
New Tyre kelvar (these are puncture resistant tyres) and Tube - from €50.00</br></br>
 
New Front Wheel - from €40.00</br>
New Rear Wheel - from €45.00</br>
Fix Buckle from - from €10.00</br>
Spoke Replacement - from €10.00</br>
Fit New Brake Blocks (pair) - from €12.00</br>
Fit New Cable and Casing (brake or gear) - from €15.00</br>
Service from - from €10-20€ +Parts</p>
  </div>

</div>

  

</body>
</html>
