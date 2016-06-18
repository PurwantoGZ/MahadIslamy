<?php
include_once '../../config/base.php';
$db=new BaseClass();
$idDelLoans=$_GET['idCancel'];
$idCollection=$_GET['idColl'];
$arrayName = array('Count' =>"(Count+1)");

   if ($db->delete("detailloans","No=$idDelLoans")==true) {
   		$db->cancelInsert("collection",$arrayName,"IdCollection='$idCollection'");
      $db->viewMessage("success","Koleksi Dibatalkan");
    }else{
        $db->viewMessage("danger","Data Gagal dipinjam !!");
    }
    header('location:../admin.php?content=transaction&viewTrans=1#loan');
 ?>
