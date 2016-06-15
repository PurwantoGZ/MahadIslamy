<?php 
  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
 ?>
 <?php include_once 'include/header.php'; ?>
<?php session_start(); ?>
<?php include_once 'config/base.php'; ?>
<?php $db=new BaseClass(); ?>
<?php 
if (isset($_GET['module'])) {
	if ($_GET['module']=='home') {
		include_once 'content/slider.php';
	}else{
		?>
		<div id="contentview" style="background: #F1F2F7;">
			<?php 
				if ($_GET['module']=='login') {
					include_once 'content/login-view.php';
				}
				if ($_GET['module']=='info') {
					include_once 'content/info-view.php';
					//include_once 'content/news-view.php';
				}
				if ($_GET['module']=='profil') {
					include_once 'content/librarian-view.php';
				}
				if ($_GET['module']=='bukutamu') {
					include_once 'content/guest-view.php';
					//include_once 'content/search-view.php';
				}
				if ($_GET['module']=='search') {
					include_once 'content/searchByKey-view.php';
				}
				if ($_GET['module']=='info-history') {
					include_once 'content/history-view.php';
				}
				if ($_GET['module']=='info-service') {
					include_once 'content/service-view.php';
				}
				if ($_GET['module']=='info-member') {
					include_once 'content/member-info.php';
				}
			 ?>
		</div>
		<?php
	}
	
}else{
		include_once 'content/slider.php';

}
 ?>  
<?php include_once 'include/footer.php'; ?>