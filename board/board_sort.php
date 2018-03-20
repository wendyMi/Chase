<?php
session_id('hello');
session_start();

$present_id = $_SESSION['user_id'];
$json = array();

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$user_process_check = "SELECT user_process FROM chase_user WHERE user_id = "."'".$present_id."'";

$up_result = mysqli_query($con,$user_process_check);
$content = mysqli_fetch_array($up_result, MYSQLI_NUM);
$user_process = $content[0];

$order = "SELECT * FROM board WHERE content_no = ".$user_process." ORDER BY board_good-board_bad DESC";

$result = mysqli_query($con,$order);

if ( $result ) {
   
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {       
      $json[] = $row;
    
    }
    echo json_encode($json);

} else {
    echo "Error : ".mysqli_error($db_conn);
}



mysqli_free_result($result);
mysqli_close($con);

?>