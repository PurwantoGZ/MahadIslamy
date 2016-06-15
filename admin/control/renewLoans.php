<?php 
include_once '../../config/base.php';
$db=new BaseClass();

$IdLoans=$_GET['idLoans'];
$IdCollection=$_GET['idCollection'];
$DateLoans=date("Y-m-d");

$arrayName = array('DateLoans' => $DateLoans);
if ($db->update("detailloans",$arrayName," IdLoans='$IdLoans' and IdCollection='$IdCollection'")) {
	$db->viewMessage("success","SUKSES, Koleksi Sudah diperpanjangan !!");
}else{
	$db->viewMessage("danger","Gagal, Koleksi gagal diperpanjangan !!");
}
header('location:../admin.php?content=transaction&viewTrans=1');
 ?>