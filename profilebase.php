<?php  
/*include 'index.php';*/
if(!isset($_SESSION['email']))
{
  header("location: home.php");
}







?>

<!-- <!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
</head>
<body>

<div><a href="logout.php">Logout</a></div>
<br>
<br>
<br>


</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="custom/css/custom.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="custom/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>




    
    <!-- <script type="text/javascript">
  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
});
</script> -->
  </head>
  <body background="images/background.jpg">
    

    <!-- Register Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div id="mod" style="margin-left: 85px;" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

         <?php
         //require 'register.php';
        ?>
      </div> -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div> -->
<!--     </div>
  </div>
</div> -->


    <!-- Login Modal -->
<!-- <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div id="mod" style="margin-left: 85px;" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

         <?php
         //require 'login.php';
        ?>
      </div>
     
    </div>
  </div>
</div> -->
  

  <header>

    <!-- <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="images/logo.png" width="50" height="50" alt="">
  </a>
</nav> -->

    <!-- <img style="padding: 0; margin-top:-5px; display:inline; width: 100px; height: 70px;" src="images/logo1.png">
    <ul style="display:inline;"> -->
      
      <li class="list-group-item"><a href="home.php">Home</a></li>
      <li class="list-group-item"><a href="about.php">About</a></li>
      <li class="list-group-item"><a href="contact.php">Contact</a></li>
      <li class="list-group-item"><a href="bikes.php">My Bikes</a></li>

      <li class="list-group-item float-right">
        <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
        <?php 
        echo $_SESSION['first_name'];
        //echo "test";  ?>
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="account.php">Account</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
        </div>
      </li>
      <!-- <li class="list-group-item float-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
        Login/Register
        </button>
      </li> -->
    </ul>


 <!-- Button trigger modal -->



  </header>







<!-- <div class="list-group" style="width: 20%; background-color: pink; border-top-right-radius: 10px; border-bottom-right-radius: 10px; margin-top: 30px;">
  <a href="#" style="color: black;" class="list-group-item list-group-item-success list-group-item-action">Rentals</a>
  <a href="#" style="color: black;" class="list-group-item list-group-item-action">Amazing Deals</a>
  <a href="#" style="color: black;" class="list-group-item list-group-item-action">Best in Store</a>
  <a href="#" style="color: black;" class="list-group-item list-group-item-action">College Camps</a>
  <a href="#" style="color: black;" class="list-group-item list-group-item-action">Price List</a>
</div> -->

<!-- <footer style="background-color: grey; color: black; height: 100px; margin-top: 30px; display: block;">
  <p>Please register with us!</p>
</footer> -->
 
  </body>



</html>