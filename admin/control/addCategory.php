<?php 
include_once '../../config/base.php';
$db=new BaseClass();
$CategoryName=$_POST['CategoryName'];
$Keterangan=$_POST['Keterangan'];
$newIdCategory=$_POST['IdCategory'];

$dataCategory = array('IdCategory' => $newIdCategory,'Category'=>$CategoryName,'Description'=>$Keterangan );
if ($db->insert("category",$dataCategory)==true) {
	
}                          
 ?>