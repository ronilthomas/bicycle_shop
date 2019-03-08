<!DOCTYPE html>
<html>
<head>
	<title>Staff Login</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="custom/js/jquery.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="custom/css/custom.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


    <script type="text/javascript" src="custom/js/jquery.js"></script>

    <script type="text/javascript">

  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
});


</script>

<script>
  
  $(document).ready(function(){
  $('#loginbutton').click(function(){
           var user = 'staff';
           var email = $('#email').val();  
           var password = $('#password').val();  
           if(email != '' && password != '')
           {
              $.ajax({
                url:"dbvalidation.php",
                method:"POST",
                data:{email:email,password:password, user:user},
                success:function(data)
                {
                  if(data == 'username and password do not match')
                  {
                    $("#errormsgs").append("Invalid Credentials");
                    //alert('username and password do not match');
                  }
                  else if(data == 'login validated')
                  {
                    //header("location: profile.php");
                    window.location.href = "staffprofile.php";
                    //alert('some error');
                  }
                  else if(data == 'User does not exist')
                  {
                    $("#errormsgs").append("User does not exist");
                  }
                  else if(data == 'connected')
                  {
                    $("#errormsgs").append("connected");
                  }
                  else
                  {
                    alert('some error');
                  }
                }
              });
           }
           else
           {
            alert('empty');
           }
  });
});

</script>


</head>
<body background="images/background.jpg">


<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div id="mod" style="margin-left: 85px;" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>



      <div class="modal-body">
         <div> <!-- was form -->
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control is-valid" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control is-invalid" id="password" name="password" placeholder="Password">
  </div>
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      Check me out
    </label>
  </div>
  <div id="errormsgs"></div>
  <button id="loginbutton" type="submit" class="btn btn-primary">Login</button><br>
  <a style="color: black;" id="registerlink" href="staffregister.php" class="card-link">Register Now</a>
  


</div> <!-- was form -->




         
      </div>
     
    </div>
  </div>
</div>



<ul>  
      <li class="list-group-item"><a href="home.php">Home</a></li>
      <li class="list-group-item"><a href="about.php">About</a></li>
      <li class="list-group-item"><a href="contact.php">Contact</a></li>
      <li class="list-group-item"><a href="home.php">Students</a></li>

      <li class="list-group-item float-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
        Login/Register
        </button>
      </li>
    </ul>

</body>
</html>