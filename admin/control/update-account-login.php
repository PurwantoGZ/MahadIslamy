<?php 
include_once '../../config/base.php';
$db           = new BaseClass();
$IdEmployee=$_POST['loginIdPetugas'];
$username=$_POST['loginUserPetugas'];
$newPass= md5($_POST['newPass']);
$dataLogin = array('Password' =>$newPass  );
if ($db->update("login",$dataLogin,"Username='$username'")==true) {
	#$_SESSION['password']
	if ($log=$db->displayTable("select * from login where IdEmployee='$IdEmployee'")) {
		if ($log->num_rows>0) {
			$data=$log->fetch_array();
			$_SESSION['password']=$data['Password'];
		}else{
			return false;
		}
	}else{
		return false;
	}
}
header('location:../admin.php?content=setuser');
?>