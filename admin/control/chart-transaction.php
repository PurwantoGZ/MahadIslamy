<?php 
include_once '../../config/base.php';
$db=new BaseClass();
$result=$db->displayTable('');
$array=array();
while ($row=$result->fetch_assoc()) {
	array_push($array,array('y' =>$row[''] ,
							'a'=>$row[''],
							'b'=>$row[''] ););
}
echo json_encode($array);
 ?>