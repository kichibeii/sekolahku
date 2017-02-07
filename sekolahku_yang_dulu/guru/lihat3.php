<!DOCTYPE html>
<html lang="en">
  <?php 
    include '../php/connect.php'; 

    if ($_SESSION['status'] != "guru") {
      if ($_SESSION['status'] == "siswa") {
        header('Location:../siswa/index.php');
      }
      else {
        header('Location:../index.php');
      }
    }

    $id = $_SESSION['id'];
    $query = mysqli_query($conn, "SELECT * FROM guru WHERE id_guru = '$id'");
    $result = mysqli_fetch_array($query);
    $id_guru=$_SESSION['id'];
    $semester=$_POST['semester'];
    $id_kelas=$_POST['id_kelas'];
    $id_mapel=$_POST['id_mapel'];
    $ta=$_POST['tahunajaran'];
    $id_ag=$_POST['id_ag'];
    $uh=1;


  ?>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SMA Fons Vitae 1 Matsudirini | Jakarta Timur</title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png"/>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="main-header">
      <div class="row">
        <div class="col-xs-12 col-md-2 header-brand">
          <img src="../img/logo.png">
          <span class="roboto"> SMA Fons Vitae 1 </span>
        </div>
        <div class="col-xs-12 col-md-10">
          <a href="#" id="side-toggle"><i class="fa fa-bars"></i></a>
          <a href="#" class="nama-user">WAWAN SETYADI</a>
          <ul class="nav navbar-nav navbar-right">
            <li>
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
            <li>
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
            <li><a><?php echo strtoupper($result['nama_guru']); ?></a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="utama">
      <div id="main-sidebar">
        <div class="profil">
          <div class="col-xs-3">
            <img src="../img/user.png">
          </div>
          <div class="col-xs-9">
            <p class="tebel roboto"><?php echo $result['nip']; ?></p>
            <p class="tebel roboto"><?php echo $result['nama_guru']; ?></p>
            <!-- <p class="roboto">Ilmu Komputer</p> -->
          </div>
        </div>
        <div class="menukiri">
          <ul>
            <a href="index.php"><li>Beranda</li></a>
            <a href="#"><li>Lihat Nilai</li></a>
            <a href="input.php"><li>Input Nilai</li></a>
            <a href="sikap.php"><li>Input Sikap</li></a>
            <a href="../php/logout.php"><li>Logout</li></a>
          </ul>
        </div>
      </div>
      <div id="main-content">
        <div class="judulpage">
          <div class="glyphatas"><i class="glyphicon glyphicon-education"></i></div>
          <h2 class="roboto">Lihat Nilai</h2>
        </div>
        <div class="remahroti">
          <p><a class="roboto" href="index.php">Beranda</a> > Lihat Nilai</p>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-9 maindata">
          <table>
          <?php
            $query1=mysqli_query($conn, "SELECT * FROM ambil_kelas WHERE id_kelas='$id_kelas' AND id_ambil_guru='$id_ag'");
            while($data1=mysqli_fetch_array($query1)){
              $id_siswa=$data1['id_siswa'];
              

              $query2=mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa='$id_siswa'");
              $data2=mysqli_fetch_array($query2);

              $query3=mysqli_query($conn, "SELECT * FROM ambil_siswa WHERE id_siswa='$id_siswa' AND id_mapel='$id_mapel' AND status='0'");
              $data3=mysqli_fetch_array($query3);

              $id_as=$data3['id_ambil_siswa'];
              
              $query4=mysqli_query($conn, "SELECT * FROM ajar WHERE id_ambil_siswa = '$id_as' AND id_ambil_guru='$id_ag' AND semester ='$semester'");
              $data4=mysqli_fetch_array($query4);
              $id_ajar=$data4['id_ajar'];

              $query5=mysqli_query($conn, "SELECT * FROM nilai_uh WHERE id_ajar='$id_ajar'");
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
            $query1=mysqli_query($conn, "SELECT * FROM ambil_kelas WHERE id_kelas='$id_kelas' AND id_ambil_guru='$id_ag'");
            while($data1=mysqli_fetch_array($query1)){
              $id_siswa=$data1['id_siswa'];
              

              $query2=mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa='$id_siswa'");
              $data2=mysqli_fetch_array($query2);

              $query3=mysqli_query($conn, "SELECT * FROM ambil_siswa WHERE id_siswa='$id_siswa' AND id_mapel='$id_mapel' AND status='0'");
              $data3=mysqli_fetch_array($query3);

              $id_as=$data3['id_ambil_siswa'];
              

              $query4=mysqli_query($conn, "SELECT * FROM ajar WHERE id_ambil_siswa = '$id_as' AND id_ambil_guru='$id_ag' AND semester ='$semester'");
              $data4=mysqli_fetch_array($query4);
              $id_ajar=$data4['id_ajar'];


              $query5=mysqli_query($conn, "SELECT * FROM nilai_uh WHERE id_ajar='$id_ajar'");

              $query6=mysqli_query($conn, "SELECT * FROM nilai_uts WHERE id_ajar='$id_ajar'");
              $data6=mysqli_fetch_array($query6);

              $query7=mysqli_query($conn, "SELECT * FROM nilai_uas WHERE id_ajar='$id_ajar'");
              $data7=mysqli_fetch_array($query7);
          ?>
              <tr>
                <td><?php echo $data2['nama_siswa'] ?></td>
          <?php
              while($data5=mysqli_fetch_array($query5)){
          ?>
              
                <td><?php echo $data5['nilai'] ?></td>  
          <?php
              }
          ?>
                <td><?php echo $data6['nilai_uts'] ?></td>
                <td><?php echo $data7['nilai_uas'] ?></td>
              </tr>
          

          <?php
            }
          ?>
          </table>
          <br>
          <table>
          <tr>
          <td>
          <form method="POST" action="publishuhproses.php">
            <input hidden name="semester" value="<?php echo $semester ?>">
            <input hidden name="id_kelas" value="<?php echo $id_kelas ?>">
            <input hidden name="id_mapel" value="<?php echo $id_mapel ?>">
            <input hidden name="tahunajaran" value="<?php echo $ta ?>">
            <input hidden name="id_ag" value="<?php echo $id_ag ?>">
            <input type="submit" value="Publish UH">
          </form>
          </td>
          <td>
          <form method="POST" action="publishutsproses.php">
            <input hidden name="semester" value="<?php echo $semester ?>">
            <input hidden name="id_kelas" value="<?php echo $id_kelas ?>">
            <input hidden name="id_mapel" value="<?php echo $id_mapel ?>">
            <input hidden name="tahunajaran" value="<?php echo $ta ?>">
            <input hidden name="id_ag" value="<?php echo $id_ag ?>">
            <input type="submit" value="Publish UTS">
          </form>
          </td>
          <td>
          <form method="POST" action="publishuasproses.php">
            <input hidden name="semester" value="<?php echo $semester ?>">
            <input hidden name="id_kelas" value="<?php echo $id_kelas ?>">
            <input hidden name="id_mapel" value="<?php echo $id_mapel ?>">
            <input hidden name="tahunajaran" value="<?php echo $ta ?>">
            <input hidden name="id_ag" value="<?php echo $id_ag ?>">
            <input type="submit" value="Publish UAS">
          </form>
          </td>
          </tr>
          </table>
        </div>
      </div>
    </div>

    <script src="../js/jquery-2.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
    <script type="text/javascript">
      $(window).on('load', function(){
        var toggle = false;
        $('#side-toggle').click(function() {
          toggle = !toggle;
          if(toggle){
            $('#main-content').animate({left: 0});
          }
          else{
            $('#main-content').animate({left: 215});
          }
        });
      });
    </script>
  </body>
</html>