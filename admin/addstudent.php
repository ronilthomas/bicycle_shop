<?php

if(isset($_POST['val']))
{

	$mysqli = new mysqli('localhost','root','','project_spw');
	$val= $_POST['val'];
/*	$val0 = strip_tags(htmlspecialchars($_POST['val']));
	$val1 = htmlspecialchars($_POST['val']);*/
	$val2 = htmlspecialchars(strip_tags($_POST['val']));
/*	$val3 = strip_tags($_POST['val']);
	$val4 = $mysqli->real_escape_string($_POST['val']);
	$val5 = htmlspecialchars_decode(strip_tags($_POST['val']));*/
	//$val3 = trim($_POST['val']);
/*	echo $val0.'</br>';
	echo $val1.'</br>';*/
	echo $val2.'</br>';
	echo htmlspecialchars($val2, ENT_QUOTES, 'UTF-8');
	
	$val3 = strip_tags($val);
	$val1 = htmlspecialchars($val3);
	//echo $val1.'</br>';
	echo $val3;
/*	echo $val3.'</br>';
	echo $val4.'</br>';
	echo $val5;*/
}

/*$val2 = htmlspecialchars(strip_tags($_POST['val']));
$val2 = htmlspecialchars(strip_tags($_POST['val']));
$val2 = htmlspecialchars(strip_tags($_POST['val']));
$val2 = htmlspecialchars(strip_tags($_POST['val']));*/


  ?>

  <!DOCTYPE html>
  <html>
  <head>
  	<title></title>
  	<meta charset="utf-8">
  </head>
  <body>
  	<form method="post" action="addstudent.php">
  		<input type="text" name="val">
  		<input type="submit" name="" value="Submit">

  	</form>

  	<!-- <b>123abc qwe123</b> -->
  	<!-- <b>123abc''/&lt;&lt;&lt; .'</>'' qwe123</b> -->
  
  </body>
  </html>