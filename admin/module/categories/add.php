<?php 


if (isset($_GET['act'])=="edit") {
  $sql =  "SELECT * FROM kategori WHERE id=".$_GET["id"];
  $query = $koneksi->prepare($sql);
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_OBJ);
  $id = $result[0]->id;
  $kategori = $result[0]->kategori;

}else{
  $kategori = "";
}

?>


<!DOCTYPE html>
<html> 
<head>
  <title>Add Kategori</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" crossorigin="anonymous">

</head>
<body>
  <div class="container">
    <form method="POST">
      <div class="form-group row">
        <label for="kategori" class="col-sm-2 col-form-label col-form-label-sm">Nama Kategori</label>
        <div class="col-sm-8">
          <input name="kategori" type="text" class="form-control form-control-sm" id="kategori" placeholder="Nama Kategori" required="required" value="<?= $kategori; ?>">
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
  $kategori = $_POST['kategori'];


  if (empty($kategori)) {
    echo "KAtegori Tidak Boleh Kosong";
    exit();
  }else{

    try{
      if (isset($_GET['act'])=="edit") {
        $sql = "UPDATE kategori SET kategori='$kategori' WHERE id=$id";

      }else
      $sql = "INSERT INTO kategori(kategori)VALUES('$kategori')";

      if ($koneksi->query($sql)) {
        echo "<script type= 'text/javascript'>alert('Save data Successfully');
        window.location.replace('index.php?pages=add_category');
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