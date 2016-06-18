<?php
require_once '../config/base.php';
$db = new BaseClass();
?>
<!-- Main content -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Anggota Habis Masa Aktif</h3>
                  <h5><?php echo $db->dateIndo(date("Y-m-d")); ?></h5>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div  class="table-responsive">
                      <table id="tableMember" class="table table-hover">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>ID Anggota</th>
                          <th>Nama Anggota</th>
                          <th>Gender</th>
                          <th>Kelas</th>
                          <th>Tgl. Daftar</th>
                          <th>Tgl. Jatuh Tempo</th>
                          <th>Status</th>
                          <th >Pilihan</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
$count  = 1;
$result = $db->displayTable("select * from viewmember where Status='Tidak Aktif'");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		?>
		<tr>
				<td><?php echo $count;?></td>
				<td><?php echo $row['IdMember']?></td>
			  <td><?php echo $row['MemberName']?></td>
				<td><?php echo $row['Gender']?></td>
				<td><?php echo $row['ClassName']?></td>
				<td><?php echo $row['RegristationDate']?></td>
				<td><?php echo $row['ExpiredDate']?></td>
				<td><span class="label <?php
		if ($row['Status'] == "Aktif") {
			echo "label-success";
		} else {
			echo "label-danger";
		}
		?>"><?php echo $row['Status']?></span></td>
								<td>
										<div class="btn-group">
                      <a class="btn btn-warning btn-flat" data-toggle="modal" data-placement="top" title="Perpanjang Data Member" data-target="#newRegristationModal" data-id="<?php echo $row['IdMember'];?>"  href="#" style="color: #fff;"><span class="glyphicon glyphicon-print"> Perpanjang</span>
                      </a>
					         </div>
				      </td>
				</tr>
		<?php
		$count++;
	}
}
?>
</tbody>
                      </table>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          
            <div class="modal fade modal-primary" id="newRegristationModal" tabindex="-1" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Konfimasi Perpanjang Anggota</h4>
                  </div>
                  <form class="contact" method="POST" action="control/newRegristationMember.php">
                  <fieldset>
                    <div class="modal-body">
                      <h5 id="notifNewMem" name="message"></h5>
                      <input type="text" id="idNewMem" name="idNewMem" hidden="hidden">

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                      <button type="submit" id="newMemsubmit" name="newMemsubmit" class="btn btn-outline">OK</button>
                  </div>
                  </fieldset>
                  </form>

                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
          <!--END MODAL-->