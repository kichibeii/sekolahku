<!DOCTYPE html>
<?php 
    include '../connect.php'; 

    if ($_SESSION['status'] != "guru") {
      if ($_SESSION['status'] == "siswa") {
        header('Location:../siswa/index.php');
      }
      else {
        header('Location:../index.php');
      }
    }

    $id_guru = $_SESSION['id'];
    $query = mysqli_query($connect, "SELECT * FROM guru WHERE id_guru = '$id_guru'");
    $result = mysqli_fetch_array($query);

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
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SMA Fons Vitae 1 Matsudirini | Jakarta Timur</title>
  <link rel="shortcut icon" type="image/png" href="../dist/img/logo-lg.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.css">
  <link rel="stylesheet" href="../dist/css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-red-light">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo">
        <span class="logo-lg"><img src="../dist/img/logo.png"> SMA Fons Vitae 1</span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <!-- Top Navbar -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="hidden-xs">
              <a>
                <i class="fa fa-calendar"></i>
                <script type='text/javascript'>
                  var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                  var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                  var date = new Date();
                  var day = date.getDate();
                  var month = date.getMonth();
                  var thisDay = date.getDay(),
                      thisDay = myDays[thisDay];
                  var yy = date.getYear();
                  var year = (yy < 1000) ? yy + 1900 : yy;
                  document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                </script>
              </a>
            </li>
            <li class="hidden-xs">
              <a>
                <i class="fa fa-clock-o"></i>
                <span id="jam"></span>
                <script type="text/javascript">
                  function startTime() {
                    var today=new Date(),
                      curr_hour=today.getHours(),
                      curr_min=today.getMinutes(),
                      curr_sec=today.getSeconds();
                    curr_hour=checkTime(curr_hour);
                    curr_min=checkTime(curr_min);
                    curr_sec=checkTime(curr_sec);
                    document.getElementById('jam').innerHTML=curr_hour+":"+curr_min+":"+curr_sec;
                  }
                  function checkTime(i) {
                    if (i<10) i="0" + i;
                    return i;
                  }
                  setInterval(startTime, 500);
                </script>
              </a>
            </li>
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i>
                <span><?php echo $result['nama_guru']?></span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="../dist/img/user.png" class="img-circle" alt="User Image">
                  <p>
                    <?php echo $result['nama_guru']?> - Guru
                    <small><?php echo $result['nip']?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <a href="#" class="btn btn-default btn-flat">Keluar</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- Left sidebar -->
    <aside class="main-sidebar">
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="../dist/img/user.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $result['nama_guru']?></p>
            <a href="#"><?php echo $result['nip']?></a>
          </div>
        </div>
        <!-- Sidebar menu -->
        <ul class="sidebar-menu">
          <li class="header">MENU UTAMA</li>
          <li><a href="index.php"><i class="fa fa-circle-o"></i> Beranda</a></li>
          <li><a href="biodata.php"><i class="fa fa-circle-o"></i> Biodata</a></li>
          <li class="active"><a href="nilai.php"><i class="fa fa-circle-o"></i> Lihat Nilai</a></li>
          <li><a href="input.php"><i class="fa fa-circle-o"></i> Input Nilai</a></li>
        </ul>
      </section>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <!-- Content Header -->
      <div class="header-section">
        <i class="glyphicon glyphicon-education pull-right"></i>
        <h1>Lihat Nilai</h1>
      </div>
      <div class="bread-section">
        <a href="index.php">SIMAK </a><span>> </span><a href="nilai.php">Filter Nilai </a><span>> </span>Lihat Nilai
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <section class="col-lg-12">
            <!-- Biodata -->
            <div class="box box-solid box-danger">
              <div class="box-header">
                <i class="fa fa-user"></i>
                <h3 class="box-title">Lihat Nilai</h3>
              </div>
              <div class="box-body">
                Bikin tabel disini.
                <table class="table">
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
                        <th>Nama Siswa</th>

                  <?php
                        while($data3=mysqli_fetch_array($query5)){
                  ?>
                      
                          <th><?php echo "UH ", $uh++ ?></th> 

                  <?php
                        }
                      break;
                    }
                  ?>

                        <th>UTS</th>
                        <th>UAS</th>
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
                  <table class="table" >
                    <tr>

                      <td style="text-align: center">
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

                            <h4 style="color:red">Nilai UH belum di publish</h4>
                            <input hidden name="status_lihat" value="1">
                            <input class="btn btn-warning" type="submit" value="Publish UH" >

                  <?php
                          }else if($cekUH==1){
                  ?>
                            <h4 style="color:#64dd17">Nilai UH sudah di publish</h4>
                            <input hidden name="status_lihat" value="0">
                            <input class="btn btn-warning" type="submit" value="Unpublish UH" >

                  <?php
                          }else{
                  ?>

                            <h4 style="color:grey">Belum ada nilai UH</h4><br>

                  <?php
                          }
                  ?>

                        </form>
                      </td>
                      
                      <td style="text-align: center">
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

                            <h4 style="color:red">Nilai UTS belum di publish</h4>
                            <input hidden name="status_lihat" value="1">
                            <input class="btn btn-warning" type="submit" value="Publish UTS" >

                  <?php
                          }else if($cekUTS==1){
                  ?>

                            <h4 style="color:#64dd17">Nilai UTS sudah di publish</h4>
                            <input hidden name="status_lihat" value="0">
                            <input class="btn btn-warning" type="submit" value="Unpublish UTS" >

                  <?php
                          }else{
                  ?>

                            <h4 style="color:grey">Belum ada nilai UTS</h4><br>

                  <?php
                          }
                  ?>

                        </form>
                      </td>
                      
                      <td style="text-align: center">
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

                            <h4 style="color:red">Nilai UAS belum di publish</h4>
                            <input hidden name="status_lihat" value="1">
                            <input class="btn btn-warning" type="submit" value="Publish UAS" >

                  <?php
                          }else if($cekUAS==1){
                  ?>

                            <h4 style="color:#64dd17">Nilai UAS sudah di publish</h4>
                            <input hidden name="status_lihat" value="0">
                            <input class="btn btn-warning" type="submit" value="Unpublish UAS" >

                  <?php
                          }else{
                  ?>

                            <h4 style="color:grey">Belum ada nilai UAS</h4><br>

                  <?php
                          }
                  ?>
                        </form>
                      </td>
                    </tr>
                  </table>
              </div>
            </div>
          </section>
        </div>
      </section>
    </div>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b><a href="http://www.fonsvitae-1.sch.id/">SIMAK FV</a></b>
      </div>
      <strong>Copyright &copy; 2017 </strong>| All rights reserved.
    </footer>
  </div>

  <!-- JavaScript -->
  <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <script> $.widget.bridge('uibutton', $.ui.button); </script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="../plugins/fastclick/fastclick.js"></script>
  <script src="../dist/js/app.min.js"></script>
</body>
</html>
