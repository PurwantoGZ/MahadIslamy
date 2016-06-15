<?php 
include_once '../../config/base.php';
$db=new BaseClass();
$db->dataClass=null;
    $db->readData("select *from category");
    foreach ($db->dataClass as $val3) {
        extract($val3);
       echo "<option  value=$IdCategory>$Category</option>";
                                 
    }
 ?>