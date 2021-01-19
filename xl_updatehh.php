<?php
require('database.php');
include('auth-dash.php');

$id = $_POST['id'];
$pn = $_POST['phonename'];
// $iddm = $_POST['author'];
$gt = $_POST['price'];
$iddm = $_POST['idcategory'];
$filename = $_POST['fileToUpload'];
$query = "UPDATE phones SET phonename = '$pn', idseller = '$iddm', idcategory ='$iddm',price = '$gt', images ='$filename' WHERE id= $id";
if ($con->query($query) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $con->error;
}

if ($query) {
    # code...
    header("location: hanghoa.php");
}
?>