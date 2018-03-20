<?php
session_start();
$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$id = $_POST['id'];
$pw = $_POST['pw'];
$email = $_POST['email'];
$birth = $_POST['birth'];
$gender = $_POST['gender'];

$_SESSION['id'] = $id;
$_SESSION['pw'] = $pw;
$_SESSION['email'] = $email;
$_SESSION['birth'] = $birth;
$_SESSION['gender'] = $gender;



$join_user_exist_check ="SELECT * FROM chase_user WHERE user_id = ? "; 

$stmt = mysqli_prepare($con,$join_user_exist_check);

mysqli_stmt_bind_param($stmt,'s',$id);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$join_success_or_failure  = mysqli_stmt_num_rows($stmt);

if($join_success_or_failure) // id가 존재하면
{
	header('Location: ./id_exist.php');
}else{ //id가 존재하지 않으면 조인페이지에 입력받은 값들을 넘겨주어 로그인 시킴
	
	header('Location: ./join.php');
	exit();
}
mysqli_stmt_close($stmt);
mysqli_close($con);

?>