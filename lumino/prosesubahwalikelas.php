<?php 
	include 'connect.php';
	//nge-reset id_kelas di guru
	$query=mysqli_query($connect,"SELECT * FROM guru");
	while ($data=mysqli_fetch_array($query)){
		$id_guru = $data['id_guru'];
		$query2=mysqli_query($connect,"UPDATE guru SET id_kelas='0' WHERE id_guru = '$id_guru'");
	}
	//baca jumlah
	$x=0;
	
	//baca sekaligus input 
	$query2=mysqli_query($connect,"SELECT * FROM kelas");
	while ($data2=mysqli_fetch_array($query2)){
		$id_kelas=$data2['id_kelas'];
		$id = "id_guru$x";
		$id_guru=$_POST[$id];
		$x=$x+1;
		$query3=mysqli_query($connect,"UPDATE guru SET id_kelas='$id_kelas' WHERE id_guru = '$id_guru'");
	}

	//loncat ke daftarkelas.php
	header("location:daftarkelas.php");

?>
