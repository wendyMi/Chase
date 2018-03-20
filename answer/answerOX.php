<?php
session_id('hello');
session_start();

$answerArray = array();

$present_id = $_SESSION['user_id'];

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$user_process_check = "SELECT user_process FROM chase_user WHERE user_id = "."'".$present_id."'";

$up_result = mysqli_query($con,$user_process_check);
$content = mysqli_fetch_array($up_result, MYSQLI_NUM);
$user_process = (int)$content[0];

$answer_select="SELECT content_keyword FROM content_".$user_process."_user WHERE user_id = "."'".$present_id."'";

$result = mysqli_query($con,$answer_select);

if ( $result ) {
    
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
       
       $answerArray[] = $row["content_keyword"];
 
    }

} else {
    echo "Error : ".mysqli_error($db_conn);
}
/*
foreach ($answerArray as $value) {
	echo $value."<br/>";
}
*/
$numRows = mysqli_num_rows($result);

$userAnswerTxt = $answerArray[$numRows-1]; 

switch ($user_process) {
	
	case 1:
		if($userAnswerTxt == "22.5"){
			echo "perfect";
		}else{
			echo "no";
		}
		break;
	case 2:
		if($userAnswerTxt == "17"){
			echo "perfect";
		}else{
			echo "no";
		}
		break;

	default:
		break;
}

mysqli_free_result($result);
mysqli_close($con);


?>
