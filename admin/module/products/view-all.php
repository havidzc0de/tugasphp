
<!DOCTYPE html>
<html>
<head>
	<title>List Products</title>
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <table class="table">
    <thead class="thead-dark">
      <tr>
        <form method="POST">
          <div class="form-group row">
            <label for="harga_jual" class="col-sm-2 col-form-label col-form-label-sm">Kategori</label>
            <div class="col-sm-6">
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
            <div class="col-sm-1">
             <button name="pilih" class="
             form-control" type="submit">GO!</button>
           </div>
         </div>
       </div>
     </form>
   </tr>
   <tr>
    <th scope="col">Nomor</th>
    <th scope="col">Kode Barang</th>
    <th scope="col">Nama Barang</th>
    <th scope="col">Kategori</th>
    <th scope="col">Harga Beli</th>
    <th scope="col">Harga Jual</th>
    <th scope="col">Opsi</th>
  </tr>
</thead>
<tbody>
  <?php 

  try{
    if (isset($_POST["pilih"])) {
      $pilih = $_POST["kategori"];

       $sql = "SELECT * FROM products WHERE kategori
       ='$pilih' ORDER BY id ASC";
    $data = $koneksi->prepare($sql);
    $data->execute();
  // $result = $data->fetch(PDO::FETCH_OBJ);

    $nomor = 1;
    while ($result = $data->fetch(PDO::FETCH_OBJ)){ 

      $link_del = "index.php?pages=list_product&act=delete&id=$result->id";
      $link_edit = "index.php?pages=add_product&act=edit&id=$result->id";

      echo "<tr>

      <th scope='row'>". $nomor++ ."</th>
      <td> $result->kode_barang </td>
      <td> $result->nama_barang </td>
      <td> $result->kategori </td>
      <td> $result->harga_beli </td>
      <td> $result->harga_jual </td>
      <td>
      <a href='$link_edit' title='link_edit'><i class='fa fa-pencil-square-o'></i></a> &nbsp
      <a href='$link_del' title='delete'><i class='fa fa-times'></i></a>
      </td>
      </tr>";

    }
    
    }else

    $sql = "SELECT * FROM products ORDER BY id ASC";
    $data = $koneksi->prepare($sql);
    $data->execute();
  // $result = $data->fetch(PDO::FETCH_OBJ);

    $nomor = 1;
    while ($result = $data->fetch(PDO::FETCH_OBJ)){ 

      $link_del = "index.php?pages=list_product&act=delete&id=$result->id";
      $link_edit = "index.php?pages=add_product&act=edit&id=$result->id";

      echo "<tr>

      <th scope='row'>". $nomor++ ."</th>
      <td> $result->kode_barang </td>
      <td> $result->nama_barang </td>
      <td> $result->kategori </td>
      <td> $result->harga_beli </td>
      <td> $result->harga_jual </td>
      <td>
      <a href='$link_edit' title='link_edit'><i class='fa fa-pencil-square-o'></i></a> &nbsp
      <a href='$link_del' title='delete'><i class='fa fa-times'></i></a>
      </td>
      </tr>";

    }
    $koneksi = null;
    
    if (isset($_GET["act"])=="delete") {
      $sql = "DELETE FROM products WHERE id=".$_GET["id"];

      if ($koneksi->query($sql)) {
        echo "<script type= 'text/javascript'>alert('Deleted Successfully');
        window.location.replace('index.php?pages=list_product');
        </script>";
      }else{
        echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
      }
      $koneksi = null;
    }

  }catch(PDOException $a){
   echo "Error : ".$a->getMessage();
 }

 ?>
</tr>
</tbody>
  </div>
</table>
</body>
</html>