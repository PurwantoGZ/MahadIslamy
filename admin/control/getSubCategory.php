<?php
include_once '../../config/base.php';
$db            = new BaseClass();
$idGet         = $_GET['idCategory'];
$db->dataClass = null;
$db->readData("select *from subcategory where IdCategory='$idGet'");
echo "<option>--Pilih Sub.Kategori--</option>";
foreach ($db->dataClass as $val3) {
	extract($val3);
	echo "<option value=$idSubCategory>$SubCategory</option>";
}
?>