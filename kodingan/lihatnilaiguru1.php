<?php 
	session_start();
	include 'connect.php';
	$id_guru=$_SESSION['id'];
	$tahunmulai=2005;
	$buffer=0;


?>
<html>
	<title>
		Input Nilai
	</title> 
	<body>
		<form method="POST" action="lihatnilaiguru2.php">
		<select name="id_ag" required>
			<option disabled selected value="">Mata Pelajaran</option>
			<?php 

				$query1=mysqli_query($connect,"SELECT * FROM ambil_guru WHERE id_guru = '$id_guru'");
				while ($data1=mysqli_fetch_array($query1)){
					$id_mapel=$data1['id_mapel'];
					if($id_mapel==$buffer){
						continue;
					}
					$query2=mysqli_query($connect, "SELECT * FROM mapel WHERE id_mapel='$id_mapel'");
					$data2=mysqli_fetch_array($query2);
			?>
			<option value="<?php echo $data1['id_ambil_guru'] ?>"><?php echo $data2['nama_mapel']?></option>
			<?php
					$buffer=$id_mapel;
					}
			?>
		</select><br>
		
		<input type="submit" name="" value="NEXT">
		</form>
	</body>
</html>