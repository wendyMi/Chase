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

echo $user_process."<br/>";
$present_good = "SELECT board_good FROM board WHERE user_id = "."'".$id."'"." AND board_text = "."'".$txt."'"." AND content_no = ".$user_process;
echo $present_good;
$good_result = mysqli_query($con,$present_good);
$ctnt = mysqli_fetch_array($good_result, MYSQLI_NUM);
$good_present = $ctnt[0];


echo $good_present."<br/>";

$pg = (int)$good_present + 1;

echo $pg;

$update_good = "UPDATE board SET board_good = ".$pg." WHERE user_id = "."'".$id."'"." AND board_text = "."'".$txt."'"." AND content_no = ".$user_process;

$result = mysqli_query($con,$update_good);

if($result){
	
	echo "성공";
}else{
	echo "실패";
}

mysqli_free_result($result);
mysqli_close($con);

?>