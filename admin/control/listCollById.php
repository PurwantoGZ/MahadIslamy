<?php 
include_once '../../config/base.php';
$db=new BaseClass();
$idLoans  = $db->getAutoId("select max(right(loans.IdLoans,4))as 'IdLoans' from mahad.loans;", "PJ16");
$idSearch=$_GET['SearchIdCollLoan'];
echo '<thead>
        <tr>
          <th>No.</th>
          <th>Id Koleksi</th>
          <th>Judul</th>
          <th>Penulis</th>
          <th>Kategori</th>
          <th>Jenis</th>
          <th>Tahun</th>
          <th>Pilihan</th>
        </tr>
      </thead>
      <tbody>';
     $count  = 1;
     $result=$db->displayTable("select * from viewcollection where IdCollection LIKE '$idSearch' and Status='Tersedia'");
     if ($result->num_rows>0) {
     	while ($row=$result->fetch_assoc()) {
     		echo '<tr>
     				<td>'.$count.'</td>
     				<td>'.$row["IdCollection"].'</td>
     				<td>'.$row["Title"].'</td>
     				<td>'.$row["AuthorName"].'</td>
     				<td>'.$row["SubCategory"].'</td>
     				<td>'.$row["KindName"].'</td>
     				<td>'.$row["Year"].'</td>';
     				if ($row["Status"] == "Dipinjam") {
     					$enable="disabled=disabled";
     				}else{
     					$enable="";
     				}
     				echo 
     				'<td>
						<div class="row" style="margin-left: 5px;margin-right: 5px;">
									<a '.$enable.' class="btn btn-info " href="control/addloan.php?collectId='. $row["IdCollection"].'&&idLoans='.$idLoans.'"><span class="glyphicon glyphicon-shopping-cart"> Pinjam</span>
								  </a>
							 </div>
     				</td>
     			 </tr>';
     			 $count++;
     	}
     }else{
     	echo '<tr>
				<td colspan="8">Not Found / Sedang Dipinjam</td>
     		<tr>';
     }
     echo '<tbody>';
 ?>