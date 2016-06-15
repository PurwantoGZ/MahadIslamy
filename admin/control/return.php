<?php
include_once '../../config/base.php';
$db=new BaseClass();
$data=$_GET['data'];
$IdLoans=$data[0];
$IdCollection=$data[1];
$IdReturn=$data[2];
$idMember=$_SESSION['IdAnggota'];
$idEmployee=$_SESSION['username'];
$dateReturn=date('Y-m-d');
$ket="No";
$set = array('Ket' =>$ket );
$saveReturn = array('IdReturn' =>$IdReturn ,'IdMember'=>$idMember,'IdEmployee'=>$idEmployee );
$arrayReturn = array('IdReturn' =>$IdReturn ,'IdCollection'=> $IdCollection,'DateReturn'=>$dateReturn);
if ($db->update("detailloans",$set," IdLoans='$IdLoans' and IdCollection='$IdCollection'")==true) {
    if (($db->insert("detailreturn",$arrayReturn)==true)&&($db->insert("mahad.return",$saveReturn)==true)) {
        $db->viewMessage("success","Transaksi Berhasil !!");
    }else{
       $db->viewMessage("danger","Transaksi Gagal !!");
    }
}else {
  $db->viewMessage("danger","Data Gagal Dikembalikan !!");
}
header('location:../admin.php?content=transaction&viewTrans=1');
 ?>
