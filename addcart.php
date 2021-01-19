<?php
session_start();
   $connect=mysqli_connect("localhost","root","","phones_store");
   $sql="SELECT * FROM phones WHERE id=".$_GET['item'];      
   $query=mysqli_query($connect,$sql);
   if(mysqli_num_rows($query) > 0)
   {
   while($row=mysqli_fetch_array($query))
   {
       if(isset($_SESSION['cart'][$row['id']])){
           $_SESSION['cart'][$row['id']]+=1;

       }
       else {
        $_SESSION['cart'][$row['id']]=1;
       }
   echo "<div id=cart>";
   echo "<h3>$row[phonename]</h3>";
   echo "Tác giả:".$row['idseller']." - Giá: ".$row['price']."<br />";
   echo "Số lượng".$_SESSION['cart'][$row['id']];
   echo "<p align='right'><a href='addcart.php?id=$row[id]'>Mua sách này</a></p>";
   echo "</div>";
   }
   }
   header ('location:trangchu.php');
   ?>
   <a href="trangchu.php">Mua tiếp</a>