<?php
include_once '../../config/base.php';
$db       = new BaseClass();
$idDelete = $_POST['idDelColl'];
$coverDel = $_POST['delCover'];
if ($result = $db->delete("collection", "IdCollection='$idDelete'")) {
	unlink("../assets/images/collection/".$coverDel);
	$db->viewMessage("success", "Data Telah dihapus");
} else {
	$db->viewMessage("danger", "Gagal Hapus Data");
}
header('location:../admin.php?content=collection');
?>
