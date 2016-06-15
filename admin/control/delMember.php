<?php
include_once '../../config/base.php';
$db       = new BaseClass();
$idDelete = $_POST['ik'];
$oldfoto  = $_POST['oldNewPhoto'];
if ($result = $db->delete("member", "IdMember= $idDelete")) {
	$db->viewMessage("success", "Data Berhasil disimpan");
	unlink("../assets/images/member/".$oldfoto);
} else {
	$db->viewMessage("danger", "Gagal Simpan Data");
}
header('location:../admin.php?content=member');
?>
