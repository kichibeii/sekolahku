<!DOCTYPE html>
<?php 
    include 'connect.php';
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
  <link rel="stylesheet" href="../plugins/fullcalendar/fullcalendar.css">
  <link rel="stylesheet" href="../plugins/fullcalendar/fullcalendar.print.css" media="print">
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
                <span>Wawan Setyadi</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="../dist/img/user.png" class="img-circle" alt="User Image">
                  <p>
                    Wawan Setyadi - Siswa
                    <small>Angkatan</small>
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
            <p>Wawan Setyadi</p>
            <a href="#">NIS</a>
          </div>
        </div>
        <!-- Sidebar menu -->
        <ul class="sidebar-menu">
          <li class="header">MENU UTAMA</li>
          <li><a href="index.php"><i class="fa fa-circle-o"></i> Beranda</a></li>
          <li><a href="biodata.php"><i class="fa fa-circle-o"></i> Biodata</a></li>
          <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Lihat Nilai</a></li>
          <li><a href="rekap.php"><i class="fa fa-circle-o"></i> Rekapitulasi Studi</a></li>
        </ul>
      </section>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <!-- Content Header -->
      <div class="header-section">
        <i class="glyphicon glyphicon-education pull-right"></i>
        <h1>Kalender Akademik</h1>
      </div>
      <div class="bread-section">
        <a href="index.php">SIMAK </a><span>> </span>Kalender Akademik
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <section class="col-lg-12">
            <!-- Biodata -->
            <div class="box box-danger">
              <div class="box-body">
                <div id="calendar"></div>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="../plugins/fullcalendar/fullcalendar.js"></script>
  <!-- Page specific script -->
  <script>
    $(function () {

      /* initialize the external events
       -----------------------------------------------------------------*/
      function ini_events(ele) {
        ele.each(function () {

          // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
          // it doesn't need to have a start or end
          var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
          };

          // store the Event Object in the DOM element so we can get to it later
          $(this).data('eventObject', eventObject);

          // make the event draggable using jQuery UI
          $(this).draggable({
            zIndex: 1070,
            revert: true, // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
          });

        });
      }

      ini_events($('#external-events div.external-event'));

      /* initialize the calendar
       -----------------------------------------------------------------*/
      //Date for the calendar events (dummy data)
      var date = new Date();
      var d = date.getDate(),
          m = date.getMonth(),
          y = date.getFullYear();
      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next',
          center: 'title',
          right: ''
        },
        buttonText: {
          today: 'today',
          month: 'month',
          week: 'week',
          day: 'day'
        },
        //Random default events
        events: [
          <?php
            $ambil_event = mysqli_query($conn, "SELECT * FROM kalender");
            while ($event = mysqli_fetch_array($ambil_event)) {
              list($d1, $m1, $y1) = explode("/", $event['mulai_event']);
              list($d2, $m2, $y2) = explode("/", $event['akhir_event']);
              echo '{
                title: "'.$event['nama_event'].'",
                start: new Date('.$y1.', '.$m1.', '.$d1.'),
                end: new Date('.$y2.', '.$m2.', '.$d2.'),
                backgroundColor: "'.$event['warna_event'].'",
                borderColor: "'.$event['warna_event'].'"
              },';
            }
          ?>
        ],
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function (date, allDay) { // this function is called when something is dropped

          // retrieve the dropped element's stored Event Object
          var originalEventObject = $(this).data('eventObject');

          // we need to copy it, so that multiple events don't have a reference to the same object
          var copiedEventObject = $.extend({}, originalEventObject);

          // assign it the date that was reported
          copiedEventObject.start = date;
          copiedEventObject.allDay = allDay;
          copiedEventObject.backgroundColor = $(this).css("background-color");
          copiedEventObject.borderColor = $(this).css("border-color");

          // render the event on the calendar
          // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
          $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

          // is the "remove after drop" checkbox checked?
          if ($('#drop-remove').is(':checked')) {
            // if so, remove the element from the "Draggable Events" list
            $(this).remove();
          }

        }
      });

      /* ADDING EVENTS */
      var currColor = "#3c8dbc"; //Red by default
      //Color chooser button
      var colorChooser = $("#color-chooser-btn");
      $("#color-chooser > li > a").click(function (e) {
        e.preventDefault();
        //Save color
        currColor = $(this).css("color");
        //Add color effect to button
        $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
      });
      $("#add-new-event").click(function (e) {
        e.preventDefault();
        //Get value and make sure it is not null
        var val = $("#new-event").val();
        if (val.length == 0) {
          return;
        }

        //Create events
        var event = $("<div />");
        event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
        event.html(val);
        $('#external-events').prepend(event);

        //Add draggable funtionality
        ini_events(event);

        //Remove event from text input
        $("#new-event").val("");
      });
    });
  </script>
</body>
</html>
