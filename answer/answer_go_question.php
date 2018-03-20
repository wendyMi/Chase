<?php
session_id('hello');
session_start();


$present_id = $_SESSION['user_id'];

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$user_process_check = "SELECT user_process FROM chase_user WHERE user_id = "."'".$present_id."'";

$up_result = mysqli_query($con,$user_process_check);
$content = mysqli_fetch_array($up_result, MYSQLI_NUM);
$user_process = (int)$content[0] -1;



$update_process= "UPDATE chase_user SET user_process = ".(int)$user_process." WHERE user_id = "."'".$present_id."'";

mysqli_query($con,$update_process);

mysqli_free_result($result);


mysqli_close($con);


?>
