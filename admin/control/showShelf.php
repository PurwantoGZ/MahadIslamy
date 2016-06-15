<?php 
include_once '../../config/base.php';
$db=new BaseClass();
$db->dataClass=null;
    $db->readData("select *from shelf");
    foreach ($db->dataClass as $val6) {
        extract($val6);
        echo "<option value=$IdShelf>$Location</option>";
    }
 ?>