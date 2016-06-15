<?php 

include_once '../../config/base.php';
    $db=new BaseClass();
	$IdMemberku=$_POST['IdMember'];
	$MemberName=$_POST['MemberName'];
	$Gender=$_POST['gender'];
	$IdClass=$_POST['Class'];
	$Address=$_POST['Address'];
	$Foto=null;
	$RegristationDate=$_POST['TglRg'];
	$BarcodeImage=null;
	
	$file=$_FILES['fileToUpload']['tmp_name'];
	if (!isset($file)) {
		$_SESSION['notif']="danger";
		$_SESSION['message']="sasasasa !!!";
		header('location:../admin.php?content=member');
	}else{
		$image=addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));
		$image_name=addslashes($_FILES['fileToUpload']['name']);
		$image_size=getimagesize($_FILES['fileToUpload']['tmp_name']);
	}

	$arrayName = array('IdMember' =>$IdMemberku ,'MemberName'=>$MemberName,'Gender'=> $Gender,'IdClass'=>$IdClass,'Address'=>$Address,'Foto'=>$image,'RegristationDate'=>$RegristationDate);
	//$db->insert("member",$arrayName);
	if ($db->insert("member",$arrayName)==true) {
		$_SESSION['notif']="success";
		$_SESSION['message']="Data sukses disimpan :)";
		header('location:../admin.php?content=member');
	}else
	{
		$_SESSION['notif']="danger";
		$_SESSION['message']="Data Gagal disimpan !!!";
		header('location:../admin.php?content=member');
	}

 ?>