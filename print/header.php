<?php
 // Define relative path from this script to mPDF
$nama_dokumen='Document Perpustakaan'; //Beri nama file PDF hasil Download.
define('_MPDF_PATH','../mpdf/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 
date_default_timezone_set('Asia/Jakarta');
$date = date('d-m-Y', time());
$mpdf->setFooter('Perpustakaan Mahad Islamy Banguntapan | {PAGENO} / {nbpg} | '.$date);
include_once '../config/base.php';
$db=new BaseClass();
?>