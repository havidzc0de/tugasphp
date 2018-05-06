<?php 


if (isset($_GET['act'])=="edit") {
	$sql =  "SELECT * FROM products WHERE id=".$_GET["id"];
	$query = $koneksi->prepare($sql);
	$query->execute();
	$result = $query->fetchAll(PDO::FETCH_OBJ);
	$id = $result[0]->id;
	$kode_barang = $result[0]->kode_barang;
	$nama_barang = $result[0]->nama_barang;
	$harga_jual = $result[0]->harga_jual;
	$harga_beli = $result[0]->harga_beli;
	$kategori = $result[0]->kategori;

}else{
	$id = "";
}

?>


<!DOCTYPE html>
<html> 
<head>
	<title>Add Product</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<form method="POST">
			<div class="form-group row">
				<label for="kode_barang" class="col-sm-2 col-form-label col-form-label-sm">Kode Barang</label>
				<div class="col-sm-8">
					<input name="kode_barang" type="text" class="form-control form-control-sm" id="kode_barang" placeholder="Kode Barang" required="required" value="<?= $kode_barang; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="nama_barang" class="col-sm-2 col-form-label col-form-label-sm">Nama Barang</label>
				<div class="col-sm-8">
					<input name="nama_barang" type="text" class="form-control form-control-sm" id="nama_barang" placeholder="Nama Barang" value="<?= $nama_barang; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="harga_jual" class="col-sm-2 col-form-label col-form-label-sm">Kategori</label>
				<div class="col-sm-8">
					<select name="kategori" class="form-control">
						<?php 

						$sql = "SELECT * FROM kategori";
						$result = $koneksi->prepare($sql);
						$result->execute();
						while ($row = $result->fetch(PDO::FETCH_OBJ)) {
							echo "<option value='$row->kategori'>$row->kategori</option>";
						}

						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="harga_beli" class="col-sm-2 col-form-label col-form-label-sm">Harga Beli</label>
				<div class="col-sm-8">
					<input name="harga_beli" type="text" class="form-control form-control-sm" id="harga_beli" placeholder="Harga Beli" value="<?= $harga_beli; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="harga_jual" class="col-sm-2 col-form-label col-form-label-sm">Harga Jual</label>
				<div class="col-sm-8">
					<input name="harga_jual" type="text" class="form-control form-control-sm" id="harga_jual" placeholder="Harga Jual" value="<?= $harga_jual; ?>">
				</div>
			</div>

			<div class="col-auto">
				<button name="submit" type="submit" class="btn btn-primary mb-2">Submit</button>
			</div>
		</form>
	</div>
</body>
</html>

<?php 

if (isset($_POST['submit'])) {
	$kode_barang = $_POST['kode_barang'];
	$nama_barang = $_POST['nama_barang'];
	$kategori = $_POST['kategori'];
	$harga_beli = $_POST['harga_beli'];
	$harga_jual = $_POST['harga_jual'];


	if (empty($kode_barang)) {
		echo "Kode Barang Tidak Boleh Kosong";
		exit();
	}elseif (empty($nama_barang)) {
		echo "Nama Barang Tidak Boleh Kosong";
		exit();
	}elseif (empty($kategori)) {
		echo "Kategori Tidak Boleh Kosong";
		exit();
	}elseif (empty($harga_beli)) {
		echo "Harga Beli Tidak Boleh Kosong";
		exit();
	}elseif (empty($harga_jual)) {
		echo "harga Jual Tidak Boleh Kosong";
		exit();
	}else{

		try{
			if (isset($_GET['act'])=="edit") {
				$sql = "UPDATE products SET kode_barang='$kode_barang',nama_barang='$nama_barang',kategori='$kategori',harga_jual='$harga_jual',harga_beli='$harga_beli' WHERE id=$id";

			}else
			$sql = "INSERT INTO products(kode_barang,nama_barang,kategori,harga_beli,harga_jual)VALUES('$kode_barang','$nama_barang','$kategori',$harga_jual,$harga_jual)";

			if ($koneksi->query($sql)) {
				echo "<script type= 'text/javascript'>alert('Save data Successfully');
				window.location.replace('index.php?pages=add_product');
				</script>";
			}else{
				echo "<script type= 'text/javascript'>alert('Data not successfully save data.');</script>";
			}
			$conn = null;
		}catch(PDOException $a){
			echo "Error : ".$a->getMessage();
		}
	}
}


?>