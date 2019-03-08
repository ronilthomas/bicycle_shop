<?php

session_start();
if(isset($_SESSION['email']))
{
	$_SESSION['message'] = 'Welcome';
}
else
{
	//die( "Login required." );
	header("location: home.php");
}

//$_SESSION['name']='Thomas Ronil';

require 'profilebase.php';


?>

<!DOCTYPE html>
<html>
<head>
	<title>Account</title>
	<script type="text/javascript" src="custom/js/jquery.js"></script>

    
    <script type="text/javascript">

  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
});


</script>

<!-- <script type="text/javascript">
	$(document).ready(function(){
		$('#loginbutton').click(function(){
			$.ajax({
				url:"dbvalidation.php",
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
                    window.location.href = "profile.php";
                    //alert('some error');
                  }
			})
		})
	})
</script> -->
</head>


<body>

  <!-- <button id="" type="submit" class="btn btn-primary">Yes</button><br>
  <button id="" type="submit" class="btn btn-primary">No</button> -->

<div class="modal fade" id="accountdeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div id="mod" style="margin-left: 85px;" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Account Deletion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>



      <div class="modal-body">
         <div> <!-- was form -->
  <!-- <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control is-valid" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div> -->
  <!-- <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control is-invalid" id="password" name="password" placeholder="Password">
  </div> -->
 <!--  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      Check me out
    </label>
  </div> -->
  
  <button onclick="window.location.href='deleteaccount.php'" id="yesdeleteaccount" type="submit" class="btn btn-primary">Yes
  	<!-- <a href="deleteaccount.php"></a> -->
  </button><br>
  <button id="" type="submit" class="btn btn-primary">No</button>
  
  <!-- <?php
         //echo $_SESSION['message'];
        ?> -->


</div> <!-- was form -->




         
      </div>
     
    </div>
  </div>
</div>




<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#accountdeleteModal">
        Delete Account
        </button>






</body>
</html>