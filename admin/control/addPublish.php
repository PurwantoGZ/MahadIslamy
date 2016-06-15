<?php 
include_once '../../config/base.php';
$db=new BaseClass();
$newIdPublish=$db->getAutoIdInven("select max(right(publisher.IdPublisher,2))as 'IdPublisher' from mahad.publisher;","Publisher");
$PublishName=$_POST['PublishName'];
$Address=$_POST['Address'];
$saveData = array('IdPublisher' =>$newIdPublish , 'PublishName'=>$PublishName,'Address'=>$Address);
if ($db->insert("publisher",$saveData)==true) {
	
}
 ?>