<?php



        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {         

                $user = $_POST['user'];

                if($user == 'student')
                  {

                  $mysqli = new mysqli('localhost','root','','project_spw');
                  if ($mysqli->connect_errno) 
                  {
                    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                  }
                  $email = $mysqli->escape_string($_POST['email']);
                  $sql="SELECT * FROM studenttable WHERE email = ?";
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
                  //echo "connected";
                  
                  $result=$stmt->get_result();
                  while($row = $result->fetch_object())
                  {
                    //echo $row->email;
                    $dbpassword = $row->password;
                    $email = $row->email;
                    $firstname = $row->first_name;
                    
                  }
                  if(password_verify($_POST['password'], $dbpassword))
                            {
                              session_start();
                              $_SESSION['email'] = $email;
                              $_SESSION['first_name'] = $firstname;
                              $_SESSION['logged_in'] = true;
                              
                              $_SESSION['message'] = 'login validated';
                              echo $_SESSION['message'];
                            }
                            else
                            {
                              $_SESSION['message'] = 'username and password do not match';
                              echo $_SESSION['message'];
                            }
                  //echo $results[1]['email'];
                  //print_r($results);
                }


/*}*/
                elseif($user == 'staff')
                {       
  /*if($_SERVER['REQUEST_METHOD'] == 'POST')
*/ /* { */
                  $mysqli = new mysqli('localhost','root','','project_spw');
                  if ($mysqli->connect_errno) 
                  {
                    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                  }
                  $email = $mysqli->escape_string($_POST['email']);
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
                  //echo "connected";
                  $firstname = '';
                  $result=$stmt->get_result();
                  while($row = $result->fetch_object())
                  {
                    //echo $row->email;
                    $dbpassword = $row->password;
                    $email = $row->email;
                    $firstname = $row->first_name;
                    
                  }
                  if(password_verify($_POST['password'], $dbpassword))
                            {
                              session_start();
                              $_SESSION['staffemail'] = $email;
                              $_SESSION['first_name'] = $firstname;
                              $_SESSION['logged_in'] = true;
                              
                              $_SESSION['message'] = 'login validated';
                              echo $_SESSION['message'];
                            }
                            else
                            {
                              $_SESSION['message'] = 'username and password do not match';
                              echo $_SESSION['message'];
                            }
      //echo $results[1]['email'];
      //print_r($results);
          }


}
/*else
{
  echo 'invalid user';
}*/





?>
