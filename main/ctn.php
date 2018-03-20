<?php
session_id('hello');
session_start();

$ctn= $_POST['ctn'];

$_SESSION['ctn'] = $ctn;


echo $ctn;



?>