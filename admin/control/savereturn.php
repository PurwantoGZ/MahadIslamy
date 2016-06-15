<?php
include_once '../../config/base.php';
$db=new BaseClass();
$idReturn=$_GET['idReturn'];
$idMember=$_SESSION['IdAnggota'];
$idEmployee=$_SESSION['username'];
$arrayReturn = array('IdReturn' =>$idReturn ,'IdMember'=>$idMember,'IdEmployee'=>$idEmployee );
if ($db->insert("mahad.return",$arrayReturn)==true) {
  $db->viewMessage("success","koleksi berhasil disimpan");

}else {
  $db->viewMessage("danger","Koleksi Gagal disimpan");
}
header('location:../admin.php?content=transaction&viewTrans=1');
 ?>
