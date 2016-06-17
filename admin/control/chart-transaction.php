<?php 
include_once '../../config/base.php';
$db=new BaseClass();
$result=$db->displayTable('SELECT MONTH(`DateLoans`)AS "y",COUNT(`DateLoans`)AS "a",
 (SELECT COUNT(`DateLoans`) FROM `detailloans` WHERE `DateLoans` >=NOW()-INTERVAL 1 YEAR)AS "b"
 FROM `detailloans` WHERE `DateLoans` >=NOW()-INTERVAL 1 YEAR GROUP BY MONTH(`DateLoans`);');
$array=array();
while ($row=$result->fetch_assoc()) {
	array_push($array,array('y' =>$row['y'] ,
							'a'=>$row['a'],
							'b'=>$row['b'] ));
}
echo json_encode($array);
 ?>