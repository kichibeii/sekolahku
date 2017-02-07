<?php
	include 'connect.php';

	$nama_event = $_POST['nama_event'];
	$tanggal_mulai = $_POST['mulai_event_tanggal'];
	$bulan_mulai = $_POST['mulai_event_bulan'];
	$tahun_mulai = $_POST['mulai_event_tahun'];
	$tanggal_akhir = $_POST['akhir_event_tanggal'];
	$bulan_akhir = $_POST['akhir_event_bulan'];
	$tahun_akhir = $_POST['akhir_event_tahun'];
	$warna_event = $_POST['warna_event'];

	$sql_add = "INSERT INTO kalender(id_event, nama_event, mulai_event, akhir_event, warna_event) VALUE('', '$nama_event', '$tanggal_mulai/$bulan_mulai/$tahun_mulai', '$tanggal_akhir/$bulan_akhir/$tahun_akhir', '$warna_event')";
	mysqli_query($conn, $sql_add);
	header('Location:kalender.php');
?>