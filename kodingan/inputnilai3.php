<?php
	session_start();
	include 'connect.php';

	$id_kelas=$_POST['id_kelas'];
	$jenis=$_POST['jenis'];
	$id_mapel=$_POST['id_mapel'];
	$id_ag=$_POST['id_ag'];

	// echo $id_kelas;

	$counter=0;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Input Nilai</title>
</head>
<body>
	<form method="POST" action="inputnilai4.php">
		<table>
			<tr>
				<td>Nama Siswa</td>
				<td>Nilai</td>
			</tr>
		<?php
			$query1=mysqli_query($connect, "SELECT * FROM siswa WHERE id_kelas='$id_kelas'");
			while($data1=mysqli_fetch_array($query1)){
				$id_siswa=$data1['id_siswa'];

				$query2=mysqli_query($connect, "SELECT * FROM ambil_siswa WHERE id_siswa='$id_siswa' AND id_mapel='$id_mapel' AND status='0'");
				$data2=mysqli_fetch_array($query2);
				$id_as=$data2['id_ambil_siswa'];
				
				$query3=mysqli_query($connect, "SELECT * FROM ajar WHERE id_ambil_siswa = '$id_as' AND id_ambil_guru='$id_ag' ");
				$data3=mysqli_fetch_array($query3);
				$id_ajar=$data3['id_ajar'];
		?>
			<tr>
				<td><?php echo $data1['nama_siswa']?></td>
				<td><input type="number" name="data<?php echo $counter; ?>" min="0" max="100" required></td>
				<input name="id_ajar<?php echo $counter;?>" value="<?php echo $id_ajar;?>" hidden>
			</tr>
		<?php
			$counter=$counter+1;
			}
		?>
		</table>
		<input name="id_ag" value="<?php echo $id_ag ?>" hidden>
		<input name="counter" value="<?php echo $counter?>" hidden>
		<input name="jenis" value="<?php echo $jenis?>" hidden>
		<input type="submit" value="submit">
	</form>
</body>
</html>