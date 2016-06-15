<?php include_once 'header.php'; ?>
 <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Sergey Pimenov and Metro UI CSS contributors">

    <link rel='shortcut icon' type='image/x-icon' href='../favicon.ico' />

    <title><?php echo $id; ?></title>
    <style>
      .barcode {
  padding:0.2em;
  he
  margin-left:10px ;
  margin-top:10px ;
  margin-right: -15px;
  margin-bottom: 0px ;
  vertical-align: bottom;
  color: #000000;
}
.barcodecell {
  text-align: center;
  vertical-align: middle;
  padding: 0;
}
.address { 
    display: block;
    font-style: italic;
    font-size: 5pt;
    color: white;
    text-align: right;
}
.alamat{
  text-align: right;
  padding-top: -2px;
}
    </style>

</head>
<body>
<?php 
//CONTAIN CETA
$idMember=$_GET['idMember'];
$result=$db->displayTable("SELECT * FROM `viewmember` WHERE `IdMember` ='$idMember' LIMIT 1");
if ($result->num_rows==1) {
	while ($row=$result->fetch_assoc()) {
		$png="ID_Card.png";
		echo '<div style="width: 359;height: 208px; background-image: url('.$png.');background-position: 50% 50%; background-size: cover;">
      <table border="0" cellpadding="2" cellspacing="0">
          <tr>
            <td width="29px" height="65px"></td>
            <td width="51px"></td>
            <td width="250px"></td>
            <td width="25px"></td>
          </tr>
          <tr>
            <td width="29px" height="65px"></td>
            <td>
                <font size="1">
                    Nama<br>
                Id <br>
                Kelas<br>
                Alamat
                </font>
                
            </td>
            <td>
                <font size="1">
                      : '.strtoupper($row["MemberName"]).'<br>
                      : '.$row["IdMember"].'<br>
                      : '.$row["ClassName"].'<br>
                      : '.$row["Address"].'
                  </font>
            </td>
            <td></td>
          </tr>
          <tr>
            <td height="30px"></td>
            <td rowspan="3" style="text-align:top;padding-top:-4px;padding-left:3px;"><img src="../admin/assets/images/member/'.$row["Foto"].'" align="top" alt="" style="width:48px;height: 61px;"></td>
            <td rowspan="2" style="text-align:right;padding-left:9px;"><div style=""><barcode style="padding:0.2em;height:10px;" code="'.$row["IdMember"].'" type="C128B"/></div></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
        <tr>
          <td></td>
          <td class="alamat">
              <address class="address">Bodon, Jagalan, Banguntapan, Bantul<br>Yogyakarta 55173.
              <br>www.lib.mtsbanguntapan.sch.id
              </address>
          </td>
          <td></td>
        </tr>
    </table>
</div>';
	}
}
?>

</body>
</html>
<?php include_once 'footer.php'; ?>