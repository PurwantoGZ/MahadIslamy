<?php
require_once"config/base.php";
$db=new BaseClass();
$usr=$_POST['inpuser'];
$pwd=$_POST['inppass'];

	if($db->login($usr,$pwd)==true){
		//header('location:admin/admin.php');
		$jon="Kepala Perpustakaan";
		if ($db->dataEmp['Job']==$jon) {
			$_SESSION['akses']='admin';
		}else{
			$_SESSION['akses']='user';
		}
		$_SESSION['IdEmployee']=$db->dataEmp['IdEmployee'];
		$_SESSION['EmpName']=$db->dataEmp['EmployeeName'];
		$_SESSION['Jabatan']=$db->dataEmp['Job'];
		$_SESSION['NIK']=$db->dataEmp['NIK'];
		$_SESSION['Address']=$db->dataEmp['Address'];
		$_SESSION['Foto']=$db->dataEmp['Foto'];
		$_SESSION['Handphone']=$db->dataEmp['NoHandphone'];
		$_SESSION['username']=$db->dataEmp['UserName'];
		$_SESSION['password']=$db->dataEmp['Password'];

		header('location:admin/index.php');
	}else {
		header('location:index.php?module=login');
	}
 ?>
