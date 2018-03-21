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

// $bulan = ['01' => 'Januari',
// '02'=>'Februari',
// '03'=>'Maret',
// '04'=>'April',
// '05'=>'Mei',
// '06'=>'Juni',
// '07'=>'Juli',
// '08'=>'Agustus',
// '09'=>'September',
// '10'=>'Oktober',
// '11'=>'November',
// '12'=>'Desember',

// ];


// echo "<pre>"; var_dump($bulan);

$hari_ini = date('d');
$bulan_ini = date('F');
$tahun_ini = date('Y');
// echo "$hari_ini $bulan_ini $tahun_ini";


?>
<!DOCTYPE html>
<html>
<head>
	<title>Tugas Array</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.min.css">
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
			width: 900px;
			line-height: 500px;
			background-color: salmon;
		}
		.container h1{
			position: relative;
			top: 130px;
		}
	</style>
</head>
<body>

	<div class="container">
		<h1>{ Tugas Array PHP }</h1>
		<select class="select form-control col-md-1">
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

	
	<select class="select form-control col-md-2">
		<?php foreach ($bulan as $bln) { ?>
			<?php 
			if ($bulan_ini == $bln) { ?>
			<option value="<?= $bln; ?>" selected><?= $bln; ?></option>

			<?php }else{ ?>
			<option value="<?= $bln; ?>"><?= $bln; ?></option>
			<?php } ?>
		<?php } ?>
	</select> 



	<select class="select form-control col-md-2">
		<?php for ($i=2014; $i <= 2018 ; $i++) { ?>
			<?php if ($tahun_ini == $i) { ?>
				<option value="<?= $i; ?>" selected><?= $i; ?></option>
			<?php }else{ ?>
				<option value="<?= $i; ?>"><?= $i; ?></option>
			<?php } ?>
		<?php } ?>
	</select>

	</div>

	



</body>
</html>

