<?php
include_once '../../config/base.php';
$db       = new BaseClass();
$result   = $db->displayTable("select * from viewmember");
$emparray = array();
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$emparray[] = $row;
		echo json_encode($emparray);
		//write to json file
		$fp = fopen('../json/empdata.json', 'w');
		fwrite($fp, json_encode($emparray));
		fclose($fp);
	}
}
?>