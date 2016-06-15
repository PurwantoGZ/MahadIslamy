<?php 
include_once '../../config/base.php';
$db=new BaseClass();
$idReturn = $db->getAutoId("select max(right(return.IdReturn,4))as 'IdReturn' from mahad.return;", "KM16");
$query=null;
$idMember = $_SESSION['IdAnggota'];
if (isset($_GET['SearchIdCollReturn'])) {
	$id=$_GET['SearchIdCollReturn'];
	if ($id==null) {
		$query="SELECT * FROM DataLoans where Status='Dipinjam' and IdMember='$idMember'";
	}else{
		$query="SELECT * FROM DataLoans where Status='Dipinjam' and IdMember='$idMember' and IdCollection='$id'";
	}
}else{
$query="SELECT * FROM DataLoans where Status='Dipinjam' and IdMember='$idMember'";
}

$i=1;
echo '<thead>
             <tr>
				<th></th>
				<th>ID Pinjam</th>
				<th>ID Koleksi</th>
				<th>Judul Koleksi</th>
				<th>TGl.Pinjam</th>
				<th>TGL.Jatuh Tempo</th>
				<th></th>
			</tr>
      </thead>
      <tbody>';
 $result=$db->displayTable($query);
 if ($result->num_rows>0) {
 	while ($row=$result->fetch_assoc()) {
 		echo '<tr>
				<td>
					<div>
					<a href="control/renewLoans.php?idLoans='.$row["IdLoans"].'&idCollection='.$row["IdCollection"].'"><button class="btn btn-info btn-flat" type="button" name="button"><span class="fa fa-cloud-upload"></span></button></a>
					</div>
				</td>
				<td>'.$row["IdLoans"].'</td>
				<td>'.$row["IdCollection"].'</td>
				<td>'.$row["Title"].'</td>
				<td>'.$row["DateLoans"].'</td>
				<td>'.$row["ExpiredLoans"].'</td>
				<td>
				<div>
					<a href="control/return.php?data[]='.$row['IdLoans'].'&data[]='.$row['IdCollection'].'&data[]='.$idReturn.'"><button class="btn btn-danger btn-flat" type="button" name="button"><span class="fa fa-cloud-download"></span></button></a>
				</div>
				</td>
 			 </tr>';
 	}
 }else{
 	echo '<tr>
 			<td colspan="7" class="text-center">Data Tidak ditemukan</td>
 		  </tr>';
 }
 echo '</tbody>';
 ?>