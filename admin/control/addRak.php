<?php 
include_once '../../config/base.php';
$db=new BaseClass();
$Location=$_POST['Location'];
$newIdRak=$db->getAutoIdInven("select max(right(shelf.IdShelf,2))as 'IdShelf' from mahad.shelf;","Shelf");
$Keterangan=$_POST['Keterangan'];
$dataRak = array('IdShelf' =>$newIdRak ,'Location'=>$Location,'Description'=> $Keterangan);
if ($db->insert("shelf",$dataRak)==true) {

}
    
                         
 ?>