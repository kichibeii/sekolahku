<?php
	include 'connect.php';
	$id_mapel=$_POST['id_matpel'];
	$id_guru = $_POST['id_guru'];
	$sql="INSERT INTO ambil_guru(id_guru,id_mapel) VALUES ('$id_guru','$id_mapel')";
	if (mysqli_query($connect,$sql)){
		header("location:daftarmutpel.php");
	}
 ?>