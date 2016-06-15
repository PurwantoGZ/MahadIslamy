<?php
include_once '../../config/base.php';
$db    = new BaseClass();
$idBy  = $_GET['idUpdate'];
$data  = null;
$query = "select * from viewmember where IdMember=$idBy";

if (isset($_GET['idMember'])) {
	$result = $db->displayTable($query);
	if ($result->num_rows > 0) {
		$data = $result->fetch_array();
		echo json_encode($data);
	} else {
		return $data;
	}
	echo json_encode($data);
}

?>