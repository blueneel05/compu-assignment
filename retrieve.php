<?php 
include "dbconnect.php";

$sql = "SELECT `ID`, `username`, `password`, `firstname`, `lastname`, `email`, `phone`, `location` FROM `userform` ";
$result = $conn->query($sql);

?>