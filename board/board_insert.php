<?php
session_id('hello');
session_start();

$present_id = $_SESSION['user_id'];
$board_text = $_POST['board_text'];

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");


$user_process_check = "SELECT user_process FROM chase_user WHERE user_id = "."'".$present_id."'";

$up_result = mysqli_query($con,$user_process_check);
$content = mysqli_fetch_array($up_result, MYSQLI_NUM);
$user_process = $content[0];
$up = (int)$user_process;

$board_insert = "INSERT INTO board(user_id, board_text, content_no) VALUES (?,?,?)";

$stmt = mysqli_prepare($con,$board_insert);

mysqli_stmt_bind_param($stmt,'ssi',$present_id,$board_text,$up);
$board_insert_success_or_failure = mysqli_stmt_execute($stmt);

if($board_insert_success_or_failure) // true면
{
	header('Location: ./board_select.php');

}else{ //false면
	echo "실패";
}


?>
