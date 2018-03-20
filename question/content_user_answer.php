<?php
session_id('hello');
session_start();

$answer_keyword = $_POST['keyword'];
$answer_reason = $_POST['reason'];
$present_id = $_SESSION['user_id'];



$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$user_process_check = "SELECT user_process FROM chase_user WHERE user_id = "."'".$present_id."'";

$up_result = mysqli_query($con,$user_process_check);
$content = mysqli_fetch_array($up_result, MYSQLI_NUM);
$user_process = (int)$content[0] + 1;

$answer_insert = "INSERT INTO content_".$user_process."_user(user_id,content_keyword,content_answer) VALUES("."'".$present_id."','".$answer_keyword."','".$answer_reason."')";

mysqli_query($con,$answer_insert);


$board_insert = "INSERT INTO board(user_id,board_keyword,board_text,content_no) VALUES("."'".$present_id."','".$answer_keyword."','".$answer_reason."', '".$user_process."')";


mysqli_query($con,$board_insert);


$update_process= "UPDATE chase_user SET user_process = ".(int)$user_process." WHERE user_id = "."'".$present_id."'";

mysqli_query($con,$update_process);



?>
