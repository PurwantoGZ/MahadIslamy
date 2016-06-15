<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->setFooter('Perpustakaan Mahad Islamy Banguntapan | {PAGENO} / {nbpg} | '.$date);
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>