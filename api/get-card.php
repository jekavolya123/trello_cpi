<?php 
include_once "connect.php";
if(isset($_GET["bid"]) && isset($_GET["cat"])){
    $bid=(int)$_GET["bid"];
    $cat=$_GET["cat"];
    $main_arr=array();
    $query="SELECT * from tbl_card WHERE tbl_card.fk_tbl_board=$bid and tbl_card.fk_tbl_cat=$cat ORDER by tbl_card.cid DESC";
    $res=mysqli_query($con,$query);
    while($row=mysqli_fetch_assoc($res)){
        array_push($main_arr,$row);
    }
    echo json_encode($main_arr);
}
?>