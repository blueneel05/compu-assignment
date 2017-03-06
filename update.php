<?php

	include "dbconnect.php";
	
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$phone = $_POST['phoneNumber'];
	$location = $_POST['location'];

	$sql="UPDATE `userform` SET `username`='$username',`password`='$password',`firstname`='$firstName',
		`lastname`='$lastName',`email`='$email',`phone`='$phone',`location`='$location' WHERE `ID`='$id'";

if ($conn->query($sql) === TRUE) {
		echo "sucessfully Updated";
	} else  {
		echo "Error :". $sql ."<br>". $conn->error;
	}
?>