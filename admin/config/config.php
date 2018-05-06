<?php 

include_once("const.php");


function connectDB($config){
	try{
		$host = $config["host"];
		$username = $config["username"];
		$password = $config["password"];
		$db = $config["db"];
		$koneksi = new PDO("mysql:host=$host;dbname=$db",$username,$password);
		$koneksi->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $koneksi;
	}catch(PDOException $a){
		echo "Error :" . $a->getMessage();
	}
}



function main_menu(){
	$config = ["host" =>"localhost",
	"username"=>"rio",
	"password"=>"123456",
	"db"=>"web_dinamis"
];
$koneksi = connectDB($config);
$pages = (isset($_GET["pages"])) ? $_GET["pages"] : '';
switch ($pages) {
	case "list_product":
		include_once(path."products/view-all.php");
	break;
	case "add_product":
		include_once(path."products/add.php");
	break;
	case "list_orders":
		include_once(path."orders/view-all.php");
	break;
	case "belum_bayar":
		include_once(path."orders/belum-bayar.php");
	break;
	case "perlu_dikirim":
		include_once(path."orders/perlu-dikirim.php");
	break;
	case "selesai":
		include_once(path."orders/selesai.php");
	break;
	case "list_category":
		include_once(path."categories/view-all.php");
	break;
	case "add_category":
		include_once(path."categories/add.php");
	break;
	default:
		include_once(path."index.php");
	break;
  }
}



?>

