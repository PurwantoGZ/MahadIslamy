<?php 
include_once '../../config/base.php';
$db=new BaseClass();
$db->dataClass=null;
            $db->readData("select *from author");
            foreach ($db->dataClass as $val2) {
            extract($val2);             
           	echo "<option value=$IdAuthor> $AuthorName</option>";              
             }
 ?>