<?php

session_start();
echo "joinpage.php"."<br />";
echo $_SESSION['id']."<br />"; 
echo $_SESSION['pw']."<br />"; 
echo $_SESSION['email']."<br />"; 
echo $_SESSION['birth']."<br />"; 
echo $_SESSION['gender']."<br />";

$id = $_SESSION['id'];
$pw = $_SESSION['pw'];
$email = $_SESSION['email']; 
$birth = $_SESSION['birth'];
$gender = $_SESSION['gender'];

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");
$join = "INSERT INTO chase_user(user_id,user_pw,user_email,user_nickname,user_birth,user_gender) VALUES(?,?,?,?,?,?)";


$stmt = mysqli_prepare($con,$join);

mysqli_stmt_bind_param($stmt,'sssssd',$id,$pw,$email,$id,$birth,$gender);
$join_success_or_failure = mysqli_stmt_execute($stmt);


if($join_success_or_failure) // true면
{
	header('Location: ./user_mail_create.php');
}else{ //false면
	echo "회원가입실패";
}
mysqli_stmt_close($stmt);
mysqli_close($con);


?>