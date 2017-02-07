<?php 
  session_start();
  $nis = $_SESSION['nis'];
  include 'connect.php';
  $query = mysqli_query($connect,"SELECT * FROM siswa WHERE nis = '$nis'");
  $data = mysqli_fetch_array($query);
  $tahun_sekarang = date("Y");
  $bulan = date("m");
  $perbedaan_tahun = $tahun_sekarang - $data['tahun_masuk'];
  
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

?>