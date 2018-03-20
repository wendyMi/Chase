<?php
session_id('hello');

session_start(); #세션을 넣을지 말지 고민!
$S_id  = session_id();
//echo $S_id."<br />";
//echo $_SESSION['user_id'];
$present_id = $_SESSION['user_id'];
//echo $present_id."<br />";

//echo $print_id_info;

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$print_id_info = "SELECT * FROM chase_user WHERE user_id = "."'".$present_id."'";

$result = mysqli_query($con, $print_id_info);

$content = mysqli_fetch_array($result, MYSQLI_NUM);

print $content[3]."|".$content[1];

mysqli_free_result($result);
mysqli_close($con);


?>