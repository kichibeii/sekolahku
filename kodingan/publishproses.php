<?php

	session_start();
	include "connect.php";
	
	$semester=$_POST['semester'];
	$id_kelas=$_POST['id_kelas'];
	$id_mapel=$_POST['id_mapel'];
	$id_ag=$_POST['id_ag'];
	$jenis=$_POST['jenis'];
	$status_lihat=$_POST['status_lihat'];

	$counter=$_POST['counter'];
	for($i=0;$i<$counter;$i++){
		$id_nil="id_nilai$i";
		$id_nilai=$_POST[$id_nil];
		$query0=mysqli_query($connect,"UPDATE nilai SET status_lihat='$status_lihat' WHERE id_nilai='$id_nilai' AND jenis='$jenis'");
	}



	
?>
	
	<form method="POST" name="myForm" action="lihatnilaiguru3.php">
		<input hidden name="semester" value="<?php echo $semester ?>">
		<input hidden name="id_kelas" value="<?php echo $id_kelas ?>">
		<input hidden name="id_mapel" value="<?php echo $id_mapel ?>">
		<input hidden name="id_ag" value="<?php echo $id_ag ?>">
	</form>
	

<script type="text/javascript">document.myForm.submit();</script>
	