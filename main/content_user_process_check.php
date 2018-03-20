<?php
session_id('hello');
session_start();

$present_id = $_SESSION['user_id'];

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$user_process_check = "SELECT user_process FROM chase_user WHERE user_id = "."'".$present_id."'";

$result = mysqli_query($con,$user_process_check);
$content = mysqli_fetch_array($result, MYSQLI_NUM);
print $content[0];

$user_process = $content[0];
$_SESSION['user_process'] = $user_process;

mysqli_free_result($result);
mysqli_close($con);

?>
