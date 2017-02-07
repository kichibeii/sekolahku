<?php 
	include '../php/connect.php';

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

		$query = mysqli_query($conn," INSERT INTO $jenis(id_ajar, nilai) VALUES('$id_ajar', '$nilai')");
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
		header("location:input.php");
	}else{
		$message="Nilai $jenis1 gagal dimasukkan";
		echo "<SCRIPT type='text/javascript'> //not showing me this
		        alert('$message');
		        
		    </SCRIPT>";
		//echo "<script> window.alert('Nilai gagal dimasukkan') </script>";
		header("location:input.php");
	}
?>