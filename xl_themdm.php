<?php
require('database.php');
include('auth-dash.php');
$tdm = $_POST['category'];
$query = "INSERT INTO category(category) VALUE('$tdm')";

if ($con->query($query) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $con->error;
}

if ($query) {
    # code...
    header("location: danhmuc.php");
}
?>