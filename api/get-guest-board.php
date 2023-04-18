<?php 
include_once "connect.php";
if(isset($_POST["getuserboard"])){
$uid=(int)$_POST["uid"];
$query="SELECT * from tbl_board, tbl_board_user where tbl_board_user.fk_tbl_board=tbl_board.bid and tbl_board_user.tbl_u=$uid";
$res=mysqli_query($con,$query);
$main_arr=array();
while($row=mysqli_fetch_assoc($res)){
array_push($main_arr,$row);
}
echo  json_encode($main_arr);
}
?>