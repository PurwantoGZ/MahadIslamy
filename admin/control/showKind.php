<?php 
include_once '../../config/base.php';
$db=new BaseClass();
$db->dataClass=null;
    $db->readData("select *from kind");
    foreach ($db->dataClass as $val5) {
        extract($val5);
		echo "<option value=$IdKind>$KindName</option>";

     }
 ?>