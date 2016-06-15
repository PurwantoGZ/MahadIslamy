<?php 
include_once '../../config/base.php';
$db=new BaseClass();
$db->dataClass=null;
    $db->readData("select *from subcategory");
    foreach ($db->dataClass as $val4) {
        extract($val4);
        echo "<option value=$idSubCategory>$SubCategory</option>";
    }
?>