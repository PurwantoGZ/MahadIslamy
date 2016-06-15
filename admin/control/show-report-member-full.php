<?php 
include_once '../../config/base.php';
$db=new BaseClass();
$i=1;
$countCollection=0;
echo '<thead>
                    <tr>
                        <th class="header text-center">No</th>
                        <th class="header text-center">ISBN <i class="fa fa-sort"></i></th>
                        <th class="header text-center">Judul Koleksi<i class="fa fa-sort"></i></th>
                        <th class="header text-center">Penulis<i class="fa fa-sort"></i></th>
                        <th class="header text-center">Penerbit <i class="fa fa-sort"></i></th>
                        <th class="header text-center">Tahun<i class="fa fa-sort"></i></th>
                        <th class="header text-center">Kategori <i class="fa fa-sort"></i></th>
                        <th class="header text-center">Jenis</th>
                        <th class="header text-center">Jumlah</th>
                    </tr>
                </thead><tbody>';
$result=$db->displayTable("select * from viewcollection");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo '<tr>
                  <td>'.$i.'</td>
                  <td>'.$row["ISBN"].'</td>
                  <td>'.$row["Title"].'</td>
                  <td>'.$row["AuthorName"].'</td>
                  <td>'.$row["PublishName"].'</td>
                  <td>'.$row["Year"].'</td>
                  <td>'.$row["SubCategory"].'</td>
                  <td>'.$row["KindName"].'</td>
                  <td>'.$row["Count"].'</td>
              </tr>';
              $countCollection+=$row['Count'];
      $i++;
	}
}
echo'</tbody><tfoot>
                    <tr>
                        <td colspan="9" class="text-right"><strong>Total Koleksi : '.$countCollection.' SKS</strong></td>   
                    </tr>
                </tfoot>';
 ?>