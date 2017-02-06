<?php 
	include 'connect.php';
	$nama_kelas = $_POST['nama_kelas'];
	$query=mysqli_query($connect,"INSERT INTO kelas (nama_kelas) VALUES ('$nama_kelas')");
	if ($query){
		header("location:daftarkelas.php");
	}
?>