<?php
	include 'connect.php';
?>
<!DOCTYPE html>

<head>
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
				<li class="active">Kelas</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Kelas</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-24 col-lg-12">
				<form action="prosesubahwalikelas.php" method = "post">
				<table class="table">
					<thead>
						<td>Nama Kelas</td>
						<td>Wali Kelas</td>
					</thead>
					<?php 
						$angka=0;
						$query=mysqli_query($connect,"SELECT * FROM kelas");
						while ($data = mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $data['nama_kelas'];?></td>
						<td>
							<select name  = "id_guru<?php echo $angka; $angka=$angka+1;?>">
								<?php
									$query2=mysqli_query($connect,"SELECT * FROM guru");
									while ($data2=mysqli_fetch_array($query2)){
								?>
									<option value="<?php echo $data2['id_guru']; ?>"><?php echo $data2['nama_guru'];?></option>
								<?php
									}
								?>

							</select>
						</td>
					</tr>
					<?php }?>
				</table>
					<input type="submit" value="ubah">
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
