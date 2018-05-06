
<!DOCTYPE html>
<html>
<head>
	<title>List Products</title>
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nomor</th>
        <th scope="col">Kategori</th>
        <th scope="col">Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php 

      try{

        $sql = "SELECT * FROM kategori ORDER BY id ASC";
        $data = $koneksi->prepare($sql);
        $data->execute();
  // $result = $data->fetch(PDO::FETCH_OBJ);


        while ($result = $data->fetch(PDO::FETCH_OBJ)){ 

          $link_del = "index.php?pages=list_category&act=delete&id=$result->id";
          $link_edit = "index.php?pages=add_category&act=edit&id=$result->id";

          echo "<tr>

          <th scope='row'> $result->id </th>
          <td> $result->kategori </td>
          <td>
          <a href='$link_edit' title='link_edit'><i class='fa fa-pencil-square-o'></i></a> &nbsp
          <a href='$link_del' title='delete'><i class='fa fa-times'></i></a>
          </td>
          </tr>";

        }
        if (isset($_GET["act"])=="delete") {
          $sql = "DELETE FROM kategori WHERE id=".$_GET["id"];

          if ($koneksi->query($sql)) {
            echo "<script type= 'text/javascript'>alert('Deleted Successfully');
            window.location.replace('index.php?pages=list_category');
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
</table>
</body>
</html>