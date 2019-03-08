<!DOCTYPE html>
<html>
<head>
  <title>Test Students</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="../custom/js/jquery.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../custom/css/custom.css">


    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>



</head>
<body background="../images/background.jpg">


  <ul>  
      <li class="list-group-item"><a href="home.php">Home</a></li>
      <li class="list-group-item"><a href="about.php">About</a></li>
      <li class="list-group-item"><a href="contact.php">Contact</a></li>

      
    </ul>


  

        <form method="POST" action="teststudents.php">
    <div class="form-group col-md-12">
      <label for="inputState">Course</label>
      <select id="inputState" name="course" class="form-control">
        <option selected>Choose...</option>
        <option>MSc in Cyber Security</option>
        <option>MSc in Cloud Computing</option>
        <option>MSc in Data Analytics</option>
        <option>MSc in Computer Science</option>
        <option>registration_details</option>
      </select>
    </div>

  <button id="showstudents" type="submit" class="btn btn-primary">Show Students</button>
</form>


<?php  

//to display all students in course
//to display all students in course
//to display all students in course
//to display all students in course

  if(isset($_POST['course']))
{

  $mysqli = new mysqli('localhost','root','','project_spw');
  $course = $mysqli->escape_string($_POST['course']);
  $result = $mysqli->query("SELECT * FROM $course");
  session_start();
  $_SESSION['course']=$course;
  //$_SESSION['result']=$result;
  echo $course;

  ?>

<div class="container-fluid">
  <div style="overflow-y: scroll; height: 150px;">  <!-- to seperate table from form -->
<table class="table table-striped" style="border: 1px solid black; ">
    <thead>
    <tr>
    <th>id</th>
    <th>registered_date</th>
    <th>first_name</th>
    <th>email</th>
    <!-- <tr>password</tr> -->
    </tr>
    </thead>

    <?php


while ($ppl = $result->fetch_assoc()) {?>

  
  <tr  id="<?php echo $ppl['id']; ?>"  >

  <td>  <?php echo $ppl['id'];  ?></td>
  <td>  <?php echo $ppl['registered_date'];  ?></td>
  <td>  <?php echo $ppl['first_name'];  ?></td>
  <td id="<?php echo $ppl['id'].'actualvalue'; ?>">  <?php echo $ppl['email'];  ?>  </td>

  <td>

    <!-- onclick="getid()" -->
    <!-- <form method="get"> -->
    <button id="<?php echo $ppl['id']; ?>" name="editbutton" class='editbutton btn btn-primary' data-value1="<?php echo $ppl['first_name']; ?>" data-value="<?php echo $ppl['email']; ?>">Edit</button>
    <!-- </form> -->
  </td>
  <td><button id="<?php echo $ppl['id']; ?>" class='deletebutton btn btn-primary' data-value1="<?php echo $ppl['first_name']; ?>" data-value="<?php echo $ppl['email']; ?>">Delete</button></td>
  </tr>
<?php  }

?>

</table>
</div> <!-- to seperate table from form -->

<!-- form -->
<form method="POST">
  <div class="form-group">
    <label for="userid">ID</label>
    <input type="text" class="form-control" id="userid" name="userid" placeholder="Id">
  </div required>

  <div class="form-group">
    <label for="useremail">Email address</label>
    <input type="email" class="form-control" id="useremail" name="useremail" aria-describedby="emailHelp" placeholder="Enter email" required>
  </div>
  <div class="form-group">
    <label for="userfirstname">First Name</label>
    <input type="text" class="form-control" id="userfirstname" name="userfirstname" placeholder="First Name" required>
  </div>
  
  <button id="formsubmitbtn" type="submit" class="btn btn-primary" name="adminaddstudent">Add Student</button>
</form>
</div>

<?php
}
?>
  <!-- <button id='addstudent' class='btn btn-primary'>Add Student</button> -->






