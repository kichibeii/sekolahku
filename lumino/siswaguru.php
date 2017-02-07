<?php
	include 'connect.php';
?>
<!DOCTYPE html>

<head>
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","requestguru.php?q="+str,true);
  xmlhttp.send();
}
</script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin - Daftar Kelas</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<?php 
		include 'navbar.php';
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Siswa - Guru</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Siswa - Guru</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-24 col-lg-12">
				<form action="prosessiswaguru.php" method="post"> 
				<table class="table">
					<thead>
						<td>Kelas</td>
						<td>Mata Pelajaran</td>
						<td>Guru</td>
					</thead>
					<tr>
						<td>
							<select name = "kelas">
							<?php 
								$query=mysqli_query($connect,"SELECT * FROM kelas");
								while ($data=mysqli_fetch_array($query)){
									?>
								<option value="<?php echo $data['id_kelas'];?>"><?php echo $data['nama_kelas']; ?></option>		
							<?php
								}
							?>
							</select>
						</td>
						<td>
							<select name = "mapel">
							<?php 
								$query2=mysqli_query($connect,"SELECT * FROM mapel");
								while ($data2=mysqli_fetch_array($query2)){
									?>
								<option value="<?php echo $data2['id_mapel'];?>"><?php echo $data2['nama_mapel']; ?></option>		
							<?php
								}
							?>
							</select></td>
						<td>
							<select name="guru">
							<?php 
								$query3=mysqli_query($connect,"SELECT * FROM guru");
								while($data3=mysqli_fetch_array($query3)){
							?>
								<option value="<?php echo $data3['id_guru'];?>"><?php echo $data3['nama_guru'];?></option>
							<?php
								}
							?>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><input type="submit" values="Submit"></td>
					</tr>
				</table>
				</form>
			</div>
		
		</div><!--/.row-->

	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
