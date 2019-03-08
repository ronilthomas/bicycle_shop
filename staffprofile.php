<?php

session_start();
if(isset($_SESSION['staffemail']))
{
	/*$_SESSION['message'] = 'Registered';
	echo $_SESSION['message'];*/
	$email = $_SESSION['staffemail'];
	//echo $email;
}
else
{

	header("location: home.php");
}


/*if(isset($_POST['stusearchbtn']))
{

}*/




?>



<!DOCTYPE html>
<html>
<head>
	<title>Staff Profile</title>
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


</head>
<body background="images/background.jpg">




<ul>  
			<li class="list-group-item"><a href="staffprofile.php">Home</a></li>
			<li class="list-group-item"><a href="instructions.php">Instructions</a></li>
			<li class="list-group-item"><a href="help.php">Help</a></li>

			<li class="list-group-item float-right">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
					<a href="logout.php">Logout</a>
				
				</button>
			</li>

			<li class="list-group-item float-right">
				<?php echo 'Welcome'." ".$email;  ?>
			</li>

		</ul>


		<!-- <button id="loginbutton" type="submit" class="btn btn-primary">Rent</button>
		<button id="loginbutton" type="submit" class="btn btn-primary">Return</button> -->
<div id="navtopcontainer" style="float: left; padding: 10px; border: 2px solid grey; margin-left: 20px;">
<div id="navtop" style="overflow-y: scroll; display:inline-block; margin-left: 10px; float: left; width: 550px;  padding: 10px; height: 475px;">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="search-tab" data-toggle="tab" href="#search" role="tab" aria-controls="search" aria-selected="true">Search student</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="enternewbike-tab" data-toggle="tab" href="#enternewbike" role="tab" aria-controls="enternewbike" aria-selected="false">Enter new bike</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="remove-tab" data-toggle="tab" href="#remove" role="tab" aria-controls="remove" aria-selected="false">Remove Bike</a>
		</li>
		<!-- cancelled bike tab -->
		<!-- cancelled bike tab -->
		<!-- <li class="nav-item">
			<a class="nav-link" id="bikes-tab" data-toggle="tab" href="#bikes" role="tab" aria-controls="bikes" aria-selected="false">Bikes</a>
		</li> -->
		</ul>

		<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="search" role="tabpanel" aria-labelledby="search-tab">
							<form style="margin-left: 20px; margin-top: 20px; width: 400px;" method="POST"> <!-- was form -->

							<!-- <div class="form-group" style="width: 200px; display: inline;"> -->
							 <!--  <label for="stuemail">Email address</label> -->
								<input style="width: 275px; display: inline-block;" type="email" class="form-control" id="stuemail" name="stuemail" aria-describedby="emailHelp" placeholder="Enter student email" required>
							<!-- </div> -->
							
							<button style="display: inline-block; margin-top: -5px;" id="stusearchbtn" type="submit" class="btn btn-primary" name="stusearchbtn">Search</button>
						</form> <!-- was form -->



								<!-- inside search student tab response area --> 
								<div style="margin:auto; width: 500px;  padding: 10px;" id="response">






					<?php

	if(isset($_POST['stusearchbtn']))
		{
			$mysqli = new mysqli('localhost','root','','project_spw');
			$stuemail = $mysqli->escape_string($_POST['stuemail']);
			$sql = "SELECT * FROM studenttable WHERE email = ?";
			if(!$stmt=$mysqli->prepare($sql))
			{
				echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if(!$stmt->bind_param("s",$stuemail))
			{
				echo "Binding failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			if(!$stmt->execute())
			{
				echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			}
			$firstname = '';
			$result=$stmt->get_result();
			
				while($row = $result->fetch_object())
							{
								//echo $row->email;
								$id = $row->id;
								$email = $row->email;
								$firstname = $row->first_name;
								$bike = $row->bike;
				
							}
								if($firstname == '')
								{
									echo 'Invalid';
								}             
								else
								{
									if($bike == '')
									{
										/*echo 'Student Email: '.$email.'</br>';
										echo 'Student Name: '.$firstname.'</br>';
										echo 'Student Bike: No bike';*/
										/*$xyz = 'Student Email: '.$email.'</br>'.'Student Name: '.$firstname.'</br>'.'Student Bike: No bike';
										echo $xyz;*/

										?>

										<table class="table table-striped">
											<thead>
																<tr>
																<th>First Name</th>
																<th>Student Email</th>
																<th>Bike</th>
																</tr>
											</thead>
											<tr>
													<td id="stname"><?php echo $firstname; ?></td>
													<td id="stemail"><?php echo $email; ?></td>
													<td id="stbike">
														<button id="loadformbtn" type="button" class="btn btn-primary" data-value="<?php echo $firstname; ?>"
															data-value1="<?php echo $email; ?>" >Add Bike</button>  
													</td>
											</tr>
										</table>

										<form id="studentform" method="POST" style="display: none";>

				<div style="display: none ;" id="addbikeform" class="form-group">
					<label for="studentemail">Email address</label>
					<input type="email" class="form-control" id="studentemail" name="studentemail" aria-describedby="emailHelp">
				</div>
				<div class="form-group">
					<label for="studentname">Name</label>
					<input type="text" class="form-control" id="studentname" name="studentname" disabled>
				</div>

									
													<div class="form-group col-md-12">
															<label for="bikeval">Bike</label>
															<select id="bikeval" name="bikeval" class="form-control">
																<option disabled selected>Choose...</option>


																<?php
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
													      while($row = $result->fetch_object())
													      {
													        //echo $row->email;
													        $dbbikemodelforoptions = $row->bikemodel;
													        echo '<option>'.$dbbikemodelforoptions.'</option>';
													      }


														?>


																<!-- <option>Bike1</option>
																<option>Bike2</option>
																<option>Bike3</option> -->
															</select>
														</div>


				
				<button id="addsubmitbutton" type="submit" class="btn btn-primary" name="addsubmitbutton">Submit</button>
				</form>



										<?php






									}
									else
									{ 
										/*echo 'Student Email: '.$email.'</br>';
										echo 'Student Name: '.$firstname.'</br>';
										echo 'Student Bike: '.$bike;*/



										?>

										<table class="table table-striped">
											<thead>
																<tr>
																<th>First Name</th>
																<th>Student Email</th>
																<th>Bike</th>
																</tr>
											</thead>
											<tr>
													<td><?php echo $firstname; ?></td>
													<td><?php echo $email; ?></td>
													<td id="<?php echo $id ?>">
														<button id="loadformbtnremove" type="button" class="btn btn-primary" data-value="<?php echo $bike; ?>"
															data-value1="<?php echo $email; ?>" data-value2="<?php echo $firstname; ?>" >Remove Bike</button>  
													</td>
											</tr>
										</table>

										<form id="studentform" method="POST" style="display: none";>

												<div style="display: none ;" id="addbikeform" class="form-group">
													<label for="studentemail">Email address</label>
													<input type="email" class="form-control" id="studentemail" name="studentemail" aria-describedby="emailHelp">
												</div>
												<div class="form-group">
													<label for="studentname">Name</label>
													<input type="text" class="form-control" id="studentname" name="studentname" disabled>
												</div>
												<div class="form-group">
													<label for="studentbike">Bike</label>
													<input type="text" class="form-control" id="studentbike" name="studentbike">
													<!-- disable was removed -->
													<!-- disable was removed -->
													<!-- disable was removed -->
												</div>


																					<!-- <div class="form-group col-md-12">
																							<label for="bikeval">Bike</label>
																							<select id="bikeval" name="bikeval" class="form-control">
																								<option disabled selected>Choose...</option>
																								<option>Bike1</option>
																								<option>Bike2</option>
																								<option>Bike3</option>
																							</select>
																						</div> -->


												
												<button id="remsubmitbutton" type="submit" class="btn btn-primary" name="remsubmitbutton">Submit</button>
												</form>





										<?php




									}
								}
			

			
			
			
			/*$result=$stmt->get_result();
			while($row = $stmt->fetch_object())
					{
						//echo $row->email;
						$email = $row->email;
						$firstname = $row->first_name;
						$bike = $row->bike;
						
					}
					 echo $firstname;
					 echo $bike;*/
			
			
					


		}
		else
		{
			//echo 'post error';
		}


		/*addsubmitbutton
		addsubmitbutton
		addsubmitbutton */   
		if(isset($_POST['addsubmitbutton']))
		{				
										$mysqli = new mysqli('localhost','root','','project_spw');
										$email = $mysqli->escape_string($_POST['studentemail']);
										$bike = $mysqli->escape_string($_POST['bikeval']);
										//$addchkavl = 0;
										//$fieldactivity = 'availability - 1';
										$sql = "SELECT * FROM biketable WHERE bikemodel =?";
										if(!$stmt=$mysqli->prepare($sql))
										{
											echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
										}
										if(!$stmt->bind_param("s", $bike))
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
									        //echo $row->email;
									        $dbchkavl = $row->availability;
									        
									      }
									      $todbavlbty = $dbchkavl - 1;

									      $sqltochgavlbty = "UPDATE biketable SET availability=? WHERE bikemodel=?";
									      if(!$stmt=$mysqli->prepare($sqltochgavlbty))
														{
															echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
														}
														if(!$stmt->bind_param("is", $todbavlbty, $bike))
														{
															echo "Binding failed: (" . $mysqli->errno . ") " . $mysqli->error;
														}
														if(!$stmt->execute())
														{
															echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
														}




																else
																{
																					$stmt->close();
																					$sql1 = "UPDATE studenttable SET bike=? WHERE email=?";
																					//echo $bike;
																					//echo $email;
																					if(!$stmt=$mysqli->prepare($sql1))
																					{
																						echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
																					}
																					if(!$stmt->bind_param("ss",$bike, $email))
																					{
																						echo "Binding failed: (" . $mysqli->errno . ") " . $mysqli->error;
																					}
																					if(!$stmt->execute())
																					{
																						echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
																					}
																					else{
																						echo 'Added Successfully';
																					}
																}




										
										

										

										

						


						
						/*else
						{
							echo 'Added Successfully';
						}*/



		}




		if(isset($_POST['remsubmitbutton']))
		{


										$mysqli = new mysqli('localhost','root','','project_spw');
										$email = $mysqli->escape_string($_POST['studentemail']);
										$bike = $mysqli->escape_string($_POST['studentbike']);
										//$addchkavl = 0;
										//$fieldactivity = 'availability - 1';
										$sql = "SELECT * FROM biketable WHERE bikemodel =?";
										if(!$stmt=$mysqli->prepare($sql))
										{
											echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
										}
										if(!$stmt->bind_param("s", $bike))
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
									        //echo $row->email;
									        $dbchkavl = $row->availability;
									        
									      }
									      $todbavlbty = $dbchkavl + 1;

									      $sqltochgavlbty = "UPDATE biketable SET availability=? WHERE bikemodel=?";
									      if(!$stmt=$mysqli->prepare($sqltochgavlbty))
														{
															echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
														}
														if(!$stmt->bind_param("is", $todbavlbty, $bike))
														{
															echo "Binding failed: (" . $mysqli->errno . ") " . $mysqli->error;
														}
														if(!$stmt->execute())
														{
															echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
														}
														else
														{
																/*$mysqli = new mysqli('localhost','root','','project_spw');
																$email = $mysqli->escape_string($_POST['studentemail']);*/
																$bike = '';
																$sql = "UPDATE studenttable SET bike=? WHERE email=?";
																//echo $bike;
																//echo $email;
																if(!$stmt=$mysqli->prepare($sql))
																{
																	echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
																}
																if(!$stmt->bind_param("ss",$bike, $email))
																{
																	echo "Binding failed: (" . $mysqli->errno . ") " . $mysqli->error;
																}
																if(!$stmt->execute())
																{
																	echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
																}
																else
																{
																	echo 'Removed Successfully';
																}
														}









						
						


		}






	?>







		</div> <!-- response -->







				</div>



				<!-- rent -->
				<!-- rent -->
				<!-- rent -->

				<div class="tab-pane fade" id="enternewbike" role="tabpanel" aria-labelledby="enternewbike-tab">
					
										<div> <!-- was form -->
										<div class="form-group">
											<label for="bikemodel">Enter Bike Model</label>
											<input type="text" class="form-control is-valid" id="bikemodel" name="bikemodel" aria-describedby="emailHelp" placeholder="Full Model Name" required>
											<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
										</div>
										<div class="form-group">
											<label for="total">Enter Number of Bikes</label>
											<input type="text" class="form-control is-invalid" id="total" name="total" placeholder="Number of bikes">
										</div>
										
										<div id=""></div>
										<button id="enterbikebtn" name="enterbikebtn" type="submit" class="btn btn-primary">Add</button><br>
	

										</div> <!-- was form -->

										<div id="enternewbikeresponse"></div>





				</div> <!-- add a bike to store -->



				<!-- remove a bike -->
				<!-- remove a bike -->
				<div class="tab-pane fade" id="remove" role="tabpanel" aria-labelledby="remove-tab">
										<div> <!-- was form -->
										<div class="form-group">
											<label for="bikemodel">Enter Bike Model</label>
											<input type="text" class="form-control is-valid" id="removebikemodel" name="removebikemodel" aria-describedby="emailHelp" placeholder="Full Model Name" required>
											<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
										</div>
										<div class="form-group">
											<label for="total">Number of Bikes</label>
											<input type="text" class="form-control is-invalid" id="removetotal" name="removetotal" placeholder="Number of bikes to remove">
										</div>
										
										<div id=""></div>
										<button id="removebikebtn" name="enterbikebtn" type="submit" class="btn btn-primary">Remove</button><br>
	

										</div> <!-- was form -->

										<div id="removebikeresponse"></div>



				</div> <!-- remove a bike -->



					<!-- avlbikes
					avlbikes
					avlbikes
					avlbikes -->

					<!-- cancelled bike tab -->
				<!-- <div class="tab-pane fade" id="bikes" role="tabpanel" aria-labelledby="bikes-tab"> -->
					
					

				</div>

