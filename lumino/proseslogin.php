<?php
	include 'connect.php';
	$username = $_POST['username'];
 	$password = $_POST['password'];
 	$query = mysqli_query($connect,"SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
 	if (mysqli_num_rows($query)>0){
 		header("location:dashboard.php");
 	}
 ?>
