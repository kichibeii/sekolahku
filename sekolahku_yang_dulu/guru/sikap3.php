<?php
  include '../php/connect.php';
  $id_guru=$_SESSION["id"];
  $dapat=$_POST['counter'];
  $semester=$_POST['semester'];
  for ($x=0;$x<$dapat;$x++){
    $v_b  = "data$x";
    $id_sisw = "id_sis$x";
    $nilai=$_POST[$v_b];
    $id_siswa = $_POST[$id_sisw];
    $query = mysqli_query($conn," INSERT INTO sikap(id_siswa, id_guru, semester, nilai) VALUES('$id_siswa','$id_guru','$semester','$nilai')");
  }
  header('Location:sikap.php');
?>
