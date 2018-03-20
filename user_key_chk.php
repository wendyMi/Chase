<?php
session_id('hello');
session_start();

$present_id = $_SESSION['user_id'];

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$user_key_check = "SELECT user_key FROM chase_user WHERE user_id = "."'".$present_id."'";

$isuserKey = mysqli_query($con,$user_key_check);
$userKeyResult = mysqli_fetch_array($isuserKey, MYSQLI_NUM);
$userKeyValue = (int)$userKeyResult[0];

echo $userKeyValue;

?>
