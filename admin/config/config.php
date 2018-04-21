<?php 

$host = 'localhost';
$user = 'root';
$password = 'sav3gaza.';
$db = 'northwind';



try{

	$koneksi = new PDO("mysql:host=$host;dbname=$db",$user,$password);

	$koneksi->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	// echo "Koneksi Berhasil";

}catch(PDOException $z){
	echo "Error : " . $z->getMessage();
}


?>