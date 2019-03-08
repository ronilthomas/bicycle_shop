<?php

session_start();
if(isset($_SESSION['email']))
{
	$_SESSION['message'] = 'A Problem Occured';
}
else
{
	//die( "Login required." );
	header("location: home.php");
}

require 'noregbase.php';

$mysqli = new mysqli('localhost','root','','project_spw');
  //$email = $mysqli->escape_string($_POST['email']);
  $email = $_SESSION['email'];
  $sql = "UPDATE studenttable SET password=?, active=? WHERE email=?";
  $random = bin2hex(random_bytes(32));
  $password = password_hash("$random", PASSWORD_DEFAULT);
  $active = 2;


  if(!$stmt=$mysqli->prepare($sql))
      {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
      }
      if(!$stmt->bind_param("sis",$password, $active, $email))
      {
        echo "Binding failed: (" . $mysqli->errno . ") " . $mysqli->error;
      }
      if(!$stmt->execute())
      {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
      }
      $stmt->close();


        
        


  $_SESSION['logged_in'] = false;


  $_SESSION = array();
session_destroy();
$_SESSION['message'] = 'logged out';
echo $_SESSION['message']." ";
?>