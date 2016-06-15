<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));session_start();
if (isset($_SESSION['lock'])) {
		if ($_SESSION['lock']=='yes') {
			header('location:lock.php');
		}else{
			header('location:admin.php?content=home');
		}
}else{
	header('location:admin.php?content=home');
}
 ?>
