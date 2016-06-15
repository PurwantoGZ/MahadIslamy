<?php
include_once '../../config/base.php';
$db              = new BaseClass();
$ISBN            = $_POST['ISBN'];
//$newIdCollection = $db->getAutoId("select max(right(collection.IdCollection,4))as 'IdCollection' from mahad.collection;", $ISBN);
//$IdCollection    = $newIdCollection;
$Title           = $_POST['Title'];
$IdPublisher     = $_POST['Publisher'];
$IdAuthor        = $_POST['AuthorSelect'];
$IdCategory      = $_POST['Category'];
$IdSubCategory   = $_POST['SubCategory'];
$IdKind          = $_POST['Kind'];
$IdShelf         = $_POST['Shelf'];
$Description     = $_POST['Description'];
$Year            = $_POST['Year'];
$Count           = $_POST['Count'];
$IdCollection    = $ISBN.$IdSubCategory;
//simpan gambar folder

$target_dir    = "../assets/images/collection/";
$nama_final    = rand(1000, 100000)."-".basename($_FILES["uploadImage1"]["name"]);
$target_file   = $target_dir.$nama_final;
$uploadOk      = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
//Jika Input File Kosong
if (NULL==basename($_FILES["uploadImage1"]["name"])) {
	$DataCollection = array('IdCollection' => $IdCollection, 'ISBN' => $ISBN, 'Title' => $Title, 'IdPublisher' => $IdPublisher, 'IdAuthor' => $IdAuthor, 'IdSubCategory' => $IdSubCategory, 'IdKind' => $IdKind, 'IdShelf' => $IdShelf, 'Description' => $Description, 'Year' => $Year, 'Count' => $Count);
}else{

// Check if image file is a actual image or fake image
if (isset($_POST["insertButton7"]) &&(!NULL==basename($_FILES["uploadImage1"]["name"]))) {
	$check = getimagesize($_FILES["uploadImage1"]["tmp_name"]);
	if ($check !== false) {
		//echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}
}
// Check if file already exists
if (file_exists($target_file)) {
	echo "Sorry, file already exists.";
	$uploadOk = 0;
}
// Check file size
if ($_FILES["uploadImage1"]["size"] > 1000000) {
	echo "Sorry, your file is too large.";
	$uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	 && $imageFileType != "gif") {
	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["uploadImage1"]["tmp_name"], $target_file)) {
		//echo "The file ".basename($_FILES["uploadImage1"]["name"])." has been uploaded.";
		$DataCollection = array('IdCollection' => $IdCollection, 'ISBN' => $ISBN, 'Title' => $Title, 'IdPublisher' => $IdPublisher, 'IdAuthor' => $IdAuthor, 'IdSubCategory' => $IdSubCategory, 'IdKind' => $IdKind, 'IdShelf' => $IdShelf, 'Description' => $Description, 'Year' => $Year, 'Count' => $Count, 'Cover' => $nama_final);
	} else {
		//echo "Sorry, there was an error uploading your file.";
		$db->viewMessage("danger", "Sorry, there was an error uploading your file. !");
	}
}
}
// Call Insert Function
if ($db->insert("collection", $DataCollection) == true) {
			//return true;
			$db->viewMessage("success", "Berhasil simpan Data Koleksi.");
		} else {
			//return false;
			$db->viewMessage("danger", "Gagal Simpan Data !");
		}

header('location:../admin.php?content=collection');
?>
