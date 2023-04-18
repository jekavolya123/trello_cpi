<?php 
session_start();
session_regenerate_id();
$_SESSION["msg"]="";
$con=mysqli_connect("localhost","root","","db_teamx");
?>