<?php
session_id('hello');
session_start();

$id = $_POST['id'];
$txt = $_POST['txt'];

$content_no = $_SESSION['ctn'];
$ctn = (int)$content_no;

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$present_bad = "SELECT board_bad FROM board WHERE user_id = "."'".$id."'"." AND board_text = "."'".$txt."'"." AND content_no = ".$ctn;

$result = mysqli_query($con,$present_bad);
$content = mysqli_fetch_array($result, MYSQLI_NUM);
$pg = (int)$content[0] + 1;

$update_bad = "UPDATE board SET board_bad = ".$pg." WHERE user_id = "."'".$id."'"." AND board_text = "."'".$txt."'"." AND content_no = ".$ctn;


$result = mysqli_query($con,$update_bad);

if ( $result ) {
   echo "성공";
} else {
    echo "Error : ".mysqli_error($db_conn);
}


mysqli_free_result($result);
mysqli_close($con);

?>