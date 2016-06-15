<?php 
include_once '../../config/base.php';
$db=new BaseClass();
$indukCategory=$_POST['indukCategory'];
$IdCategory=$_POST['IdCategory'];
$CategoryName=$_POST['CategoryName'];
$savedata = array('idSubCategory' => $IdCategory,'SubCategory'=>$CategoryName,'IdCategory'=>$indukCategory );
if ($db->insert("subcategory",$savedata)==true) {
	echo "success";
}else{
	echo "failed";
}

 ?>
