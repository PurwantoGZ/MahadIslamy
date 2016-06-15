<?php
session_start();
$usr=$_SESSION['username'];
$pwd=$_SESSION['password'];
if ($_POST['lock-pwd']) {
	$pwdconfirm=$_POST['lock-pwd'];

	if ($pwd==md5($pwdconfirm)) {
		$_SESSION['lock']='no';
		header('location:../admin/index.php');
	}else{
		header('location:lock.php');
	}

}else{
	header('location:lock.php');
}
 ?>