</div> <!-- navtop -->
	

		</div>
							</div><!-- navtopcontainernavtopcontainer
						navtopcontainernavtopcontainernavtopcontainer -->









							<div id="availablebikesdisplaycontainer" style="border: 2px solid grey; margin-left: 20px; float: left; padding: 20px;"><!-- availablebikesdisplaycontainer
							availablebikesdisplaycontainer -->


		<div id="availablebikesdisplay" style="overflow-y: scroll; display:inline-block; height: 400px; margin-left: 20px; width: 500px;  padding: 10px;"><!-- available bikes area-->
			
											<!-- <form method="POST">
												<span>Search for available bikes</span>
												<span><button id="avlbikes" name="avlbikes" class="btn btn-primary">Refresh</button></span> -->
												<?php

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
																				      while($row = $result->fetch_object())
																				      {
																				        //echo $row->email;
																				        $dbbikemodelforoptions = $row->bikemodel;
																				        ?>
																				        		<h6><?php echo $dbbikemodelforoptions; ?></h6>
																				        		<img src="images/<?php echo $dbbikemodelforoptions; ?>.jpg" height="100" width="200"></br></br>


																				        <?php
																				        //echo '<p>'.$dbbikemodelforoptions.'</p>';
																				      }











												  ?>
											<!-- 	</form> -->

						

					
			
		</div><!-- available bikes area -->
		<!-- <button id="avlbikesrefresh" name="avlbikesrefresh" class="btn btn-primary">Refresh</button> -->

					<div>
						<span style="float: right; margin-top: 10px;"><button id="avlbikesrefresh" name="avlbikesrefresh" class="btn btn-primary">Refresh</button></span>
					</div>


				</div><!-- availablebikesdisplaycontainer
							availablebikesdisplaycontainer -->