<?php  
//to diplay added student with all students and form
//to diplay added student with all students and form
//to diplay added student with all students and form
//to diplay added student with all students and form
if(isset($_POST['adminaddstudent']))
{



 session_start();
  $course = $_SESSION['course'];
$mysqli = new mysqli('localhost','root','','project_spw');
$_SESSION['message'] = '';

if($_POST['useremail'] && $_POST['userfirstname'] != '')
  {
    $useremail = $mysqli->real_escape_string($_POST['useremail']);
    $date = time(); 
    $userfirstname = $mysqli->real_escape_string($_POST['userfirstname']);
    $passwordtodb = '';

    $checkifexists = $mysqli->query("SELECT * FROM registration_details WHERE email = '$useremail'") or die($mysqli->error());
      if($checkifexists->num_rows > 0)
      {
       $_SESSION['message'] = "email already exists!";
       echo $_SESSION['message'];
      }
      /*$password = $mysqli->real_escape_string($_POST['password']);
     $salt = bin2hex(random_bytes(32));
      hash_hmac('md5', '$password', 'secret');*/
      else
      {
        $sql = "INSERT INTO registration_details (registered_date, first_name, email, password)"
        . "VALUES ('$date', '$userfirstname', '$useremail', '$passwordtodb')";

        if($mysqli->query($sql) === true)
        {
          $_SESSION['message'] = 'Registered Successfully!';
          echo $_SESSION['message'];
          //$_SESSION['email'] = $email;
          //$_SESSION['first_name'] = $firstname;
          //header("location: profile.php");
        }
        else
        {
          echo 'Not reg successfully';
        }
      }
    
  }
  else
    {
      //echo "Passwords dont match";
      $_SESSION['message'] = 'Please fill out fields!';
    }







 
  
  $result = $mysqli->query("SELECT * FROM $course");
  /*$result = $_SESSION['result'];
  $mysqli = new mysqli('localhost','root','','project_spw');*/
  //$course = $mysqli->escape_string($_POST['course']);
  //$result = $mysqli->query("SELECT * FROM $course");
  echo $course;
  //echo "added student";


?>
<div class="container-fluid">
  <div style="overflow-y: scroll; height: 150px;">  <!-- to seperate table from form -->
<table class="table table-striped" style="border: 1px solid black; ">
    <thead>
    <tr>
    <th>id</th>
    <th>registered_date</th>
    <th>first_name</th>
    <th>email</th>
    <!-- <tr>password</tr> -->
    </tr>
    </thead>

    <?php


while ($ppl = $result->fetch_assoc()) {?>

  
  <tr  id="<?php echo $ppl['id']; ?>"  >

  <td>  <?php echo $ppl['id'];  ?></td>
  <td>  <?php echo $ppl['registered_date'];  ?></td>
  <td>  <?php echo $ppl['first_name'];  ?></td>
  <td id="<?php echo $ppl['id'].'actualvalue'; ?>">  <?php echo $ppl['email'];  ?>  </td>

  <td>

    <!-- onclick="getid()" -->
    <!-- <form method="get"> -->
    <button id="<?php echo $ppl['id']; ?>" name="editbutton" class='editbutton btn btn-primary' data-value1="<?php echo $ppl['first_name']; ?>" data-value="<?php echo $ppl['email']; ?>">Edit</button>
    <!-- </form> -->
  </td>
  <td><button id="<?php echo $ppl['id']; ?>" class='deletebutton btn btn-primary' data-value1="<?php echo $ppl['first_name']; ?>" data-value="<?php echo $ppl['email']; ?>">Delete</button></td>
  </tr>
<?php  }

?>

</table>
</div> <!-- to seperate table from form -->

<!-- form -->
<form method="POST">
  <div class="form-group">
    <label for="userid">ID</label>
    <input type="text" class="form-control" id="userid" name="userid" placeholder="Id">
  </div required>

  <div class="form-group">
    <label for="useremail">Email address</label>
    <input type="email" class="form-control" id="useremail" name="useremail" aria-describedby="emailHelp" placeholder="Enter email" required>
  </div>
  <div class="form-group">
    <label for="userfirstname">First Name</label>
    <input type="text" class="form-control" id="userfirstname" name="userfirstname" placeholder="First Name">
  </div required>
  
  <button id="formsubmitbtn" type="submit" class="btn btn-primary" name="adminaddstudent">Add Student</button>
</form>
</div>

<?php
}
?>
  <!-- <button id='addstudent' class='btn btn-primary'>Add Student</button> -->



