<?php
require('database.php');
include('auth-dash.php');
// $ID = $_GET['id'];
// $query = "SELECT * FROM hanghoa WHERE ID = '$ID'";
// $rs = $con->query($query);
// $row = $rs->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>
<body>
    <h1>Thêm hàng hoá</h1>

    <form action="xl_themhh.php" method="POST" enctype="multipart/form-data">
        Tên sản phẩm:<input type="text" name="phonename" id="" value=""><br>
        Giá tiền:<input type="text" name="price" id="" value=""><br>
        <form action="xl_themhh.php">
            <label for="danhmuc">Danh mục:</label>
                <select name="idcategory">
                    <?php
                     $query1 = "SELECT * FROM category";
                     $rs2 = $con->query($query1);
                   
                        while($row2=$rs2->fetch_assoc()){?>
                            <option value="<?php echo $row2['id'];?>"><?php echo $row2['category'];?></option>

                            <?php
                        }
                    ?>
                </select>
                Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br><br>
        <input type="submit" value="Upload" name="submit">
                        
        </form>
        <!-- <form action="xl-themhh.php" method="post" enctype="multipart/form-data"> -->
       
<!-- </form> -->


    </form>
</body>
</html>