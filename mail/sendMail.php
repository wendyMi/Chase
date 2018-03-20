<?php
session_id('hello');
session_start();


$present_id = $_SESSION['user_id'];
$toId = $_POST['toId'];
$mailTitle = $_POST['mailTitle'];
$mailText = $_POST['mailText']; 

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$mailbox_insert = "INSERT INTO ".$toId."_mailbox(user_id, mail_title, mail_text) VALUES('".$present_id."','".$mailTitle."','".$mailText."');";

echo $mailbox_insert;

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

mysqli_query($con, $mailbox_insert);

mysqli_close($con);


/*
$stmt = mysqli_prepare($con,$board_insert);
mysqli_stmt_bind_param($stmt,'ss',$present_id,$mailTitle,$mailText);
echo $mailbox_insert;

/*
$mailbox_insert_success_or_failure = mysqli_stmt_execute($stmt);




mysqli_free_result($result);
mysqli_close($con);
*/

?>