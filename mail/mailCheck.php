<?php
session_id('hello');
session_start();

$present_id = $_SESSION['user_id'];

$json = array();
$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$mailbox_select = "SELECT * FROM ".$present_id."_mailbox";

$result = mysqli_query($con,$mailbox_select);

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