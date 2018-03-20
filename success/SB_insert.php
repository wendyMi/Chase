<?php
session_id('hello');
session_start();

$content_no = $_SESSION['ctn'];
$present_id = $_SESSION['user_id'];
$board_text = $_POST['board_text'];
$ctn_no = (int)$content_no;

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$SB_insert = "INSERT INTO board(user_id, board_text,content_no) VALUES (?,?,?)";

$stmt = mysqli_prepare($con,$SB_insert);

mysqli_stmt_bind_param($stmt,'ssi',$present_id,$board_text,$ctn_no);
$SB_insert_P_F = mysqli_stmt_execute($stmt);

if($SB_insert_P_F){
	header('Location: ./SB_select.php');
}else{
	echo "실패";
}

?>
             