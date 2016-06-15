<?php 	
include_once '../config/base.php';
$db            = new BaseClass();
$idGuest=$_GET['idGuest'];

$result=$db->displayTable("select MemberName from member where IdMember='$idGuest'");

if ($result->num_rows>0) {
	while ($row=$result->fetch_assoc()) {
		echo json_encode($row['MemberName']);
	}
}else{
	echo json_encode("Nama tidak ada.");
}

 ?>