<?php
session_id('hello');
session_start();

$content_no = $_SESSION['ctn'];

echo $content_no;

mysqli_free_result($result);
mysqli_close($con);

?>