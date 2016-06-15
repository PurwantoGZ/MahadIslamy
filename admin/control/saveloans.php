<?php
include_once '../../config/base.php';
$db=new BaseClass();
$idLoans=$_GET['idLoans'];
$idMember=$_SESSION['IdAnggota'];
$idEmployee=$_SESSION['username'];
$Count=$_SESSION['jumlahLoans']+1;
$DataLoans = array('IdLoans' =>$idLoans ,'IdMember'=>$idMember,'IdEmployee'=>$idEmployee,'Count'=>$Count );

if ($db->insert("loans",$DataLoans)==true) {
  $db->viewMessage("success","koleksi berhasil disimpan");
}else{
  $db->viewMessage("danger","Koleksi Gagal disimpan");
}
header('location:../admin.php?content=transaction&viewTrans=1#loan');

 ?>