</body>

<script type="text/javascript">
	$('#loadformbtn').click(function() {
		alert('hello');
		//var editid = (this).id;
		var firstname = (this).getAttribute('data-value');
		var email = (this).getAttribute('data-value1');
		$("#studentform").css("display", "inline-block");
		//var btnname = $('#formsubmitbtn').attr('name');
		$('#studentemail').val(email);
		$('#studentname').val(firstname);
		//$('#userfirstname').val(editname);
		//$('#formsubmitbtn').html('Edit');
		//$('#formsubmitbtn').attr("name", "admineditstudent");
		//$('#formsubmitbtn').attr("id", "formeditbtn");

	});

	//loadformbtnremove

	$('#loadformbtnremove').click(function() {
		alert('hello');
		//var editid = (this).id;
		var bike = (this).getAttribute('data-value');
		var email = (this).getAttribute('data-value1');
		var firstname = (this).getAttribute('data-value2');
		$("#studentform").css("display", "inline-block");
		//var btnname = $('#formsubmitbtn').attr('name');
		$('#studentemail').val(email);
		$('#studentbike').val(bike);
		$('#studentname').val(firstname);
		//$('#userfirstname').val(editname);
		//$('#formsubmitbtn').html('Edit');
		//$('#formsubmitbtn').attr("name", "admineditstudent");
		//$('#formsubmitbtn').attr("id", "formeditbtn");

	});


	/*$('#addbikeform').onload(function() {
		alert('hello');
		var editid = (this).id;
		var editemail = (this).getAttribute('data-value');
		var editname = (this).getAttribute('data-value1');
		//var btnname = $('#formsubmitbtn').attr('name');
		$('#userid').val(editid);
		$('#useremail').val(editemail);
		$('#userfirstname').val(editname);
		$('#formsubmitbtn').html('Edit');
		$('#formsubmitbtn').attr("name", "admineditstudent");
		$('#formsubmitbtn').attr("id", "formeditbtn");

	});*/
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#enterbikebtn').click(function(){

			var bikemodel = $('#bikemodel').val();
			var total = $('#total').val();
			if(bikemodel!='' && total!='')
			{ alert(bikemodel);
				$.ajax({
					url:"enternewbike.php",
					method:"POST",
					data:{bikemodel:bikemodel,total:total},
					success:function(data)
							{
								if(data == 'Bike added Successfully')
									{
										$("#enternewbikeresponse").html("Bike added Successfully");
										//alert('username and password do not match');
										$('#bikemodel').val('');
										$('#total').val('');
									}
									else if(data == 'Bike updated Successfully')
									{
										$("#enternewbikeresponse").html("Bike model updated");
										$('#bikemodel').val('');
										$('#total').val('');
									}
			
							}

				});
			}
			else{
				alert('Enter all fields!');
			}
		});
	});




