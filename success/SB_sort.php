<?php
session_id('hello');
session_start();

$content_no = $_SESSION['ctn'];
$ctn_no = (int)$content_no;


$json = array();

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$order = "SELECT * FROM board WHERE content_no = ".$ctn_no." ORDER BY board_good-board_bad DESC";

//echo $order;


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