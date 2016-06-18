<?php 
include_once '../../config/base.php';
$db=new BaseClass();
$i=1;
$countCollection=0;
echo '<thead>
                    <tr>
                        <th class="header text-center">No</th>
                        <th class="header text-center">ID Anggota <i class="fa fa-sort"></i></th>
                        <th class="header text-center">Nama Anggota <i class="fa fa-sort"></i></th>
                        <th class="header text-center">Kelamin <i class="fa fa-sort"></i></th>
                        <th class="header text-center">Kelas <i class="fa fa-sort"></i></th>
                        <th class="header text-center">Tgl.Regristasi <i class="fa fa-sort"></i></th>
                        <th class="header text-center">Alamat <i class="fa fa-sort"></i></th>
                        <th class="header text-center">Status <i class="fa fa-sort"></i></th>
                    </tr>
                </thead><tbody>';
$result=$db->displayTable("select * from viewmember");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo '<tr>
                  <td>'.$i.'</td>
                  <td>'.$row["IdMember"].'</td>
                  <td>'.$row["MemberName"].'</td>
                  <td>'.$row["Gender"].'</td>
                  <td>'.$row["ClassName"].'</td>
                  <td>'.$db->dateIndo($row["RegristationDate"]).'</td>
                  <td>'.$row["Address"].'</td>
                  <td>'.$row["Status"].'</td>
              </tr>';
              $countCollection++;
      $i++;
	}
}
echo'</tbody><tfoot>
                    <tr>
                        <td colspan="9" class="text-right"><strong>Total Koleksi : '.$countCollection.' SKS</strong></td>   
                    </tr>
                </tfoot>';
 ?>