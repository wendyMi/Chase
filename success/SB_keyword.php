<?php
session_id('hello');
session_start();

$content_no = $_SESSION['ctn'] ;
$present_id = $_SESSION['user_id'];

$json = array();
$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$keword_sort = "SELECT content_keyword, COUNT(*) FROM content_1_user WHERE content_keyword != '' GROUP BY content_keyword ORDER BY COUNT(*) DESC";

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