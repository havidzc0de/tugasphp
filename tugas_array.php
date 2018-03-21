<?php 

$bulan = ['January',
'February',
'March',
'April',
'May',
'June',
'July',
'August',
'September',
'October',
'November',
'December',

];



$hari_ini = date('d');
$bulan_ini = date('F');
$tahun_ini = date('Y');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Tugas Array</title>

	<style type="text/css">
		*{
			margin: 0 auto;
		}
		body{
			font-family: sans-serif;
			background-color: skyblue;
		}
		.select{
			display: inline;
		}
		.container{
			text-align: center;
			width: 400px;
			height: 400px;
			background-color: salmon;
		}
		.container h1{
			position: relative;
			top: 10px;
			margin-bottom: 30px;
			position: relative;
			top: 100px;
		}
		.isi{
			line-height: 300px;
		}
	</style>
</head>
<body>

	<div class="container">
		<h1>{ Tugas Array PHP }</h1>
		<div class="isi">
			<select>
		<?php 
		for ($i=1; $i < 31; $i++) { ?>
		<?php 
		if ($hari_ini == $i) { ?>

		<option value="<?= $i; ?>" selected><?= $i; ?></option>

		<?php }else{ ?>
		<option value="<?= $i; ?>"><?= $i; ?></option>
		<?php } ?>
		<?php } ?>
	</select>

	
	<select>
		<?php foreach ($bulan as $bln) { ?>
			<?php 
			if ($bulan_ini == $bln) { ?>
			<option value="<?= $bln; ?>" selected><?= $bln; ?></option>

			<?php }else{ ?>
			<option value="<?= $bln; ?>"><?= $bln; ?></option>
			<?php } ?>
		<?php } ?>
	</select> 



	<select>
		<?php for ($i=2014; $i <= 2018 ; $i++) { ?>
			<?php if ($tahun_ini == $i) { ?>
				<option value="<?= $i; ?>" selected><?= $i; ?></option>
			<?php }else{ ?>
				<option value="<?= $i; ?>"><?= $i; ?></option>
			<?php } ?>
		<?php } ?>
	</select>
		</div>

	</div>

	



</body>
</html>

