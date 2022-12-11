<?php 

session_start();
$_SESSION['logged_in']=false;
unset($_SESSION['logged_in']);

session_destroy();
session_write_close();
header('Location: Login.php');
die;
?>