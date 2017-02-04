<?php 
	include 'connect.php';
	$nama_matpel=$_POST['nama_matpel'];
	$sql = "INSERT INTO mapel(nama_mapel) VALUES ('$nama_matpel')";
	if (mysqli_query($connect,$sql))
		header("location:daftarmutpel.php");
?>