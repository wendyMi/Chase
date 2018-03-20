<?php
session_id('hello');
session_start();

$id = $_POST['id'];
$txt = $_POST['txt'];

$present_id = $_SESSION['user_id'];

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$user_process_check = "SELECT user_process FROM chase_user WHERE user_id = "."'".$present_id."'";

$up_result = mysqli_query($con,$user_process_check);
$content = mysqli_fetch_array($up_result, MYSQLI_NUM);
$user_process = $content[0];

$present_bad = "SELECT board_bad FROM board WHERE user_id = "."'".$id."'"." AND board_text = "."'".$txt."'"." AND content_no = ".$user_process;

$bad_result = mysqli_query($con,$present_bad);
$ctnt = mysqli_fetch_array($bad_result, MYSQLI_NUM);
$bad_present = $ctnt[0];


echo $bad_present."<br/>";

$pg = (int)$bad_present + 1;

echo $pg;

$update_bad = "UPDATE board SET board_bad = ".$pg." WHERE user_id = "."'".$id."'"." AND board_text = "."'".$txt."'"." AND content_no = ".$user_process;

$result = mysqli_query($con,$update_bad);

if($result){
	
	echo "성공";
}else{
	echo "실패";
}

mysqli_free_result($result);
mysqli_close($con);

?>