<?php
include_once '../../config/base.php';
$db = new BaseClass();
if (isset($_POST['newMemsubmit'])) {
	$tglNewRegristation = date("Y-m-d");
	$idNewMem           = $_POST['idNewMem'];
	$updateData         = array('RegristationDate' => $tglNewRegristation);
	if ($db->update("member", $updateData, " IdMember='$idNewMem'") == true) {
		$db->viewMessage("success", "Berhasil, Perpanjang Data.");
	} else {
		$db->viewMessage("danger", "Perpanjang Gagal, Cek Data baik-baik !");
	}
}
header('location:../admin.php?content=listRenewMember');
?>