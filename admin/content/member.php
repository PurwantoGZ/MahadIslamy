<?php
require_once '../config/base.php';
$db = new BaseClass();
?>
<!-- Main content -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Anggota Perpustakaan</h3>
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
$result = $db->displayTable("select * from viewmember");
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
												<a class="btn btn-info btn-flat" data-toggle="modal" data-placement="top" title="Edit Data Member" data-target="#EditModal"
                            data-id="<?php echo $row['IdMember'];?>"
                            data-name="<?php echo $row['MemberName'];?>"
                            data-gender="<?php echo $row['Gender'];?>"
                            data-class="<?php echo $row['ClassName'];?>"
                            data-tgldaftar="<?php echo $row['RegristationDate'];?>"
                            data-expired="<?php echo $row['ExpiredDate'];?>"
                            data-status="<?php echo $row['Status'];?>"
                            data-address="<?php echo $row['Address'];?>"
                            data-foto="<?php echo $row['Foto'];?>"
                            style="color: #fff;"><span class="fa fa-pencil"></span>
                          </a>
                          <a class="btn btn-danger btn-flat" data-toggle="modal" data-placement="top" title="Hapus Data Member" data-target="#delMemberModal" data-id="<?php echo $row['IdMember'];?>" data-foto="<?php echo $row['Foto'];?>" href="#" style="color: #fff;"><span class="fa fa-trash-o"></span>
                          </a>

                          <a class="btn btn-warning btn-flat" target="_blank" href="../print/print-idcard-one.php?idMember=<?php echo $row['IdMember'];?>"><li class="fa fa-print"></li></a>
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

          <!--MODAL-->
            <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel"></h4>
                      </div>
                      <div class="modal-body">
                          <form id="FormUpdateMember" action="control/updateMember.php" method="POST" role="form" enctype="multipart/form-data">
                            <div class="box-body" >
                                <div class="row">
                                    <div class="col-md-6" >
                                        <div class="form-group">
                                          <label class="control-label">Id Anggota :
                                          </label>
                                          <input id="oldProfil" name="oldProfil" type="hidden">
                                          <input name="idAnggota" id="idAnggota" class="form-control" type="text" readonly="readonly">
                                          <br>
                                          <label class="control-label">Nama Anggota :
                                          </label>
                                          <input type="text" name="NamaAnggota"  id="NamaAnggota" class="form-control">
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label">Kelas :
                                          </label>
                                          <select class="form-control" name="KelasAnggota" id="KelasAnggota">
                                            <option value="">--Pilih Kelas--</option>
<?php
$db->readData("select *from class");
foreach ($db->dataClass as $val) {
	extract($val);
	?>
	<option value="<?php echo $IdClass;?>"><?php echo $ClassName;
	?></option>
	<?php
}
?>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="gender">Gender</label>
                                          <br>
                                          <label>
                                              <input name="gender" id="gender1" value="Laki-laki"  type="radio"> Laki-laki
                                          </label>
                                          <label>
                                              <input name="gender"  id="gender2" value="Perempuan"  type="radio"> Perempuan
                                          </label>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label">Alamat :
                                          </label>
                                          <textarea id="Addressku" name="Addressku" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                           <label class="control-label"><input type="checkbox" id="checkboxDaftar"> Tgl.Daftar</label>
                                          <input id="tglDaftarku" name="tglDaftarku" type="date" readonly="readonly"  class="form-control">
                                      </div>
                                      <div class="form-group">
                                           <label class="control-label">Tgl.Jatuh Tempo</label>
                                          <input id="tglExpiredku" type="" readonly="readonly" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="Cover">Photo Profil</label>
                                          <br>
                                          <img id="uploadPreview4" style="width: 225px;height: 300px;border:1px solid #000000;" src="assets/images/no_image.jpg" />
                                          <br>
                                      </div>
                                      <div class="form-group">
                                          <input id="uploadImage4" type="file" name="uploadImage4" onchange="PreviewImage(4);"/>
                                      </div>

                                      <div class="form-group">
                                          <label><input required="required" id="checkboxButton4" type="checkbox"> Yakin data lengkap ?</label>
                                      </div>
                                      <div class="form-group">
                                          <button type="submit" disabled="disabled" id="UpdateButton4" name="UpdateButton4" class="btn btn-info pull-right" >Simpan</button>
                                      </div>
                                    </div>
                                </div>
                            </div>

                          </form>
                      </div>

                    </div>
                </div>
            </div>



            <div class="modal fade modal-danger" id="delMemberModal" tabindex="-1" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Konfimasi Hapus</h4>
                  </div>
                  <form class="contact" method="POST" action="control/delMember.php">
                  <fieldset>
                    <div class="modal-body">
                      <h5 id="message" name="message"></h5>
                      <input type="text" name="ik" value="" hidden="hidden">
                       <input type="hidden" id="oldNewPhoto" name="oldNewPhoto">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                      <button type="submit" id="delsubmit" class="btn btn-outline">OK</button>
                  </div>
                  </fieldset>
                  </form>

                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
          <!--END MODAL-->