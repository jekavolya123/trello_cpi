<?php 
include_once "connect.php";


if(isset($_GET["cid"]) && isset($_GET["status"])){
    $cat=(int)$_GET["status"];
    $cid=(int)$_GET["cid"];
$query="UPDATE `tbl_card` SET fk_tbl_cat=$cat where cid=$cid";
$res=mysqli_query($con,$query);
echo 1;
}


?>