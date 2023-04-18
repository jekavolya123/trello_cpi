<?php 
include_once "connect.php";
if(isset($_GET["cid"]) && isset($_GET["lid"])){
    $lid=(int)$_GET["lid"];
    $cid=(int)$_GET["cid"];
$query="UPDATE `tbl_card` SET fk_tbl_label=$lid where cid=$cid";
$res=mysqli_query($con,$query);
echo 1;
}


?>