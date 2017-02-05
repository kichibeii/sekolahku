<?php
	session_start();
	include "connect.php";
	
	$id_guru=$_SESSION['id'];

	$semester=$_POST['semester'];
	$id_kelas=$_POST['id_kelas'];
	$id_mapel=$_POST['id_mapel'];
	$ta=$_POST['tahunajaran'];
	$id_ag=$_POST['id_ag'];

	$uh=1;


?>
<!DOCTYPE html>
<html>
<head>
	<title>Lihat Nilai</title>
</head>
<body>
	<table>
	<?php
		$query1=mysqli_query($connect, "SELECT * FROM siswa WHERE id_kelas='$id_kelas'");
		while($data1=mysqli_fetch_array($query1)){
			$id_siswa=$data1['id_siswa'];
			/*echo $id_siswa;
			echo $id_mapel;
			echo $id_ag;
*/
			$query2=mysqli_query($connect, "SELECT * FROM ambil_siswa WHERE id_siswa='$id_siswa' AND id_mapel='$id_mapel' AND status='0'");
			$data2=mysqli_fetch_array($query2);
			$id_as=$data2['id_ambil_siswa'];
			
			$query3=mysqli_query($connect, "SELECT * FROM ajar WHERE id_ambil_siswa = '$id_as' AND id_ambil_guru='$id_ag' ");
			$data3=mysqli_fetch_array($query3);
			$id_ajar=$data3['id_ajar'];
			echo $id_ajar;
				
			$query5=mysqli_query($connect, "SELECT * FROM nilai WHERE id_ajar='$id_ajar'");
	?>
			<tr>
				<td>Nama Siswa</td>
	<?php
			while($data3=mysqli_fetch_array($query5)){
	?>
			
				<td><?php echo "UH ", $uh++ ?></td>	
	<?php
			}
			break;
		}
	?>
				<td>UTS</td>
				<td>UAS</td>
			</tr>

	<?php
		$query1=mysqli_query($connect, "SELECT * FROM siswa WHERE id_kelas='$id_kelas'");
		while($data1=mysqli_fetch_array($query1)){
			$id_siswa=$data1['id_siswa'];
			/*echo $id_siswa;
			echo $id_mapel;
			echo $id_ag;
*/
			$query2=mysqli_query($connect, "SELECT * FROM ambil_siswa WHERE id_siswa='$id_siswa' AND id_mapel='$id_mapel' AND status='0'");
			$data2=mysqli_fetch_array($query2);
			$id_as=$data2['id_ambil_siswa'];
			
			$query3=mysqli_query($connect, "SELECT * FROM ajar WHERE id_ambil_siswa = '$id_as' AND id_ambil_guru='$id_ag' ");
			$data3=mysqli_fetch_array($query3);
			$id_ajar=$data3['id_ajar'];
			echo $id_ajar;


			$query5=mysqli_query($connect, "SELECT * FROM nilai WHERE id_ajar='$id_ajar' AND jenis='H'");

			$query6=mysqli_query($connect, "SELECT * FROM nilai WHERE id_ajar='$id_ajar' AND jenis='T'");
			$data6=mysqli_fetch_array($query6);

			$query7=mysqli_query($connect, "SELECT * FROM nilai WHERE id_ajar='$id_ajar' AND jenis='A'");
			$data7=mysqli_fetch_array($query7);
	?>
			<tr>
				<td><?php echo $data1['nama_siswa'] ?></td>
	<?php
			while($data5=mysqli_fetch_array($query5)){
	?>
			
				<td><?php echo $data5['nilai'] ?></td>	
	<?php
			}
	?>
				<td><?php echo $data6['nilai'] ?></td>
				<td><?php echo $data7['nilai'] ?></td>
			</tr>
	

	<?php
		}
	?>
	</table>
	<br>
	<table>
	<tr>
	<td>
	<form method="POST" action="publishuhproses.php">
		<input hidden name="semester" value="<?php echo $semester ?>">
		<input hidden name="id_kelas" value="<?php echo $id_kelas ?>">
		<input hidden name="id_mapel" value="<?php echo $id_mapel ?>">
		<input hidden name="tahunajaran" value="<?php echo $ta ?>">
		<input hidden name="id_ag" value="<?php echo $id_ag ?>">
		<input type="submit" value="Publish UH">
	</form>
	</td>
	<td>
	<form method="POST" action="publishutsproses.php">
		<input hidden name="semester" value="<?php echo $semester ?>">
		<input hidden name="id_kelas" value="<?php echo $id_kelas ?>">
		<input hidden name="id_mapel" value="<?php echo $id_mapel ?>">
		<input hidden name="tahunajaran" value="<?php echo $ta ?>">
		<input hidden name="id_ag" value="<?php echo $id_ag ?>">
		<input type="submit" value="Publish UTS">
	</form>
	</td>
	<td>
	<form method="POST" action="publishuasproses.php">
		<input hidden name="semester" value="<?php echo $semester ?>">
		<input hidden name="id_kelas" value="<?php echo $id_kelas ?>">
		<input hidden name="id_mapel" value="<?php echo $id_mapel ?>">
		<input hidden name="tahunajaran" value="<?php echo $ta ?>">
		<input hidden name="id_ag" value="<?php echo $id_ag ?>">
		<input type="submit" value="Publish UAS">
	</form>
	</td>
	</tr>
	</table>
</body>
</html>