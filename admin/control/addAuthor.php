<?php
include_once '../../config/base.php';
$db=new BaseClass();
$AuthorName=$_POST['AuthorName'];
$Ket=$_POST['Ket'];
$newIdAuthor=$db->getAutoIdInven("select max(right(author.IdAuthor,2))as 'IdAuthor' from mahad.author;","Author");
$idAuthor=$newIdAuthor;
$saveData = array('idAuthor' =>$idAuthor ,'AuthorName'=>$AuthorName,'Description'=>$Ket );
if ($db->insert("author",$saveData)==true) {
	echo "success";
}else{
	echo "failed";
}
			
 ?>