<!-- to diplay edited student with all students and form -->
<!-- to diplay edited student with all students and form -->
<!-- to diplay edited student with all students and form -->
<!-- to diplay edited student with all students and form -->
<?php  
//to diplay edited student with all students and form
//to diplay edited student with all students and form
//to diplay edited student with all students and form
//to diplay edited student with all students and form
if(isset($_POST['admineditstudent']))
{



 session_start();
  $course = $_SESSION['course'];
$mysqli = new mysqli('localhost','root','','project_spw');
$_SESSION['message'] = '';

if($_POST['useremail'] && $_POST['userfirstname'] != '')
  {
    $userid = $_POST['userid'];
    $useremail = $mysqli->real_escape_string($_POST['useremail']);
    $date = time(); 
    $userfirstname = $mysqli->real_escape_string($_POST['userfirstname']);
    $passwordtodb = '';

    $checkifexists = $mysqli->query("SELECT * FROM registration_details WHERE email = '$useremail'") /*or die($mysqli->error())*/;
      if($checkifexists->num_rows > 0)
      {
          $_SESSION['message'] = "email exist!";
          echo $_SESSION['message'];
          /*$sql = "INSERT INTO registration_details (registered_date, first_name, email, password)"
          . "VALUES ('$date', '$userfirstname', '$useremail', '$passwordtodb')";*/
          

       
      }
      else
      {
          $sql = "UPDATE registration_details SET first_name='$userfirstname', email='$useremail' WHERE id='$userid'";
            
            if($mysqli->query($sql) === true)
            { echo $useremail;
              $_SESSION['message'] = 'Updated Successfully!';
              echo $_SESSION['message'];
              //$_SESSION['email'] = $email;
              //$_SESSION['first_name'] = $firstname;
              //header("location: profile.php");
            }
            else
            {
            echo 'Not updated successfully';
            } 
      }
    
  }
  else
    {
      //echo "Passwords dont match";
      $_SESSION['message'] = 'Please fill out fields!';
    }







 
  
  $result = $mysqli->query("SELECT * FROM $course");
  /*$result = $_SESSION['result'];
  $mysqli = new mysqli('localhost','root','','project_spw');*/
  //$course = $mysqli->escape_string($_POST['course']);
  //$result = $mysqli->query("SELECT * FROM $course");
  echo $course;
  //echo "added student";


?>
<div class="container-fluid">
  <div style="overflow-y: scroll; height: 150px;">  <!-- to seperate table from form -->
<table class="table table-striped" style="border: 1px solid black; ">
    <thead>
    <tr>
    <th>id</th>
    <th>registered_date</th>
    <th>first_name</th>
    <th>email</th>
    <!-- <tr>password</tr> -->
    </tr>
    </thead>

    <?php


while ($ppl = $result->fetch_assoc()) {?>

  
  <tr  id="<?php echo $ppl['id']; ?>"  >

  <td>  <?php echo $ppl['id'];  ?></td>
  <td>  <?php echo $ppl['registered_date'];  ?></td>
  <td>  <?php echo $ppl['first_name'];  ?></td>
  <td id="<?php echo $ppl['id'].'actualvalue'; ?>">  <?php echo $ppl['email'];  ?>  </td>

  <td>

    <!-- onclick="getid()" -->
    <!-- <form method="get"> -->
    <button id="<?php echo $ppl['id']; ?>" name="editbutton" class='editbutton btn btn-primary' data-value1="<?php echo $ppl['first_name']; ?>" data-value="<?php echo $ppl['email']; ?>">Edit</button>
    <!-- </form> -->
  </td>
  <td><button id="<?php echo $ppl['id']; ?>" class='deletebutton btn btn-primary' data-value1="<?php echo $ppl['first_name']; ?>" data-value="<?php echo $ppl['email']; ?>">Delete</button></td>
  </tr>
<?php  }

?>

</table>
</div> <!-- to seperate table from form -->

<!-- form -->
<form method="POST">
  <div class="form-group">
    <label for="userid">ID</label>
    <input type="text" class="form-control" id="userid" name="userid" placeholder="Id">
  </div required>

  <div class="form-group">
    <label for="useremail">Email address</label>
    <input type="email" class="form-control" id="useremail" name="useremail" aria-describedby="emailHelp" placeholder="Enter email" required>
  </div>
  <div class="form-group">
    <label for="userfirstname">First Name</label>
    <input type="text" class="form-control" id="userfirstname" name="userfirstname" placeholder="First Name">
  </div required>
  
  <button id="formsubmitbtn" type="submit" class="btn btn-primary" name="adminaddstudent">Add Student</button>
</form>
</div>

<?php
}
?>






