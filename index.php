<!doctype HTML>

<!-- Coder Nilkamal Gotarne -->
<?php include "dbconnect.php"; ?>
<html>
	<head>
		<?php if(!isset($_POST['id']))  {  
			$update = 0; ?>
			<title>Registration form</title>
		<?php } else { 
			$update = 1;
			$id = $_POST['id']; ?>
			<title>Update Data</title>
			<?php } ?>
		

		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  
		  

		  <script
			  src="https://code.jquery.com/jquery-3.1.1.min.js"
			  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
			  crossorigin="anonymous" >
		  </script>

		  <style>
		  	h1  {
		  		text-align: center;
		  	}

		  	span  {
		  		color: red;
		  	}

		  	h3  {
		  		margin-left: 40px;
		  	}


		  	
		  </style>

		  <script>
			$(document).ready(function() {
			  		
			  		// Allowing only number input on phone number 
					$("#phoneNumber").keydown(function (e) {
				        // Allow: backspace, delete, tab, escape, enter and .
				        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
				             // Allow: Ctrl/cmd+A
				            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
				             // Allow: Ctrl/cmd+C
				            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
				             // Allow: Ctrl/cmd+X
				            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
				             // Allow: home, end, left, right
				            (e.keyCode >= 35 && e.keyCode <= 39)) {
				                 // let it happen, don't do anything
				                 return;
				        }
				        // Ensure that it is a number and stop the keypress
				        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
				            e.preventDefault();
				        }
				    });





						var update = <?php echo $update; ?> ;
						// alert(update);
 
 					$("#submit").click(function(e) {	
 						e.preventDefault();	// avoid to execute the actual submit of the form.

				    	if(update == 0)  { //code to save entry
					    	// alert("hola");  			    	
					    	if ($('#password').val() == $('#confirmPassword').val()) {
							    // alert('Same Value');     
					    	    $.ajax({
								           type: "POST",
								           url: "storeData.php",
								           data: $("#formData").serialize(), // serializes the form's elements.
								           success: function(data)
									           {
									               alert(data); // show response from the php script.
									           		// alert("hola");
									           }
								});
							}  else  { 
									alert("passwords does not match");
								}
							// end of save code
						} else {  //code to update entry
							
				    		alert("edit mode");
				    		$.ajax({
							           type: "POST",
							           url: "update.php",
							           data: $("#formData").serialize(), // serializes the form's elements.
							           success: function(data)
								           {
								               alert(data); // show response from the php script.
								           		// alert("hola");
								           }
							});
				    		} //end of update code
						
							    
					});

				   
			})
				
		  </script>

	</head>
	<body>

	<h3><u> Answer No: 1 </u></h3>
	<?php include "nav.php" ?>

		<div class="container">

		<?php if($update == 0)  { ?>
		<h1>Registration form</h1>
		<?php } else { ?>
		<h1>Update Profile Data</h1>
		<?php
			$sql = "SELECT `ID`, `username`, `password`, `firstname`, `lastname`, `email`, `phone`, `location` FROM `userform` WHERE `ID` = '$id'";
			$result = $conn->query($sql);
			// var_dump($result);
			$row = $result->fetch_assoc();
				
		 } ?>

		<br>
		<form class="form-horizontal" id="formData"  >

			<input type="integer"  name="id" value="<?php echo $row['ID']; ?>" style="display:none"; >

			<div class="form-group">
				<label class="control-label col-sm-3" for="username"><span>*</span> Username :</label>
				<div class="col-sm-9">
					<input class="form-control" type="text" name="username" id="username" placeholder="Enter Username"
					 value="<?php if($update == 1) { echo $row['username']; } ?>" required/>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="password"><span>*</span> Password : </label>
				<div class="col-sm-9">
					<input class="form-control" type="password" name="password" id="password" placeholder="Enter Password"
					value="<?php if($update == 1) { echo $row['password']; } ?>" required/>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="confirmPassword"><span>*</span> Confirm Password : </label>
				<div class="col-sm-9">
					<input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password"
					value="<?php if($update == 1) { echo $row['password']; } ?>" required/>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="firstName"><span>*</span> First Name : </label>
				<div class="col-sm-9">
					<input class="form-control" type="text" name="firstName" id="firstName" placeholder="Enter First Name"
					value="<?php if($update == 1) { echo $row['firstname']; } ?>" required/>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="lastName">Last Name : </label>
				<div class="col-sm-9">
					<input class="form-control" type="text" name="lastName" id="lastName" placeholder="Enter Last Name" 
					value="<?php if($update == 1) { echo $row['lastname']; } ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="email"><span>*</span> Email : </label>
				<div class="col-sm-9">
					<input class="form-control" type="email" name="email" id="email" placeholder="Enter Email"
					value="<?php if($update == 1) { echo $row['email']; } ?>" required/>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="phoneNumber"><span>*</span> Phone No. :</label>
				<div class="col-sm-9">
					<input class="form-control" type="text" name="phoneNumber" id="phoneNumber" placeholder="Enter Phone number" 
					value="<?php if($update == 1) { echo $row['phone']; } ?>"required/>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="location"> Location :</label>
				<div class="col-sm-9">
					<input class="form-control" type="text" name="location" id="location" placeholder="Enter Location" 
					value="<?php if($update == 1) { echo $row['location']; } ?>" />
				</div>
			</div>

			<button class="btn btn-default col-sm-offset-4" type="submit" id="submit">Save</button>
			<button class="btn btn-default" type="Reset">Reset</button>

		</form>
	</div>

		<?php $conn->close(); ?>
	</body>
</html>