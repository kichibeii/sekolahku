<?php
	include 'connect.php';
?>
<!DOCTYPE html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin - Mata Pelajara</title>

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
				<li class="active">Mata Pelajaran</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Mata Pelajaran <a href="tambahmatpel.php"> +</a></h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-24 col-lg-12">
				<table class="table">
					<thead>
						<td>No</td>
						<td >Id Mata Pelakaran</td>
						<td >Nama Mata Pelajaran</td>
						<td>Guru</td>
						<td>Tambah Guru</td>
					</thead>
					<?php 
						$no=1;
						$query=mysqli_query($connect,"SELECT * FROM mapel");
						while ($data = mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $no;$no++;?></td>
						<td><?php $id_mapel=$data['id_mapel'];echo $id_mapel;?></td>
						<td><?php echo $data['nama_mapel'];?></td>
						<td>
						<?php
							$query2=mysqli_query($connect,"SELECT * FROM ambil_guru WHERE id_mapel = '$id_mapel'");
							while ($data2=mysqli_fetch_array($query2)){
								$id_guru = $data2['id_guru'];
							$query3=mysqli_query($connect,"SELECT * FROM guru WHERE id_guru ='$id_guru'");
							$data3=mysqli_fetch_array($query3);
							
							echo $data3['nama_guru']."<br>";
					
						
							}

						?>
						</td>
						<td><a href="tambahguru_matpel.php?kirim_id=<?php echo $id_mapel;?>">Tambah</a></td>
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
