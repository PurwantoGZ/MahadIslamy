<?php
 // Define relative path from this script to mPDF
$nama_dokumen='Data Pendaftar'; //Beri nama file PDF hasil.
define('_MPDF_PATH','mpdf/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 
date_default_timezone_set('Asia/Jakarta');
$date = date('d-m-Y', time());
$mpdf->setFooter('SIPMB Universitas Islam Batik Surakarta | {PAGENO} / {nbpg} | '.$date);

$id=$_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Sergey Pimenov and Metro UI CSS contributors">

    <link rel='shortcut icon' type='image/x-icon' href='../favicon.ico' />

    <title><?php echo $id; ?></title>
    

</head>

<body>
<div style="width: 359;height: 208px; background-image: url('ID_Card.png');background-position: 50% 50%; background-size: cover;">
      <table border="1" cellpadding="2" cellspacing="0">
          <tr>
            <td width="29px" height="65px">1</td>
            <td width="51px">2</td>
            <td width="243px">3</td>
            <td width="32px">4</td>
          </tr>
          <tr>
            <td width="29px" height="65px"></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td height="30px">2</td>
            <td rowspan="3"></td>
            <td> Purwanto</td>
            <td></td>
          </tr>
          <tr>
            <td >3</td>
            <td>VII C</td>
            <td></td>
          </tr>
        <tr>
          <td>4</td>
          <td></td>
          <td></td>
        </tr>
    </table>
</div>
<br>
<div style="width: 359;height: 208px; background-image: url('ID_Card.png');background-position: 50% 50%; background-size: cover;">
      <table border="1" cellpadding="2" cellspacing="0">
          <tr>
            <td width="29px" height="65px">1</td>
            <td width="51px">2</td>
            <td width="243px">3</td>
            <td width="32px">4</td>
          </tr>
          <tr>
            <td width="29px" height="65px"></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td height="30px">2</td>
            <td rowspan="3"></td>
            <td> Purwanto</td>
            <td></td>
          </tr>
          <tr>
            <td >3</td>
            <td>VII C</td>
            <td></td>
          </tr>
        <tr>
          <td>4</td>
          <td></td>
          <td></td>
        </tr>
    </table>
</div>
<br>

</body>
</html>
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->setFooter('SIPMB Universitas Islam Batik Surakarta | {PAGENO} / {nbpg} | '.$date);
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>