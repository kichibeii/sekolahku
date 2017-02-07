<?php
	session_start();
	include "connect.php";
	
	$id_guru=$_SESSION['id'];

	$semester=$_POST['semester'];
	$id_kelas=$_POST['id_kelas'];
	$id_mapel=$_POST['id_mapel'];
	//$ta=$_POST['tahunajaran'];
	$id_ag=$_POST['id_ag'];
	$id_nilai[0]=0;
	$counter=0;

	$cekUH=2;
	$cekUTS=2;
	$cekUAS=2;

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
		
			$query2=mysqli_query($connect, "SELECT * FROM ambil_siswa WHERE id_siswa='$id_siswa' AND id_mapel='$id_mapel' AND status='0'");
			$data2=mysqli_fetch_array($query2);
			$id_as=$data2['id_ambil_siswa'];
			
			$query3=mysqli_query($connect, "SELECT * FROM ajar WHERE id_ambil_siswa = '$id_as' AND id_ambil_guru='$id_ag' ");
			$data3=mysqli_fetch_array($query3);
			$id_ajar=$data3['id_ajar'];
			
				
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
			
			$query2=mysqli_query($connect, "SELECT * FROM ambil_siswa WHERE id_siswa='$id_siswa' AND id_mapel='$id_mapel' AND status='0'");
			$data2=mysqli_fetch_array($query2);
			$id_as=$data2['id_ambil_siswa'];
			
			$query3=mysqli_query($connect, "SELECT * FROM ajar WHERE id_ambil_siswa = '$id_as' AND id_ambil_guru='$id_ag' ");
			$data3=mysqli_fetch_array($query3);
			$id_ajar=$data3['id_ajar'];
		
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
				if($cekUH==2){
					$cekUH=$data5['status_lihat'];
				}
	?>
			
				<td><?php echo $data5['nilai'] ?></td>

	<?php
				$id_nilai[$counter]=$data5['id_nilai'];
				$counter++;
			}
			if(mysqli_num_rows($query5) == 0){
				$cekUH=2;
			}
	?>

			<td><?php echo $data6['nilai'] ?></td>

	<?php
			if($cekUTS==2){
				$cekUTS=$data6['status_lihat'];
			}
			$id_nilai[$counter]=$data6['id_nilai'];
			$counter++;
			if(mysqli_num_rows($query6) == 0){
				$cekUTS=2;
			}
	?>

			<td><?php echo $data7['nilai'] ?></td>

	<?php
			if($cekUAS==2){
				$cekUAS=$data7['status_lihat'];
			}
			$id_nilai[$counter]=$data7['id_nilai'];
			$counter++;
			if(mysqli_num_rows($query7) == 0){
				$cekUAS=2;
			}
	?>

			</tr>
	
	<?php
		}
	?>

	</table>
	<br>
	<table>
		<tr>
			<td>
				<form method="POST" action="publishproses.php" onsubmit="return myFunction(<?php echo $cekUH?>)">
					<input hidden name="semester" value="<?php echo $semester ?>">
					<input hidden name="id_kelas" value="<?php echo $id_kelas ?>">
					<input hidden name="id_mapel" value="<?php echo $id_mapel ?>">
					<input hidden name="id_ag" value="<?php echo $id_ag ?>">
					<input hidden name="counter" value="<?php echo $counter?>">
					<input hidden name="jenis" value="H">

	<?php
					for($i=0;$i<$counter;$i++){
	?>
	
						<input hidden name="id_nilai<?php echo $i?>" value="<?php echo $id_nilai[$i]?>">
	
	<?php
					}
					if($cekUH==0){
	?>

						<span style="color:red">UH belum di publish</span><br>
						<input hidden name="status_lihat" value="1">
						<input type="submit" value="Publish UH" >

	<?php
					}else if($cekUH==1){
	?>
						<span style="color:#64dd17">UH sudah di publish</span><br>
						<input hidden name="status_lihat" value="0">
						<input type="submit" value="Unpublish UH" >

	<?php
					}else{
	?>

						<span style="color:grey">Belum ada nilai UH</span><br>

	<?php
					}
	?>

				</form>
			</td>
			<td>&emsp;</td>
			<td>
				<form method="POST" action="publishproses.php" onsubmit="return myFunction()">
					<input hidden name="semester" value="<?php echo $semester ?>">
					<input hidden name="id_kelas" value="<?php echo $id_kelas ?>">
					<input hidden name="id_mapel" value="<?php echo $id_mapel ?>">
					<input hidden name="id_ag" value="<?php echo $id_ag ?>">
					<input hidden name="counter" value="<?php echo $counter?>">
					<input hidden name="jenis" value="T">

	<?php
					for($i=0;$i<$counter;$i++){
	?>
	
						<input hidden name="id_nilai<?php echo $i?>" value="<?php echo $id_nilai[$i]?>">
	
	<?php
					}
					if($cekUTS==0){
	?>

						<span style="color:red">UTS belum di publish</span><br>
						<input hidden name="status_lihat" value="1">
						<input type="submit" value="Publish UTS" >

	<?php
					}else if($cekUTS==1){
	?>

						<span style="color:#64dd17">UTS sudah di publish</span><br>
						<input hidden name="status_lihat" value="0">
						<input type="submit" value="Unpublish UTS" >

	<?php
					}else{
	?>

						<span style="color:grey">Belum ada nilai UTS</span><br>

	<?php
					}
	?>

				</form>
			</td>
			<td>&emsp;</td>
			<td>
				<form method="POST" action="publishproses.php" onsubmit="return myFunction()">
					<input hidden name="semester" value="<?php echo $semester ?>">
					<input hidden name="id_kelas" value="<?php echo $id_kelas ?>">
					<input hidden name="id_mapel" value="<?php echo $id_mapel ?>">
					<input hidden name="id_ag" value="<?php echo $id_ag ?>">
					<input hidden name="counter" value="<?php echo $counter?>">
					<input hidden name="jenis" value="A">

	<?php
					for($i=0;$i<$counter;$i++){
	?>
	
						<input hidden name="id_nilai<?php echo $i?>" value="<?php echo $id_nilai[$i]?>">
	
	<?php
					}
					if($cekUAS==0){
	?>

						<span style="color:red">UAS belum di publish</span><br>
						<input hidden name="status_lihat" value="1">
						<input type="submit" value="Publish UAS" >

	<?php
					}else if($cekUAS==1){
	?>

						<span style="color:#64dd17">UAS sudah di publish</span><br>
						<input hidden name="status_lihat" value="0">
						<input type="submit" value="Unpublish UAS" >

	<?php
					}else{
	?>

						<span style="color:grey">Belum ada nilai UAS</span><br>

	<?php
					}
	?>
				</form>
			</td>
		</tr>
	</table>
</body>
</html>

<script>

function myFunction(x) {
    var y;
    if(x==0){
    	y="Apakah anda yakin ingin meng-publish nilai ini?"
    }else{
    	y="Apakah anda yakin ingin meng-unpublish nilai ini?"
    }
    if (confirm(y) == true) {
    	return true;
    } else {
        return false;
    }
    
}
</script>