<?php  
//to delete student with all students and form
//to delete student with all students and form
//to delete student with all students and form
//to delete student with all students and form
if(isset($_POST['admindeletestudent']))
{



 session_start();
  $course = $_SESSION['course'];
$mysqli = new mysqli('localhost','root','','project_spw');
$_SESSION['message'] = '';

if($_POST['useremail'] && $_POST['userfirstname'] != '')
  {
    $useremail = $mysqli->real_escape_string($_POST['useremail']);
    $date = time(); 
    $userfirstname = $mysqli->real_escape_string($_POST['userfirstname']);
    $passwordtodb = '';

    $checkifexists = $mysqli->query("SELECT * FROM registration_details WHERE email = '$useremail'") or die($mysqli->error());
      if($checkifexists->num_rows > 0)
      {
        $sql = "DELETE FROM registration_details WHERE email='$useremail'";

        if($mysqli->query($sql) === true)
        {
          $_SESSION['message'] = 'Deleted Successfully!';
          echo $_SESSION['message'];
          //$_SESSION['email'] = $email;
          //$_SESSION['first_name'] = $firstname;
          //header("location: profile.php");
        }
        else
        {
          echo 'Not deleted successfully';
        }
       
      }
      /*$password = $mysqli->real_escape_string($_POST['password']);
     $salt = bin2hex(random_bytes(32));
      hash_hmac('md5', '$password', 'secret');*/
      else
      {
        $_SESSION['message'] = "email does not exist!";
       echo $_SESSION['message'];
      }
    
  }
  else
    {
      //echo "Passwords dont match";
      $_SESSION['message'] = 'Please fill out fields!';
    }







 
  
  $result = $mysqli->query("SELECT * FROM $course");
  /*$result = $_SESSION['result'];
  $mysqli = new mysqli('localhost','root','','project_spw');*/
  //$course = $mysqli->escape_string($_POST['course']);
  //$result = $mysqli->query("SELECT * FROM $course");
  echo $course;
  //echo "added student";


?>
<div class="container-fluid">
  <div style="overflow-y: scroll; height: 150px;">  <!-- to seperate table from form -->
<table class="table table-striped" style="border: 1px solid black; ">
    <thead>
    <tr>
    <th>id</th>
    <th>registered_date</th>
    <th>first_name</th>
    <th>email</th>
    <!-- <tr>password</tr> -->
    </tr>
    </thead>

    <?php


while ($ppl = $result->fetch_assoc()) {?>

  
  <tr  id="<?php echo $ppl['id']; ?>"  >

  <td>  <?php echo $ppl['id'];  ?></td>
  <td>  <?php echo $ppl['registered_date'];  ?></td>
  <td>  <?php echo $ppl['first_name'];  ?></td>
  <td id="<?php echo $ppl['id'].'actualvalue'; ?>">  <?php echo $ppl['email'];  ?>  </td>

  <td>

    <!-- onclick="getid()" -->
    <!-- <form method="get"> -->
    <button id="<?php echo $ppl['id']; ?>" name="editbutton" class='editbutton btn btn-primary' data-value1="<?php echo $ppl['first_name']; ?>" data-value="<?php echo $ppl['email']; ?>">Edit</button>
    <!-- </form> -->
  </td>
  <td><button id="<?php echo $ppl['id']; ?>" class='deletebutton btn btn-primary' data-value1="<?php echo $ppl['first_name']; ?>" data-value="<?php echo $ppl['email']; ?>">Delete</button></td>
  </tr>
<?php  }

?>

</table>
</div> <!-- to seperate table from form -->

<!-- form -->
<form method="POST">
  <div class="form-group">
    <label for="userid">ID</label>
    <input type="text" class="form-control" id="userid" name="userid" placeholder="Id">
  </div required>


  <div class="form-group">
    <label for="useremail">Email address</label>
    <input type="email" class="form-control" id="useremail" name="useremail" aria-describedby="emailHelp" placeholder="Enter email" required>
  </div>
  <div class="form-group">
    <label for="userfirstname">First Name</label>
    <input type="text" class="form-control" id="userfirstname" name="userfirstname" placeholder="First Name">
  </div required>
  
  <button id="formsubmitbtn" type="submit" class="btn btn-primary" name="adminaddstudent">Add Student</button>



</form>
</div>

<?php
}
?>








