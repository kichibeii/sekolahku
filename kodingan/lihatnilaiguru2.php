<?php
	session_start();
	include 'connect.php';
	//$id_mapel=$_GET['kirim_id'];
	$id_guru=$_SESSION['id'];
	$id_ag=$_POST['id_ag'];
	//$ta=$_POST['tahunajaran'];
	$buffer=array("0","0");
	$countarray=0;
	$i=0;
	// $tahunmulai=2000;

	
	

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="lihatnilaiguru3.php">
		<select name="semester">
			<option disabled="" selected="">Semester...</option>
	<?php 
			$query2=mysqli_query($connect, "SELECT * FROM ajar WHERE id_ambil_guru='$id_ag' ");
			while($data2=mysqli_fetch_array($query2)){
				$semester=$data2['semester'];
				for($i=0; $i<$countarray; $i++){
					if($semester=$buffer[$i]){
						goto label1;
					}
				}

	?>
			<option value="<?php echo $data2['semester']?>"><?php echo $data2['semester'] ?></option>
	<?php
			$buffer[$countarray]=$semester;
			$countarray++;
			break;
			label1:
		}
		$countarray=0;
		$buffer=array("0","0");
	?>
		</select>

	
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
	<?php 
		$query3=mysqli_query($connect, "SELECT * FROM ambil_guru WHERE id_ambil_guru=$id_ag");
		$data3=mysqli_fetch_array($query3);
	?>
		<input name="id_mapel" value="<?php echo $data3['id_mapel'] ?>" hidden>
		<!-- <input name="tahunajaran" value="<?php echo $ta ?>" hidden> -->
		<input name="id_ag" value="<?php echo $id_ag ?>" hidden>
		<input type="submit" name="" value="NEXT">
	</form>
	<!-- <form method="POST" action="gurulihatnilai3.php" id="form1">
		<table>
			<?php
				$query1=mysqli_query($connect,"SELECT * FROM nilai_uh WHERE $id_mapel=")
			?>
		</table>
		<input name="id_ajar" value="<?php echo $id_ajar; ?>" hidden>
	</form>

	Tahun ajaran&nbsp; : &nbsp;
	<select name="tahunajaran" form="form1" style="width: 100px"  required>
		<option disabled selected value="NULL">Pilih...</option>
	<?php
		while($tahunmulai<=date("Y")){
	?>
		<option value="<?php echo $tahunmulai; ?>"><?php echo $tahunmulai,"/",$tahunmulai+1; ?> </option>
	<?php
		$tahunmulai++;
		}
	?>
	</select>

	<br>
	Semester&emsp;&emsp;: &nbsp;
	<select name="semester" form="form1" style="width: 100px" required>
		<option disabled selected>Pilih...</option>
		<option value="0">Genap</option>
		<option value="1">Ganjil</option>
	</select>
	<br>
	<input type="submit" value="submit" form="form1"> -->

</body>
</html>