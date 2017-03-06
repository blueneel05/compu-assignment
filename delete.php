<?php

include "dbconnect.php";

$id = $_GET['id'];

$sql = " DELETE FROM `userform` WHERE `ID` = '$id' ";
// echo $id;

if ($conn->query($sql) === TRUE) {
    echo "Deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>