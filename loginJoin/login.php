<?php
session_start(); 
session_id('hello');

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");


$id = $_POST['id'];
$pw = $_POST['pw'];

$_SESSION['user_id'] = $id;
$S_id  = session_id();



$login = "SELECT * FROM chase_user WHERE user_id = ? AND user_pw= ?";

$stmt = mysqli_prepare($con,$login);
mysqli_stmt_bind_param($stmt,'ss',$id,$pw);
mysqli_stmt_execute($stmt);

mysqli_stmt_store_result($stmt);
$login_success_or_failure = mysqli_stmt_num_rows($stmt);

if($login_success_or_failure)
{
	echo "성공";
}else{
	echo "아이디와 비밀번호가 틀렸거나 회원이 아닙니다.";
}

?>
