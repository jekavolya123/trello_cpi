<?php 
include_once "connect.php";
if(isset($_GET["cid"]) && isset($_GET["uid"])){
    $cid=(int)$_GET["cid"];
    $uid=$_GET["uid"];
    $query="UPDATE `tbl_card` SET fk_tbl_u=$uid where cid=$cid";
    $res=mysqli_query($con,$query);
    echo 1;
}
?>