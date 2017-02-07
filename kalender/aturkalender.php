<!DOCTYPE html>
<?php 
    include 'connect.php';
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pengaturan Kalender Akademik</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<style type="text/css">
		.option-aqua { display:inline-block; background-color:#00c0ef; width:15px; height: 15px; border-radius: 3px;}
		.option-blue { display:inline-block; background-color:#0073b7; width:15px; height: 15px; border-radius: 3px;}
		.option-yellow { display:inline-block; background-color:#ffeb3b; width:15px; height: 15px; border-radius: 3px;}
		.option-orange { display:inline-block; background-color:#ff851b; width:15px; height: 15px; border-radius: 3px;}
		.option-red { display:inline-block; background-color:#dd4b39; width:15px; height: 15px; border-radius: 3px;}
		.option-lime { display:inline-block; background-color:#01ff70; width:15px; height: 15px; border-radius: 3px;}
		.option-green { display:inline-block; background-color:#00a65a; width:15px; height: 15px; border-radius: 3px;}
		.option-fuchsia { display:inline-block; background-color:#f012be; width:15px; height: 15px; border-radius: 3px;}
		.option-navy { display:inline-block; background-color:#001f3f; width:15px; height: 15px; border-radius: 3px;}
	</style>

  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  	<!--[if lt IE 9]>
  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->
</head>
<body>
	<form action="../addEvent.php" method="post">
		<table>
			<tr>
				<td>Nama Event</td>
				<td>:</td>
				<td><input type="text" name="nama_event" id="nama_event" required></td>
			</tr>
			<tr>
				<td>Mulai Event</td>
				<td>:</td>
				<td>
					<select name="mulai_event_tanggal" required>
						<option value="" disabled selected>Tanggal</option>
						<?php
							$count_dm = 1;
							while ($count_dm <= 31) {
								echo '
									<option value="'.$count_dm.'">'.$count_dm.'</option>
								';
								$count_dm++;
							}
						?>
					</select>
					<select name="mulai_event_bulan" required>
						<option value="" disabled selected>Bulan</option>
						<?php
							$count_mmd = 0;
							$count_mmv = 1;
							while ($count_mmd <= 11) {
								echo '
									<option value="'.$count_mmd.'">'.$count_mmv.'</option>
								';
								$count_mmd++;
								$count_mmv++;
							}
						?>
					</select>
					<select name="mulai_event_tahun" required>
						<option value="" disabled selected>Tahun</option>
						<?php
							$current_year = date('Y');
							$count_yma = $current_year - 5;
							$count_ymb = $current_year + 5;
							while ($count_yma <= $count_ymb) {
								echo '
									<option value="'.$count_yma.'">'.$count_yma.'</option>
								';
								$count_yma++;
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Akhir Event</td>
				<td>:</td>
				<td>
					<select name="akhir_event_tanggal" required>
						<option value="" disabled selected>Tanggal</option>
						<?php
							$count_da = 1;
							while ($count_da <= 31) {
								echo '
									<option value="'.$count_da.'">'.$count_da.'</option>
								';
								$count_da++;
							}
						?>
					</select>
					<select name="akhir_event_bulan" required>
						<option value="" disabled selected>Bulan</option>
						<?php
							$count_mad = 0;
							$count_mav = 1;
							while ($count_mad <= 11) {
								echo '
									<option value="'.$count_mad.'">'.$count_mav.'</option>
								';
								$count_mad++;
								$count_mav++;
							}
						?>
					</select>
					<select name="akhir_event_tahun" required>
						<option value="" disabled selected>Tahun</option>
						<?php
							$current_year = date('Y');
							$count_yaa = $current_year - 5;
							$count_yab = $current_year + 5;
							while ($count_yaa <= $count_yab) {
								echo '
									<option value="'.$count_yaa.'">'.$count_yaa.'</option>
								';
								$count_yaa++;
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td valign="top">Warna Event</td>
				<td valign="top">:</td>
				<td>
					<input type="radio" name="warna_event" value="#00c0ef"> <div class="option-aqua"></div> Aqua<br>
					<input type="radio" name="warna_event" value="#0073b7"> <div class="option-blue"></div> Blue<br>
					<input type="radio" name="warna_event" value="#ffeb3b"> <div class="option-yellow"></div> Yellow<br>
					<input type="radio" name="warna_event" value="#ff851b"> <div class="option-orange"></div> Orange<br>
					<input type="radio" name="warna_event" value="#dd4b39"> <div class="option-red"></div> Red<br>
					<input type="radio" name="warna_event" value="#01ff70"> <div class="option-lime"></div> Lime<br>
					<input type="radio" name="warna_event" value="#00a65a"> <div class="option-green"></div> Green<br>
					<input type="radio" name="warna_event" value="#f012be"> <div class="option-fuchsia"></div> Fuchsia<br>
					<input type="radio" name="warna_event" value="#001f3f"> <div class="option-navy"></div> Navy<br>
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center"><button type="submit">Tambah Event</button></td>
			</tr>
		</table>
	</form>

	<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>