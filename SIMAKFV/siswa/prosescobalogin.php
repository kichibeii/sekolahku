<?php 
	session_start();
	$nis = $_POST['nis'];
	$_SESSION['nis']=$nis;
	header("location:index.php");

?>