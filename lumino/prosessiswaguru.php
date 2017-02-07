<?php 
include 'connect.php';
$id_kelas=$_POST['kelas'];
$id_mapel=$_POST['mapel'];
$id_guru = $_POST['guru'];


//ngambil id_guru
$query=mysqli_query($connect,"SELECT * FROM ambil_guru WHERE id_guru = '$id_guru' AND id_mapel='$id_mapel'");
if (mysqli_num_rows($query)==0){
	header("location:error.php");
}
$data=mysqli_fetch_array($query);
$id_ambil_guru=$data['id_ambil_guru'];

	//ngambil id_siswa & semester
 	$query2=mysqli_query($connect,"SELECT * FROM siswa WHERE id_kelas = '$id_kelas'");
 	while($data2=mysqli_fetch_array($query2)){
 		$id_siswa=$data2['id_siswa'];
 		$tahun_sekarang = date("Y");
 		 $bulan = date("m");
  		$perbedaan_tahun = $tahun_sekarang - $data2['tahun_masuk'];
  		if ($perbedaan_tahun==0 && $bulan > 6){
   		 $semester = 1;
  		}else if ($perbedaan_tahun==1 && $bulan <= 6){
   		 $semester = 2;
  		}else if ($perbedaan_tahun==1 && $bulan > 6){
   		 $semester = 3;
  		}else if ($perbedaan_tahun==2 && $bulan <= 6){
    	$semester = 4;
  		}else if ($perbedaan_tahun==2 && $bulan > 6){
   		 $semester = 5;
  		}else if ($perbedaan_tahun==3 && $bulan <= 6){
   		 $semester = 6;
		}
 		//$input_ambil_siswa=mysqli_query($connect,"INSERT INTO ambil_siswa(id_siswa,id_mapel,semester) VALUES('$id_siswa','$id_mapel','$semester')");
		$query3=mysqli_query($connect,"SELECT * FROM ambil_siswa WHERE id_siswa = '$id_siswa' AND id_mapel='$id_mapel' AND semester = '$semester'");
		$data3=mysqli_fetch_array($query3);
		$id_ambil_siswa=$data3['id_ambil_siswa'];
 		 
		$result=mysqli_query($connect,"INSERT INTO ajar(id_ambil_siswa,id_ambil_guru,semester) VALUES ('$id_ambil_siswa','$id_ambil_guru','$semester')");

 	}
 	header("location:dashboard.php");
?>