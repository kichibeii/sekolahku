<?php
	session_start();
	include 'connect.php';
	$id_guru=$_SESSION['id'];
	//echo $id_guru;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Input Nilai</title>
</head>
<body>
	<form method="POST" action="inputnilai3.php">
		Mata Pelajaran : 
		<select name="id_ag">
	<?php
		$query1=mysqli_query($connect, "SELECT * FROM ambil_guru WHERE id_guru='$id_guru'");
		while($data1=mysqli_fetch_array($query1)){
			$id_mapel=$data1['id_mapel'];
			$query2=mysqli_query($connect, "SELECT * FROM mapel WHERE id_mapel='$id_mapel'");
			$data2=mysqli_fetch_array($query2);
	?>

			<option value="<?php echo $data1['id_ambil_guru'] ?>"><?php echo $data2['nama_mapel'] ?></option>

	<?php
		}
	?>
		</select>
		<br>
		<br>
		&ensp;&emsp;&ensp;&emsp;&ensp; Kelas : 
		<select name="id_kelas">
	<?php
		$query1=mysqli_query($connect, "SELECT * FROM kelas");
		while($data1=mysqli_fetch_array($query1)){
			$id_kelas=$data1['id_kelas'];
			$nama_kelas=$data1['nama_kelas'];
	?>

			<option value="<?php echo $id_kelas?>"><?php echo $nama_kelas?></option>

	<?php
		}
	?>

		</select>
		<br>
		<br>
		&emsp;&emsp;&emsp;&emsp;Jenis : 
		<select name="jenis">
			<option value="H">Ujian Harian</option>
			<option value="T">Ujian Tengah Semester</option>
			<option value="A">Ujian Akhir Semester</option>
		</select>

		<input hidden name="id_mapel" value="<?php echo $id_mapel ?>">	
	

		<input type="submit" value="NEXT">
	<form>
</body>
</html>