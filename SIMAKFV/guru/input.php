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
          <li><a href="nilai.php"><i class="fa fa-circle-o"></i> Lihat Nilai</a></li>
          <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Input Nilai</a></li>
        </ul>
      </section>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <!-- Content Header -->
      <div class="header-section">
        <i class="glyphicon glyphicon-education pull-right"></i>
        <h1>Filter Kelas</h1>
      </div>
      <div class="bread-section">
        <a href="index.php">SIMAK </a><span>> </span>Filter Kelas
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <section class="col-lg-12">
            <!-- Biodata -->
            <div class="box box-solid box-danger">
              <div class="box-header">
                <i class="fa fa-user"></i>
                <h3 class="box-title">Filter Kelas</h3>
              </div>
              <div class="box-body">
                Bikin form disini.
                <form method="POST" action="inputnilai.php">
                  Mata Pelajaran : 
                  <select name="id_ag">
                <?php
                  $query1=mysqli_query($connect, "SELECT * FROM ambil_guru WHERE id_guru='$id_guru'");
                  while($data1=mysqli_fetch_array($query1)){
                    $id_mapel=$data1['id_mapel'];
                    $query2=mysqli_query($connect, "SELECT * FROM mapel WHERE id_mapel='$id_mapel'");
                    $data2=mysqli_fetch_array($query2);
                ?>

                    <option value="<?php echo $data1['id_ambil_guru'] ?>"><?php echo $data2['nama_mapel'] ?></option>

                <?php
                  }
                ?>
                  </select>
                  <br>
                  <br>
                  &ensp;&emsp;&ensp;&emsp;&ensp;&nbsp; Kelas : 
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
                  <br>
                  &emsp;&emsp;&emsp;&emsp;&nbsp;Jenis : 
                  <select name="jenis">
                    <option value="H">Ujian Harian</option>
                    <option value="T">Ujian Tengah Semester</option>
                    <option value="A">Ujian Akhir Semester</option>
                  </select>

                  <input hidden name="id_mapel" value="<?php echo $id_mapel ?>">  
                  <br>
                  <input type="submit" value="NEXT">
                </form>
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
