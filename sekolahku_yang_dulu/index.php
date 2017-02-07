<!DOCTYPE html>
<html lang="en">
  <?php 
    include 'php/connect.php'; 

    if ($_SESSION['status'] != "nouser") {
      if ($_SESSION['status'] == "guru") {
        header('Location:guru/index.php');
      }
      else if ($_SESSION['status'] == "siswa") {
        header('Location:siswa/index.php');
      }
    }

  ?>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SMA Fons Vitae 1 Matsudirini | Jakarta Timur</title>
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background: url(img/bg-login.jpg)">
    <div class="container">
      <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4">
        <div class="form-login">
          <div class="gambaratas">
            <img src="img/logo.png">
          </div>
          <div class="judul-login">
            <h3 class="kiri roboto">Login <span>SIMAK</span></h3>
          </div>
          <div>
            <form class="form-horizontal" name="login" action="php/login.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="username" class="col-xs-3 col-md-2 control-label">
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </label>
                <div class="col-xs-9 col-md-10" style="padding-left: 0px;">
                  <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-xs-3 col-md-2 control-label">
                  <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                </label>
                <div class="col-xs-9 col-md-10" style="padding-left: 0px;">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12 btn-fons">
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>