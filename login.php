<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $mysqli = new mysqli('localhost','root','','project_spw');
  $email = $mysqli->escape_string($_POST['email']);
  $result = $mysqli->query("SELECT * FROM registration_details WHERE email='$email'");

  if($result->num_rows == 0)
  {
    $_SESSION['message'] = "User does not exist";
  }
  else
  {
    $user = $result->fetch_assoc();
    if(password_verify($_POST['password'], $user['password']))
    {
      session_start();
      $_SESSION['email'] = $user['email'];
      $_SESSION['first_name'] = $user['first_name'];
      $_SESSION['logged_in'] = true;
      header("location: profile.php");
    }
    else
    {
      $_SESSION['message'] = "username and password do not match";
      echo $_SESSION['message'];
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="custom/css/custom.css">
  </head>
  <!-- <body background="images/background.jpg">
  
  <header>
    <ul>
      <li class="list-group-item">Home</li>
      <li class="list-group-item">About</li>
      <li class="list-group-item">Contact</li>
    </ul>
  </header> -->


    <form method="POST">
  <div class="form-group">
    <label for="Email">Email address</label>
    <input type="email" class="form-control" id="Email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password"placeholder="Password">
  </div>
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      Check me out
    </label>
  </div>
  <button onclick="" type="submit" class="btn btn-primary">Login</button><br>
  <a id="registerlink" href="register.php" class="card-link">Register Now</a>
</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> -->
  </body>
</html>