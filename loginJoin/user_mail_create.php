<?php
session_start();

echo $_SESSION['id']."<br />"; 
$id = $_SESSION['id'];
echo var_dump($id);

$table_id = $_SESSION['id']."_mailbox";

echo $table_id;

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");
 

$sql = "CREATE TABLE ".$table_id." (mail_no int(11) auto_increment, user_id varchar(20), mail_title varchar(50), mail_text text,
checked tinyint DEFAULT 0, primary key(mail_no), CONSTRAINT ".$id."_fk FOREIGN KEY(user_id) REFERENCES chase_user(user_id))";

echo $sql."<br/>";

if(mysqli_query($con,$sql)) 
{
	header('Location: ./user_hint_create.php');;
}else{ 
	echo "메일실패";
}

mysqli_close($con);



?>