$(document).ready(function(){
		$('#removebikebtn').click(function(){

			var removebikemodel = $('#removebikemodel').val();
			var removetotal = $('#removetotal').val();
			if(removebikemodel!='' && removetotal!='')
			{ alert(removebikemodel);
				$.ajax({
					url:"enternewbike.php",
					method:"POST",
					data:{removebikemodel:removebikemodel,removetotal:removetotal},
					success:function(data)
							{
								if(data == 'Bike removed Successfully')
									{
										$("#removebikeresponse").html("Bike removed Successfully");
										//alert('username and password do not match');
										$('#removebikemodel').val('');
										$('#removetotal').val('');
									}
									else if(data == 'Bike does not exist')
									{
										$("#removebikeresponse").html("Bike model does not exist");
									}
									
									else if(data == 'Entered bikes are more than available')
									{
										$("#removebikeresponse").html("Entered bikes are more than the available number!");
									}
							}

				});
			}
			else{
				alert('Enter all fields!');
			}
		});
	});


/*$(document).ready(function(){
	$.ajax({
					url:"enternewbike.php",
					method:"POST",
					data:{display: 1},
					success:function(data)
					{
						$('#availablebikesdisplay').html(data);
					}
					});

});*/
$('#avlbikesrefresh').click(function(){
	$.ajax({
					url:"enternewbike.php",
					method:"POST",
					data:{display: 1},
					success:function(data)
					{
						setTimeout(function(){
								$('#availablebikesdisplay').html(data);
						},1000);

						
					}
					});

});





</script>


</html>


