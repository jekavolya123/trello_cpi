<?php 
include_once "connect.php";
if(isset($_POST["getuserboard"])){
$uid=(int)$_POST["uid"];
$query="SELECT * FROM `tbl_board` where fk_tbl_u=$uid order by bid desc";
$res=mysqli_query($con,$query);
$main_arr=array();
while($row=mysqli_fetch_assoc($res)){
array_push($main_arr,$row);
}
echo  json_encode($main_arr);
}
?>