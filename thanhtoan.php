<?php
require('database.php');
include('auth-dash.php');
// $tmh = $_POST['category'];
$pn = $_POST['phonename'];
$gt = $_POST['price'];
$iddm = $_POST['idcategory'];
$filename = $_FILES["fileToUpload"]["name"];
$query = "INSERT INTO phones(phonename,idseller,idcategory,price,images) VALUE('$pn','$iddm','$iddm','$gt','$filename')";
if ($con->query($query) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $con->error;
}
if ($query) {
    # code...
    header("location: hanghoa.php");
}
}
?>