<?php
session_start();
$_SESSION['message'] = ''; 
$mysqli = new mysqli('localhost','root','','project_spw');
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if($_POST['password'] == $_POST['confirmpassword'])
  {
    $firstname = $mysqli->real_escape_string($_POST['firstname']);
    $date = time(); 
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']); 
    $passwordtodb = password_hash("$password", PASSWORD_DEFAULT);
    $active = '1';

    $sql="SELECT * FROM stafftable WHERE email = ?";
    if(!$stmt=$mysqli->prepare($sql))
    {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    if(!$stmt->bind_param("s",$email))
    {
      echo "Binding failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    if(!$stmt->execute())
    {
      echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    //$result=$stmt->get_result();
    //while($row=$result->fetch_object()){
      //$results=$row;
    //}

    //$result= $mysqli->query("SELECT * FROM registration_details WHERE email = '$email'") or die($mysqli->error());
      if(!$stmt->fetch())
      {
       $_SESSION['message'] = "Invalid Details!";
       echo $_SESSION['message'];
      }
      /*$password = $mysqli->real_escape_string($_POST['password']);
     $salt = bin2hex(random_bytes(32));
      hash_hmac('md5', '$password', 'secret');*/
      else
      {
        //$sql = "INSERT INTO registration_details (registered_date, first_name, email, password)"
        //. "VALUES ('$date', '$firstname', '$email', '$passwordtodb')";
        $stmt->close();
        $sql1 = "UPDATE stafftable SET password=?, active=? WHERE email=?";
        if(!$stmt = $mysqli->prepare($sql1))
        {
          echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
        
        if(!$stmt->bind_param('sis', $passwordtodb, $active, $email))
        {
          echo "Binding failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
        $stmt->execute();

        if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        else
        {
          session_start();
          $_SESSION['message'] = 'Registered Successfully!';
          $_SESSION['staffemail'] = $email;
          $_SESSION['first_name'] = $firstname;
          header("location: staffprofile.php"); 
        }

        /*if($stmt1->execute() === true)
        {
          $_SESSION['message'] = 'Registered Successfully!';
          $_SESSION['email'] = $email;
          $_SESSION['first_name'] = $firstname;
          header("location: profile.php");
        }*/
        /*else
        {
          echo 'Not reg successfully';
        }*/
      }
    
  }
  else
    {
      //echo "Passwords dont match";
      $_SESSION['message'] = 'Passwords dont match';
    }
}

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="custom/css/custom.css">
  </head>
  <body background="images/background.jpg">
  
  <!-- <header>
    <ul>
      <li class="list-group-item">Home</li>
      <li class="list-group-item">About</li>
      <li class="list-group-item">Contact</li>
    </ul>
  </header> -->

    <!-- style="background-image:url(images/form3.jpg)" -->
    <form method="POST" action="staffregister.php">
  <div class="form-group">
    <label for="Firstname">First Name</label>
    <input type="text" class="form-control" name="firstname" id="Firstname" aria-describedby="emailHelp" placeholder="First Name" required>
    </div>    
  <div class="form-group">
    <label for="Email">Email address</label>
    <input type="email" class="form-control" name="email" id="Email" aria-describedby="emailHelp" placeholder="Enter email" required>
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="Password1">Password</label>
    <input type="password" class="form-control" name="password" id="Password1" placeholder="Password" required>
  </div>
  <div class="form-group">
    <label for="Password2">Confirm Password</label>
    <input type="password" class="form-control" name="confirmpassword" id="Password2" placeholder="Password" required>
  </div>
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Register</button><br>
  <a id="loginlink" href="home.php" class="card-link">Login</a>
  <?php
    echo $_SESSION['message'];
  ?>

</form>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> -->

  </body>
</html>

