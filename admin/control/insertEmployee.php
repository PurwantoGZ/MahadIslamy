<?php
include_once '../../config/base.php';
$db       = new BaseClass();
$IdEmp    = $_POST['IdEmp'];
$EmpName  = $_POST['EmpName'];
$NIK      = $_POST['NIK'];
$Job      = $_POST['Job'];
$Address  = $_POST['Address'];
$noHP     = $_POST['noHP'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$target_dir    = "../assets/images/employee/";
$nama_final    = rand(1000, 100000)."-".basename($_FILES["uploadImage4"]["name"]);
$target_file   = $target_dir.$nama_final;
$uploadOk      = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

if (NULL==basename($_FILES["uploadImage4"]["name"])) {
	$arrayData = array('IdEmployee' => $IdEmp, 'NIK' => $NIK, 'EmployeeName' => $EmpName, 'Job' => $Job, 'Address' => $Address, 'NoHandphone' => $noHP);
		$dataLogin = array('UserName'   => $username, 'Password'   => $password, 'IdEmployee'   => $IdEmp);
}else{
// Check if image file is a actual image or fake image
if (isset($_POST["insertButton5"])&&(!NULL==basename($_FILES["uploadImage4"]["name"]))) {
	$check = getimagesize($_FILES["uploadImage4"]["tmp_name"]);
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
if ($_FILES["uploadImage4"]["size"] > 1000000) {
	//echo "Sorry, your file is too large.";
	$db->viewMessage("danger", "Sorry, your file is too large.");
	$uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	 && $imageFileType != "gif") {
	//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$db->viewMessage("danger", "Sorry, your file was not uploaded.");
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	//echo "Sorry, your file was not uploaded.";
	$db->viewMessage("danger", "Sorry, your file was not uploaded.");
	// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["uploadImage4"]["tmp_name"], $target_file)) {
		//echo "The file ".basename($_FILES["uploadImage3"]["name"])." has been uploaded.";
		$arrayData = array('IdEmployee' => $IdEmp, 'NIK' => $NIK, 'EmployeeName' => $EmpName, 'Job' => $Job, 'Address' => $Address, 'NoHandphone' => $noHP, 'Foto' => $nama_final);
		$dataLogin = array('UserName'   => $username, 'Password'   => $password, 'IdEmployee'   => $IdEmp);
	} else {
		//echo "Sorry, there was an error uploading your file.";
		$db->viewMessage("danger", "Sorry, there was an error uploading your file. !");
	}
}
}
// Call Function Insert
if (($db->insert("employee", $arrayData) == true) && ($db->insert('login', $dataLogin) == true)) {
	$db->viewMessage("success", "Data Berhasil Disimpan");
} else {
	$db->viewMessage("danger", "Gagal Simpan Data");
}

header('location:../admin.php?content=employee');
?>
