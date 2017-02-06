<?php
	include 'connect.php';
?>
<!DOCTYPE html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin - Daftar Guru</title>

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
				<li class="active">Daftar Guru</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Daftar Guru     <a href="tambahguru.php">+</a></h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-24 col-lg-12">
				<table class="table">
					<thead>
						<td>No</td>
						<td>Id</td>
						<td>Nama</td>
						<td>NIP</td>
						<td>Password</td>
						<td>Status Wali Kelas</td>
						<td>Status Penilaian Sikap</td>
					</thead>
					<?php 
						$no=1;
						$query=mysqli_query($connect,"SELECT * FROM guru");
						while ($data = mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $no;$no++;?></td>
						<td><?php echo $data['id_guru'];?></td>
						<td><?php echo $data['nama_guru'];?></td>
						<td><?php echo $data['nip'];?></td>
						<td><?php echo $data['password'];?></td>
						<td><?php 
							if ($data['status_wali']==1) 
								echo "V";
							else 
								echo "X";

						 ?></td>
						<td><?php 
							if ($data['status_sikap']==1) 
								echo "V";
							else 
								echo "X";

						 ?></td>
					</tr>
					<?php }?>
				</table>

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
