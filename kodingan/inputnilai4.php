<?php 
	session_start();
	include 'connect.php';

	$id_ag=$_POST['id_ag'];

	$jenis=$_POST['jenis'];
	if($jenis=="nilai_uh"){
		$jenis1="UH";
	}else if($jenis=="nilai_uts"){
		$jenis1="UTS";
	}else{
		$jenis1="UAS";
	}

	$dapat=$_POST['counter'];
	$cek=0;

	for ($x=0;$x<$dapat;$x++){
		$v_b  = "data$x";
		$id_aja = "id_ajar$x";
		$nilai=$_POST[$v_b];
		$id_ajar = $_POST[$id_aja];

		$query0=mysqli_query($connect,"SELECT * FROM ajar WHERE id_ajar='$id_ajar'");
		$data0=mysqli_fetch_array($query0);
		$semester=$data0['semester'];

		$query = mysqli_query($connect," INSERT INTO nilai(id_ajar, nilai, jenis, semester) VALUES('$id_ajar', '$nilai', '$jenis','$semester')");
		if($query){
			$cek++;
		}
	}

	if($cek==$dapat){
		$message="Nilai $jenis1 berhasil dimasukkan";
		echo "<SCRIPT type='text/javascript'> //not showing me this
		        alert('$message');
		      
		    </SCRIPT>";
		//echo "<script type='text/javascript'> alert('Nilai berhasil dimasukkan') </script>"; 
		header("location:berandaguru.php");
	}else{
		$message="Nilai $jenis1 gagal dimasukkan";
		echo "<SCRIPT type='text/javascript'> //not showing me this
		        alert('$message');
		        
		    </SCRIPT>";
		//echo "<script> window.alert('Nilai gagal dimasukkan') </script>";
		header("location:berandaguru.php");
	}
?>