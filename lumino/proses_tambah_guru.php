<?php
	include 'connect.php';
	$nama = $_POST['nama'];
	$NIP = $_POST['NIP'];
	$pass = $_POST['password'];
	$wali_kelas = $_POST['wali_kelas'];
	$sikap = $_POST['sikap'];
	$sql = "INSERT INTO guru(nama_guru,status_sikap,status_wali,nip,password) VALUES ('$nama','$sikap','$wali_kelas','$NIP','$pass')";
	if (mysqli_query($connect,$sql)){
		header("location:daftarguru.php");
	}
?>