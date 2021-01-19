<?php
session_start();
    $conn = mysqli_connect("localhost", "root", "", "phones_store");
    $noidung = $_POST['noidung'];
    $idpn = $_POST['idphone'];
    $idus = $_SESSION['idusers'];
    // $idus = $_POST['idus'];
    $sql = "INSERT INTO comment (idphone,iduser, comment) VALUES ($idpn, $idus,'$noidung')";
    $ketqua = mysqli_query($conn, $sql);
    echo $ketqua;
?>