<?php
include_once '../../config/base.php';
$db=new BaseClass();
$idCollect=$_GET['collectId'];
$idLoans=$_GET['idLoans'];
$dateLoans=Date('Y-m-d');
$ket="OK";
$jumlahPinjam=$db->displayTable("select  * from detailloans where IdLoans='$idLoans'");
$jumlah=$jumlahPinjam->num_rows;
$db->CountLoan=$jumlah;
$_SESSION['jumlahLoans']=$jumlah;

$LoansTemp = array('IdLoans' =>$idLoans ,'IdCollection'=> $idCollect,'DateLoans'=>$dateLoans,'Ket'=>$ket);
if ($jumlah<=2) {
    if ($db->ValueCheck("detailloans","IdLoans='$idLoans'and IdCollection='$idCollect'")==true) {
      $db->viewMessage("danger","Koleksi Sudah dipesan !!");
    }else {
      if ($db->insert("detailloans",$LoansTemp)==true) {
      }else{
          $db->viewMessage("danger","Data Gagal dipinjam !!");
      }
    }

  header('location:../admin.php?content=transaction&viewTrans=1#loan');
}else{
  $db->viewMessage("danger","Maks. Pinjam 3 !!");
  $_SESSION['jumlahLoans']=2;
  header('location:../admin.php?content=transaction&viewTrans=1#loan');
}
 ?>
