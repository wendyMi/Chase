<?php
session_start();

echo $_SESSION['id']."<br />"; 
$id = $_SESSION['id'];


$table_id = $_SESSION['id']."_add_hint";
$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");
 

$sql = "CREATE TABLE ".$table_id." (add_hint_no int(11) auto_increment, add_hint_text text, add_hint_get int(11) DEFAULT 0, primary key(add_hint_no))";





if(mysqli_query($con,$sql)) 
{
	header('Location: ./user_hint_insert.php');
}else{ 
	echo "힌트실패";
}

mysqli_close($con);



?>
