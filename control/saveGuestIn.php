<?php 
include_once '../config/base.php';
$db            = new BaseClass();
$dateIn=date("d-m-Y H:i:s");
if (isset($_POST['guestId'])) {
	$dataSave = array('DateIn' =>$dateIn ,'IdMember'=>$_POST['guestId'],'Message'=>$_POST['Message'] );

	if ($db->insert("guestbook",$dataSave)==true) {
		echo json_encode(true);
	}else{
		echo json_encode(false);
	}
}else{
	echo json_encode(false);
}

 ?>