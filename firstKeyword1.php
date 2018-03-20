<?php
session_id('hello');
session_start();

$present_id = $_SESSION['user_id'];

$Array = array();
$Array1 = array();

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$up_result = mysqli_query($con,$user_process_check);
$content = mysqli_fetch_array($up_result, MYSQLI_NUM);
$user_process = (int)$content[0];

$keyword_select="SELECT content_keyword FROM content_".$user_process."_user WHERE user_id = "."'".$present_id."'";

$result = mysqli_query($con,$keyword_select);

$a = mysqli_num_rows($result);

if ( $result ) {
    
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){

      $Array[] =  $row["content_keyword"];
    
    }

} else {
    echo "Error : ".mysqli_error($db_conn);
}

$userTxt = $Array[$a-1]; 

$keyword_first_check ="SELECT content_keyword FROM content_".$user_process."_user LIMIT 20";

$result = mysqli_query($con,$keyword_first_check);

if ( $result ) {
   
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {       
     $Array1[] = $row["content_keyword"];
    }
    //echo json_encode($json);

} else {
    echo "Error : ".mysqli_error($db_conn);
}

foreach ($Array1 as $value) {
	if(strcmp($value , $userTxt)){
		echo 0;
		break;
	}
	}



mysqli_free_result($result);
mysqli_close($con);

?>