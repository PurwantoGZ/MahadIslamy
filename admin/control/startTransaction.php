<?php
include_once '../../config/base.php';
$db=new BaseClass();
$idMember=$_POST['idMember'];
  //Cek Data / Tidak ?
    if ($db->checkValue("viewmember","IdMember=$idMember")==true) {
        //Cek Aktif / Tidak ?
          if ($db->dataEmp['Status']=="Aktif") {
            header('location:../admin.php?content=transaction&viewTrans=1');
            $_SESSION['IdAnggota']=$db->dataEmp['IdMember'];
            $_SESSION['NamaAnggota']=$db->dataEmp['MemberName'];
            $_SESSION['Kelasnya']=$db->dataEmp['ClassName'];
            $_SESSION['Kelamin']=$db->dataEmp['Gender'];
            $_SESSION['Alamat']=$db->dataEmp['Address'];
            $_SESSION['TglDaftar']=$db->dataEmp['RegristationDate'];
            $_SESSION['JatuhTempo']=$db->dataEmp['ExpiredDate'];
            $_SESSION['Ket']=$db->dataEmp['Status'];
            $_SESSION['tab']="loan";
            $_SESSION['FotoMember']=$db->dataEmp['Foto'];
            $idReturn=$db->getAutoId("select max(right(return.IdRetun,4))as 'IdRetun' from mahad.return;","KM16");
            $_SESSION['IdReturn']=$idReturn;
          }else{
            header('location:../admin.php?content=transaction&viewTrans=0');
            $db->viewMessage("danger","WARNING, Masa Aktif Habis.");
          }
    }else{
      header('location:../admin.php?content=transaction&viewTrans=0');
      $db->viewMessage("danger"," WARNING, Siswa Belum Terdaftar.");
    }

 ?>
