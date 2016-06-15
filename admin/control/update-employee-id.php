<?php
include_once '../../config/base.php';
$db           = new BaseClass();
$IdEmployee   = $_POST['newIdPetugas'];
$NikEmployee  = $_POST['newNikPetugas'];
$NamaEmployee = $_POST['newNamaPetugas'];
$JobEmployee  = $_POST['newJabatanPetugas'];
$AddressEmpku = $_POST['newAlamatPetugas'];
$HpEmployee   = $_POST['newHpPetugas'];

$dataUpdate = array('NIK' => $NikEmployee, 'EmployeeName' => $NamaEmployee, 'Job' => $JobEmployee, 'Address' => $AddressEmpku, 'NoHandphone' => $HpEmployee);
		
		if ($db->update("employee", $dataUpdate, "IdEmployee='$IdEmployee'") == true) {
			$log=$db->displayTable("select * from viewlogin where IdEmployee='$IdEmployee'");
			if ($log->num_rows>0) {
				$data=$log->fetch_array();
				$_SESSION['IdEmployee']=$data['IdEmployee'];
				$_SESSION['EmpName']=$data['EmployeeName'];
				$_SESSION['Jabatan']=$data['Job'];
				$_SESSION['NIK']=$data['NIK'];
				$_SESSION['Address']=$data['Address'];
				$_SESSION['Handphone']=$data['NoHandphone'];
			}else{
				return false;
			}
		} else {
			return false;
		}


header('location:../admin.php?content=employee');
?>