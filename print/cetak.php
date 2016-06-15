<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body onload="window.print();">
	<table border="1" cellpadding="2" cellspacing="0">
  <tr>
    <td width="50px">1</td>
    <td width="75px">2</td>
    <td width="150px">3</td>
    <td width="150px">4</td>
    <td width="150px">5</td>
    <td width="200px">6</td>
    <td  width="50px">7</td>
  </tr>
  <tr>
    <td>2</td>
    <td colspan="2" class="verticalTableHeader">ISBN '.$row["IdCollection"].'</td>
    <td></td>
    <td>200 '.$Pengarang.' '.substr($row["Title"],0,1).'</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>3</td>
    <td rowspan="5" >
    	<barcode class="verticalTableHeader" code="00034698735346987355" type="EAN128C" />
	</td>
    <td>'.$row["Title"].'</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>4</td>
    <td><i>Pengarang</i></td>
    <td colspan="2"><i>'.$row["AuthorName"].'</i></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>5</td>
    <td></td>
    <td>'.$row["PublishName"].'</td>
    <td>'.$row["Year"].'</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>6</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="300px">7</td>
    <td>BOX1</td>
    <td>BOX2</td>
    <td>BOX3</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>8</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="50px">9</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td  height="100px">10</td>
    <td colspan="3">B2</td>
    <td colspan="2">200 Moh j</td>
    <td></td>
  </tr>
  <tr>
    <td>11</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>