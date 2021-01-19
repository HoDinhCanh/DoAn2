<?php
require('database.php');
include('auth-dash.php');

$id = $_GET['id'];
$query = "DELETE FROM phones WHERE id = '$id'";
if ($con->query($query) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $con->error;
  }
if ($query) {
    # code...
    header("location:hanghoa.php");
}
?>