<?php
include_once '../../config/base.php';
$db           = new BaseClass();
$IdEmployee   = $_POST['IdEmployee'];
$NikEmployee  = $_POST['NikEmployee'];
$NamaEmployee = $_POST['NamaEmployee'];
$JobEmployee  = $_POST['JobEmployee'];
$AddressEmpku = $_POST['AddressEmpku'];
$HpEmployee   = $_POST['HpEmployee'];
$oldfoto      = $_POST['oldFotoEmp'];

$target_dir    = "../assets/images/employee/";
$nama_final    = rand(1000, 100000)."-".basename($_FILES["uploadImage6"]["name"]);
$target_file   = $target_dir.$nama_final;
$uploadOk      = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

if (NULL==basename($_FILES["uploadImage6"]["name"])) {
	$dataUpdate = array('NIK' => $NikEmployee, 'EmployeeName' => $NamaEmployee, 'Job' => $JobEmployee, 'Address' => $AddressEmpku, 'NoHandphone' => $HpEmployee);
}else{
// Check if image file is a actual image or fake image
if (isset($_POST["UpdateButton6"])&&(!NULL==basename($_FILES["uploadImage6"]["name"]))) {
	$check = getimagesize($_FILES["uploadImage6"]["tmp_name"]);
	if ($check !== false) {
		//echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		//echo "File is not an image.";
		$db->viewMessage("danger", "Sorry, File is not an image.");
		$uploadOk = 0;
	}
}
// Check if file already exists
if (file_exists($target_file)) {
	//echo "Sorry, file already exists.";
	$db->viewMessage("danger", "Sorry, file already exists.");
	$uploadOk = 0;
}
// Check file size
if ($_FILES["uploadImage6"]["size"] > 1000000) {
	//echo "Sorry, your file is too large.";
	$db->viewMessage("danger", "Sorry, your file is too large.");
	$uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	 && $imageFileType != "gif") {
	//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$db->viewMessage("danger", "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	//echo "Sorry, your file was not uploaded.";
	$db->viewMessage("danger", "Sorry, your file was not uploaded.");
	// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["uploadImage6"]["tmp_name"], $target_file)) {
		//echo "The file ".basename($_FILES["uploadImage2"]["name"])." has been uploaded.";
		unlink("../assets/images/employee/".$oldfoto);
		$dataUpdate = array('NIK' => $NikEmployee, 'EmployeeName' => $NamaEmployee, 'Job' => $JobEmployee, 'Address' => $AddressEmpku, 'NoHandphone' => $HpEmployee, 'Foto' => $nama_final);
	} else {
		//echo "Sorry, there was an error uploading your file.";
		$db->viewMessage("danger", "Sorry, there was an error uploading your file. !");
	}
}
}
// Call Function Update
if ($db->update("employee", $dataUpdate, "IdEmployee='$IdEmployee'") == true) {
	$db->viewMessage("success", "Data Berhasil dirubah");
} else {
	$db->viewMessage("danger", "Gagal dirubah!!");
}


header('location:../admin.php?content=employee');
?>