<?php
if (!isset($_SESSION)) session_start();

$connection = mysqli_connect("localhost",'root','','movenpick2');
if(!$connection) {
	die("Unable to connect" . mysqli_error($connection));
}
//$connection = mysqli_connect("localhost",'t2whhoxs1tm2','qusai078R','Movenpick1');


?>



    