</body>

<script type="text/javascript">
  $('.editbutton').click(function() {
    var editid = (this).id;
    var editemail = (this).getAttribute('data-value');
    var editname = (this).getAttribute('data-value1');
    //var btnname = $('#formsubmitbtn').attr('name');
    $('#userid').val(editid);
    $('#useremail').val(editemail);
    $('#userfirstname').val(editname);
    $('#formsubmitbtn').html('Edit');
    $('#formsubmitbtn').attr("name", "admineditstudent");
    //$('#formsubmitbtn').attr("id", "formeditbtn");
    
    
    

  });


//$('#formeditbtn').click(function(){
          /*$.ajax({
      //url:"teststudents.php",
      method:"POST",
      data:{useremail:useremail,userfirstname:userfirstname}
    });*/
    //$('#useremail').val('new');
    //$('#userfirstname').val('new');
    //$('#formsubmitbtn').html('Add');
    //$('#formsubmitbtn').attr("name", "adminaddstudent");
      //  });





$('.deletebutton').click(function() {
    var deleteemail = (this).getAttribute('data-value');
    var deletename = (this).getAttribute('data-value1');
    //var btnname = $('#formsubmitbtn').attr('name');
    
    $('#useremail').val(deleteemail);
    $('#userfirstname').val(deletename);
    $('#formsubmitbtn').html('Delete');
    $('#formsubmitbtn').attr("name", "admindeletestudent");
    $('#formsubmitbtn').attr("id", "formdeletebtn");
    //console.log(btnname);


    //console.log(deleteid);
    //console.log(deletename);
    

    //var deleteid = (this).value;
    //var x = document.getElementById("7");
    //var x=(this).innerHTML;
    //alert(x);
    //var x = $(this).html();
    //var x = $(this).parent().parent().get( 0 );
    //var x = deleleid+actualvalue
    

    //console.log( $(this).parent().parent().get( 0 ) );
    //alert(deleteid);
    //var x=document.getElementById('deleteid');
    //var y=x.stringify();
    //console.log(JSON.stringify(x));
    
    

});

//$('#formdeletebtn').click(function(){
          /*$.ajax({
      //url:"teststudents.php",
      method:"POST",
      data:{useremail:useremail,userfirstname:userfirstname}
    });*/
   // $('#useremail').val('new');
    //$('#userfirstname').val('new');
    //$('#formsubmitbtn').html('Add');
    //$('#formsubmitbtn').attr("name", "adminaddstudent");
      //  });



$('.editbutton').click(function() {
    $('#studentform').css("display", "block");
});


      
      $('#showstudents').click(function(){
        var coursename = $('#inputState').val(); 
        //alert(coursename);
      });
      $(document).ready(function(){
        $('#addstudent').click(function(){
          $.ajax({
            
          });
        });
      });
    </script>

</html>