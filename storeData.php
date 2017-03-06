<?php
//process form data and store in database

include "dbconnect.php";


$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phoneNumber'];
$location = $_POST['location'];

$sql = "INSERT INTO `userform`(`username`, `password`, `firstname`, `lastname`, `email`, `phone`, `location`)
	VALUES ('$username','$password','$firstName','$lastName','$email','$phone','$location')";


if ($conn->query($sql) === TRUE) {
    echo "Registered successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



 ?>