<?php

session_id('hello');

session_start(); #세션을 넣을지 말지 고민!

$S_id  = session_id();


$nickname = $_POST['nickname'];

$pw = $_POST['pw'];

//echo $S_id."<br />";
//echo $_SESSION['user_id'];

$present_id = $_SESSION['user_id'];

$print_id_info = "UPDATE chase_user SET user_nickname ="."'".$nickname."'".","."user_pw ="."'".$pw."'"." WHERE user_id ="."'".$present_id."'";

echo $print_id_info;



$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$user_info_update = "UPDATE chase_user SET user_nickname ="."'".$nickname."'".","."user_pw ="."'".$pw."'"." WHERE user_id ="."'".$present_id."'";


mysqli_query($con, $user_info_update);

mysqli_close($con);



?>