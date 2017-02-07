<?php 

	include 'connect.php';
	$id = $_POST['username'];
	$pass = $_POST['password'];

	$queryg = mysqli_query($conn, "SELECT * FROM guru WHERE nip = '$id' AND password = '$pass'");
	if (mysqli_num_rows($queryg)>0){
		$datag = mysqli_fetch_array($queryg);
		$_SESSION['id'] = $datag['id_guru'];
		$_SESSION['nama'] = $datag['nama_guru'];
		$_SESSION['status'] = "guru";
		header("location:../guru/index.php");
	}

	$querys = mysqli_query($conn, "SELECT * FROM siswa WHERE nis = '$id' AND password  = '$pass'");
	if (mysqli_num_rows($querys)>0){
		$datas = mysqli_fetch_array($querys);
		$_SESSION['id'] = $datas['id_siswa'];
		$_SESSION['nama'] = $datas['nama_siswa'];
		$_SESSION['status'] = "siswa";
		header("location:../siswa/index.php");
	}
	else { ?>
		<script language="javascript">alert("Username atau Password Salah");</script>
		<script>document.location.href='../index.php';</script>
	<?php }
?> 