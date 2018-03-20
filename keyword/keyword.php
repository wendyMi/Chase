<?php
session_id('hello');
session_start();

$content_no = $_SESSION['ctn'] ;
$present_id = $_SESSION['user_id'];


//SELECT content_keyword, COUNT(*) FROM content_1_user GROUP BY content_keyword ORDER BY COUNT(*) desc

$json = array();
$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$user_process_check = "SELECT user_process FROM chase_user WHERE user_id = "."'".$present_id."'";

$up_result = mysqli_query($con,$user_process_check);
$content = mysqli_fetch_array($up_result, MYSQLI_NUM);
$user_process = $content[0];


$keword_sort = "SELECT content_keyword, COUNT(*) FROM content_".$user_process."_user WHERE content_keyword != '' GROUP BY content_keyword ORDER BY COUNT(*) DESC";

$result = mysqli_query($con,$keword_sort);

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