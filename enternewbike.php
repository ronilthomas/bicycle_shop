<?php  

                    
                    if(isset($_POST['bikemodel']))
                    {
                          $mysqli = new mysqli('localhost','root','','project_spw');
                          $bikemodel = $mysqli->escape_string($_POST['bikemodel']);
                          $total = $mysqli->escape_string($_POST['total']);
                          $availability = $total;
                          $dbbikemodel = '';

                          $sql = "SELECT * FROM biketable WHERE bikemodel = ?";
                          if(!$stmt=$mysqli->prepare($sql))
                          {
                            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
                          }
                          if(!$stmt->bind_param("s",$bikemodel))
                          {
                            echo "Binding failed: (" . $mysqli->errno . ") " . $mysqli->error;
                          }
                          if(!$stmt->execute())
                          {
                            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                          }
                          $result=$stmt->get_result();
                          
                          while($row = $result->fetch_object())
                                {
                                  $dbbikemodel = $row->bikemodel;
                                  $dbtotal = $row->total;
                                  $dbavailability = $row->availability;
                                }
                                  if($dbbikemodel == '')
                                  {
                                    
                                              $sql = "INSERT INTO biketable (bikemodel, total, availability) VALUES (?, ?, ?)";
                          
                                              if(!$stmt=$mysqli->prepare($sql))
                                              {
                                                echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
                                              }
                                              if(!$stmt->bind_param("sii",$bikemodel, $total, $availability))
                                              {
                                                echo "Binding failed: (" . $mysqli->errno . ") " . $mysqli->error;
                                              }
                                              if(!$stmt->execute())
                                              {
                                                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                                              }
                                              else
                                              {
                                                echo 'Bike added Successfully';
                                              } 
                                  }             
                                  else
                                  {
                                    //echo 'Bike model already exists';
                                    $newtotal = $total + $dbtotal;
                                    $newavailability = $availability + $dbavailability;
                                    $sql = "UPDATE biketable SET total=?, availability=? WHERE bikemodel=?";
                                              if(!$stmt=$mysqli->prepare($sql))
                                              {
                                                echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
                                              }
                                              if(!$stmt->bind_param("iis",$newtotal, $newavailability, $bikemodel))
                                              {
                                                echo "Binding failed: (" . $mysqli->errno . ") " . $mysqli->error;
                                              }
                                              if(!$stmt->execute())
                                              {
                                                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                                              }
                                              else
                                              {
                                                echo 'Bike updated Successfully';
                                              }

                                  }  




                          
                    }





                    /*remove bike*/
                    /*remove bike*/
                    /*remove bike*/
                    /*remove bike*/
                    /*remove bike*/

                    if(isset($_POST['removebikemodel']))
                    {
                          $mysqli = new mysqli('localhost','root','','project_spw');
                          $removebikemodel = $mysqli->escape_string($_POST['removebikemodel']);
                          $removetotal = $mysqli->escape_string($_POST['removetotal']);
                          $removeavailability = $removetotal;
                          $dbbikemodel = '';

                          $sql = "SELECT * FROM biketable WHERE bikemodel = ?";
                          if(!$stmt=$mysqli->prepare($sql))
                          {
                            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
                          }
                          if(!$stmt->bind_param("s",$removebikemodel))
                          {
                            echo "Binding failed: (" . $mysqli->errno . ") " . $mysqli->error;
                          }
                          if(!$stmt->execute())
                          {
                            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                          }
                          $result=$stmt->get_result();
                          
                          while($row = $result->fetch_object())
                                {
                                  $dbbikemodel = $row->bikemodel;
                                  $dbtotal = $row->total;
                                  $dbavailability = $row->availability;
                                }
                                  if($dbbikemodel == '')
                                  {
                                    
                                              echo 'Bike does not exist';
                                              die();
                                  }             
                                  else
                                  {
                                    //echo 'Bike model already exists';
                                    $newtotal = $dbtotal - $removetotal;
                                    $newavailability = $dbavailability - $removetotal;
                                    if($newtotal <= 0)
                                    {
                                        echo 'Entered bikes are more than available';
                                        die();
                                    }
                                    else
                                    {
                                            $sql = "UPDATE biketable SET total=?, availability=? WHERE bikemodel=?";
                                              if(!$stmt=$mysqli->prepare($sql))
                                              {
                                                echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
                                              }
                                              if(!$stmt->bind_param("iis",$newtotal, $newavailability, $dbbikemodel))
                                              {
                                                echo "Binding failed: (" . $mysqli->errno . ") " . $mysqli->error;
                                              }
                                              if(!$stmt->execute())
                                              {
                                                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                                              }
                                              else
                                              {
                                                echo 'Bike removed Successfully';
                                              }
                                    }
                                    

                                  }  




                    }








if(isset($_POST['display']))
{
  $mysqli = new mysqli('localhost','root','','project_spw');
                                              $searchavailability = 0;
                                              //$email = $mysqli->escape_string($_POST['studentemail']);
                                              //$bike = $mysqli->escape_string($_POST['bikeval']);
                                              $sql = "SELECT bikemodel FROM biketable WHERE availability <> ?";
                                              //echo $bike;
                                              //echo $email;
                                              if(!$stmt=$mysqli->prepare($sql))
                                              {
                                                echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
                                              }
                                              if(!$stmt->bind_param("i", $searchavailability))
                                              {
                                                echo "Binding failed: (" . $mysqli->errno . ") " . $mysqli->error;
                                              }
                                              if(!$stmt->execute())
                                              {
                                                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                                              }

                                              $result=$stmt->get_result();
                                              echo time();
                                              while($row = $result->fetch_object())
                                              {
                                                //echo $row->email;
                                                $dbbikemodelforoptions = $row->bikemodel;
                                                ?>  

                                                    <h6><?php echo $dbbikemodelforoptions; ?></h6>
                                                    <img src="images/<?php echo $dbbikemodelforoptions; ?>.jpg" height="100" width="200"></br></br>


                                                <?php

                                              }




}





                    ?>