<?php 
include_once '../../config/base.php';
$db=new BaseClass();
$KindName=$_POST['KindName'];
$Keterangan=$_POST['Keterangan'];
$newIdKind=$db->getAutoIdInven("select max(right(kind.IdKind,2))as 'IdKind' from mahad.kind;","Kind");
$dataKind = array('IdKind' =>$newIdKind ,'KindName'=>$KindName,'Description'=>$Keterangan );
if ($db->insert("kind",$dataKind)==true) {
}
 ?>