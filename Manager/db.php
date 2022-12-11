<?php
if (!isset($_SESSION)) session_start();

$connection = mysqli_connect("localhost",'root','','movenpick');

if(!$connection) {
	die("Unable to connect" . mysqli_error($connection));
}

?>



    