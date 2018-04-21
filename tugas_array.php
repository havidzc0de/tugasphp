<?php 

$bulan = ['Januari',
'Februari',
'Maret',
'April',
'Mei',
'Juni',
'Juli',
'Augustus',
'September',
'Oktober',
'November',
'Desember',

];



$hari_ini = date('d');
$bulan_ini = date('n');
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
	.container{
		margin-top: 150px;
		text-align: center;
		width: 400px;
		height: 300px;
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

				<?php for ($i=1; $i <= 31 ; $i++) { 
					echo $hari_ini == $i ? "<option value='$i' selected>$i</option>" : "<option value='$i'>$i</option>" ;
				} ?>

			</select>			
			<select>

				<!-- <?php foreach ($bulan as $bln) {
					echo $bulan_ini == $bln ? "<option value='$bln' selected>$bln</option>" : "<option value='$bln'>$bln</option>";
				} ?> -->

				<?php foreach ($bulan as $key => $value) {
					echo $bulan_ini == $key+1 ? "<option value='$value' selected>$value</option>" : "<option value='$value'>$value</option>";
				} ?>

			</select> 
			<select>
				<?php for ($i=2014; $i <= 2018 ; $i++) { 
					echo $tahun_ini == $i ? "<option value='$i' selected>$i</option>" : "<option value='$i'>$i</option>";
				} ?>
			</select>
		</div>
	</div>
</body>
</html>

