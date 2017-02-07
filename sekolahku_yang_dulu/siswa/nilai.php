<!DOCTYPE html>
<html lang="en">
  <?php 
    include '../php/connect.php'; 

    if ($_SESSION['status'] != "siswa") {
      if ($_SESSION['status'] == "guru") {
        header('Location:../guru/index.php');
      }
      else {
        header('Location:../index.php');
      }
    }

    $id = $_SESSION['id'];
    $query = mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa = '$id'");
    $result = mysqli_fetch_array($query);
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
            <li><a><?php echo strtoupper($result['nama_siswa']); ?></a></li>
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
            <p class="tebel roboto"><?php echo $result['nis']; ?></p>
            <p class="tebel roboto"><?php echo $result['nama_siswa']; ?></p>
            <!-- <p class="roboto">Ilmu Komputer</p> -->
          </div>
        </div>
        <div class="menukiri">
          <ul>
            <a href="index.php"><li>Beranda</li></a>
            <!-- <a href="biodata.php"><li>Biodata</li></a> -->
            <a href="#"><li style="border-right: 3px solid #D52C25; border-radius: 5px;"><strong>Nilai</strong></li></a>
            <a href="../php/logout.php"><li>Logout</li></a>
          </ul>
        </div>
      </div>
      <div id="main-content">
        <div class="judulpage">
          <div class="glyphatas"><i class="glyphicon glyphicon-education"></i></div>
          <h2 class="roboto">Rekapitulasi Studi</h2>
        </div>
        <div class="remahroti">
          <p><a class="roboto" href="index.php">Beranda</a> > Nilai</p>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-9 maindata">
          <!-- <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#S1">Semester 1</a></li>
            <li><a data-toggle="tab" href="#S2">Semester 2</a></li>
            <li><a data-toggle="tab" href="#S3">Semester 3</a></li>
            <li><a data-toggle="tab" href="#S4">Semester 4</a></li>
            <li><a data-toggle="tab" href="#S5">Semester 5</a></li>
            <li><a data-toggle="tab" href="#S6">Semester 6</a></li>
          </ul>
          <div class="tab-content">
            <div id="S1" class="tab-pane fade in active">
              <h3>HOME</h3>
              <p>Some content.</p>
            </div>
            <div id="S2" class="tab-pane fade">
              <h3>Menu 1</h3>
              <p>Some content in menu 1.</p>
            </div>
            <div id="S3" class="tab-pane fade">
              <h3>Menu 2</h3>
              <p>Some content in menu 2.</p>
            </div>
          </div> -->
          <?php for ($semester=1;$semester<=6;$semester++){ ?>
            <div class="semester">
              <h4 class="roboto">Semester <?php echo $semester;?></h4>
            </div>
            <?php 
              $query1 = mysqli_query($conn,"SELECT * FROM ambil_siswa WHERE id_siswa = '$id'");
              while($data1=mysqli_Fetch_array($query1)){
                $id_a_s = $data1['id_ambil_siswa'];
                $id_mp = $data1['id_mapel'];
                $query7 = mysqli_query($conn,"SELECT * FROM mapel WHERE id_mapel = '$id_mp'");
                $data7 = mysqli_fetch_array($query7);
                $query2 = mysqli_query($conn,"SELECT * FROM ajar WHERE id_ambil_siswa = '$id_a_s' AND semester = '$semester'");
                while($data2 = mysqli_fetch_array($query2)){
                  $id_aj = $data2['id_ajar'];
                  $counter=0;
            ?>
            <table class="table table-bordered" style="text-align: center;">
              <tbody>
                <tr>
                  <td rowspan="2"><?php echo $data7['nama_mapel']; ?></td>
                  <?php
                    $query3 = mysqli_query($conn,"SELECT * FROM nilai_uh WHERE id_ajar = '$id_aj' AND status_lihat = '1'");
                    while($data3 = mysqli_fetch_array($query3)){
                      $counter = $counter +1;
                      ?>
                      <td>UH <?php echo $counter ?></td>
                      <?php 
                    } 
                  ?>
                  <?php 
                    $query8 = mysqli_query($conn,"SELECT * FROM nilai_uts WHERE id_ajar='$id_aj'");
                    if(mysqli_num_rows($query8)>0){
                      ?>
                      <td>UTS</td>
                      <?php 
                    } 
                  ?>
                  <?php 
                    $query9 = mysqli_query($conn,"SELECT * FROM nilai_uas WHERE id_ajar='$id_aj'");
                    if(mysqli_num_rows($query9)>0){
                      ?>
                      <td>UAS</td>
                      <?php 
                    } 
                  ?>
                </tr>
                <tr>
                  <?php
                    $query5 = mysqli_query($conn,"SELECT * FROM nilai_uh WHERE id_ajar = '$id_aj' AND status_lihat = '1'");
                    while($data5 = mysqli_fetch_array($query5)){
                      ?>
                      <td><?php echo $data5['nilai'];?></td>
                      <?php 
                    }
                  ?>
                  <td>
                    <?php 
                      $query4 = mysqli_query($conn,"SELECT * FROM nilai_uts WHERE id_ajar = '$id_aj'");
                      $data4 = mysqli_fetch_array($query4);
                      echo $data4['nilai'];
                    ?>  
                  </td>
                  <td>
                    <?php 
                      $query6 = mysqli_query($conn,"SELECT * FROM nilai_uas WHERE id_ajar = '$id_aj'");
                      $data6 = mysqli_fetch_array($query6);
                      echo $data6['nilai'];
                    ?>
                  </td>
                </tr>
              </tbody>
            </table>
            <?php
          }
        }
      }

      ?>

      
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