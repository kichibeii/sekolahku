<?php
	session_start();
	include 'connect.php';
	$id_guru=$_SESSION['id'];

	$id_mapel=$_POST['id_mapel'];
	$id_ag=$_POST['id_ag'];

	$temp[0]=-1;
	$counter=0;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Input Nilai</title>
</head>
<body>
	<form method="POST" action="inputnilai3.php">
	<!-- 	<select name="id_kelas">
	<?php
		$query1=mysqli_query($connect, "SELECT * FROM ambil_kelas WHERE id_ambil_guru='$id_ag' AND status='0'");
		while($data1=mysqli_fetch_array($query1)){
			$id_kelas=$data1['id_kelas'];
			$query2=mysqli_query($connect, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
			$data2=mysqli_fetch_array($query2);
	
			for($i=0;$i<$counter;$i++){
				if($temp[$i]==$data1['id_kelas']){
					goto label;
				}
			}
			
			$temp[$counter]=$data1['id_kelas'];
			$counter++;
	?>

			<option value="<?php echo $data1['id_kelas'] ?>"><?php echo $data2['nama_kelas']," ",$data1['id_kelas'] ?></option>

	<?php
			label:
		}

	?>
		</select> -->
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
		
		<select name="jenis">
			<option value="nilai_uh">Ujian Harian</option>
			<option value="nilai_uts">Ujian Tengah Semester</option>
			<option value="nilai_uas">Ujian Akhir Semester</option>
		</select>
		<input hidden name="id_mapel" value="<?php echo $id_mapel ?>">	
		<input hidden name="id_ag" value="<?php echo $id_ag ?>">
		<input type="submit" value="NEXT">
	</form>
</body>
</html>