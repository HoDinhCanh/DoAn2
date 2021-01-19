<?php
$to="hdcanh.19it3@vku.udn.vn";
$subject="email text";
$message="Bạn đã trúng 1 phần quà";
$header="From: hdcanh.19it3@vku.udn.vn";
if(mail($to,$subject,$message,$header))
{
echo "thành công";
}else{
    echo "sai";
}
?>