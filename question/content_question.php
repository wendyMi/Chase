<?php
session_id('hello');
session_start();

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$present_id = $_SESSION['user_id'];

$user_process_check = "SELECT user_process FROM chase_user WHERE user_id = "."'".$present_id."'";

$up_result = mysqli_query($con,$user_process_check);
$content = mysqli_fetch_array($up_result, MYSQLI_NUM);
$user_process = $content[0];


$content_process = (int)$user_process + 1;

echo $content_process;
/*
$content_question = "SELECT * FROM content_".$content_process;

$result = mysqli_query($con,$content_question);

if ( $result ) {
    
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
       
       printf ("%s", $row["content_text"]);
      
    }
    
} else {
    echo "Error : ".mysqli_error($db_conn);
}

mysqli_free_result($result);
mysqli_close($con);
*/
?>