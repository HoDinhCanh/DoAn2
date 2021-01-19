<?php
// $dsn = 'mysql:host=localhost;dbname=Lab01';
$con = mysqli_connect("localhost","root","","phones_store");
if (mysqli_connect_errno())
  {
  echo "Không thể kết nối đến MySQL: " . mysqli_connect_error();
  }
  // try {
    // $db = new PDO($con, $username, $password);
    // } catch (PDOException $e) {
    // $error_message = $e->getMessage();  
    // exit();
    // }
?>