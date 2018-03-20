<?php
session_id('hello');
session_start();

$id = $_POST['id'];
$txt = $_POST['txt'];

$content_no = $_SESSION['ctn'];
$ctn = (int)$content_no;

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$present_good = "SELECT board_good FROM board WHERE user_id = "."'".$id."'"." AND board_text = "."'".$txt."'"." AND content_no = ".$ctn;


$result = mysqli_query($con,$present_good);
$content = mysqli_fetch_array($result, MYSQLI_NUM);
$pg = (int)$content[0] + 1;


$update_good = "UPDATE board SET board_good = ".$pg." WHERE user_id = "."'".$id."'"." AND board_text = "."'".$txt."'"." AND content_no = ".$ctn;

$result = mysqli_query($con,$update_good);

if ( $result ) {
   echo "성공";
} else {
    echo "Error : ".mysqli_error($db_conn);
}


mysqli_free_result($result);
mysqli_close($con);

?>