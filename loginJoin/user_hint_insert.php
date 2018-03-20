<?php
session_start();
$id = $_SESSION['id'];
$table_id = $_SESSION['id']."_add_hint";

$Array = array();

$con = mysqli_connect("localhost","ckdal34","wendy0917","ckdal34");

$select_sql = "select add_hint_text from add_hint";

$result = mysqli_query($con,$select_sql);

if ( $result ) {
   
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {       
       $Array[] = $row['add_hint_text'];
    }
   
} else {
    echo "Error : ".mysqli_error($db_conn);
}

foreach ($Array as $value) {
	$add_hint_insert = "INSERT INTO ".$table_id." (add_hint_text) value("."'".$value."'".")";
	echo $add_hint_insert;
	mysqli_query($con,$add_hint_insert);
}


mysqli_close($con);

session_destroy();

?>
