<?php
include_once '../../config/base.php';
$db         = new BaseClass();
$idDelete   = $_POST['idDelEmp'];
$delFotoEmp = $_POST['delFotoEmp'];
if ($result = $db->delete("mahad.login", "UserName= '$idDelete'")) {
	if ($db->delete("employee", "IdEmployee ='$idDelete'") == true) {
		unlink("../assets/images/employee/".$delFotoEmp);
		$db->viewMessage("success", "Data Telah dihapus");
	}
} else {
	$db->viewMessage("danger", "Gagal Hapus Data");
}
header('location:../admin.php?content=employee');
?>
