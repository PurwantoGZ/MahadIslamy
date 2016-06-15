<?php
require_once '../config/base.php';
$db = new BaseClass();
?>
<!-- Main content -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Petugas Perpustakaan</h3>
                  <h5> 12 Maret 2016</h5>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                  <table id="tableEmployee" class="table table-hover">
                    <thead>
                      <tr>
                          <th>No</th>
                            <th>ID Petugas</th>
                            <th>NIK</th>
                            <th>Nama Petugas</th>
                            <th>Jabatan</th>
                            <th>No.Handphone</th>
                            <th>Alamat</th>
                            <th >Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
$count  = 1;
$result = $db->displayTable("select * from employee");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		?>
																												<tr>
																													<td><?php echo $count;?></td>
																													<td><?php echo $row['IdEmployee']?></td>
																													<td><?php echo $row['NIK']?></td>
																													<td><?php echo $row['EmployeeName']?></td>
																													<td><?php echo $row['Job']?></td>
																													<td><?php echo $row['NoHandphone']?></td>
																													<td><?php echo $row['Address']?></td>

																													<td>
																												<div class="row" style="margin-left: 5px;">
																														<a class="btn btn-info btn-flat" data-toggle="modal" data-target="#EditModalEmp"
																																data-id="<?php echo $row['IdEmployee'];?>"
																																data-name="<?php echo $row['EmployeeName'];?>"
																														    data-nik="<?php echo $row['NIK'];?>"
																																data-job="<?php echo $row['Job'];?>"
																																data-hp="<?php echo $row['NoHandphone'];?>"
																																data-address="<?php echo $row['Address'];?>"
																						                    data-foto="<?php echo $row['Foto'];?>"
																																style="color: #fff;"><span class="fa fa-edit"></span>
																															</a>
																															<a class="btn btn-danger btn-flat" data-toggle="modal" data-target="#delModalEmp"
				                                                      data-id="<?php echo $row['IdEmployee'];?>"
				                                                      data-foto="<?php echo $row['Foto'];?>"
				                                                      href="#" style="color: #fff;"><span class="fa fa-trash-o"></span>
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


          <div class="modal fade modal-danger" id="delModalEmp" tabindex="-1" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Konfimasi Hapus</h4>
                  </div>
                  <form class="contact" method="POST" action="control/delEmployee.php">
                  <fieldset>
                    <div class="modal-body">
                      <h5 id="message" name="message"></h5>
                      <input type="text" id="idDelEmp" name="idDelEmp" value="" hidden="hidden">
                      <input type="hidden" id="delFotoEmp" name="delFotoEmp">
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

            <div class="modal fade " id="EditModalEmp" tabindex="-1" role="dialog" aria-labelledby="TitleModalEmp">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header ">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="TitleModalEmp">EDIT DATA</h4>
                      </div>
                      <div class="modal-body">
                          <form id="FormUpdateEmp" action="control/updateEmploye.php" method="POST" role="form" enctype="multipart/form-data">
                            <div class="box-body" >
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">
                                              Id Petugas:
                                            </label>
                                            <input type="hidden" id="oldFotoEmp" name="oldFotoEmp">
                                            <input id="IdEmployee" name="IdEmployee" class="form-control" type="text" readonly="readonly">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                              NIK Petugas:
                                            </label>
                                            <input id="NikEmployee" name="NikEmployee" class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                              Nama Petugas:
                                            </label>
                                            <input id="NamaEmployee" name="NamaEmployee" class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                              Jabatan Petugas:
                                            </label>
                                            <select id="JobEmployee" name="JobEmployee" class="form-control">
                                                <option>Kepala Perpustakaan</option>
                                                <option>Administrasi/Sirkulasi</option>
                                                <option>Inventory</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Alamat:</label>
                                            <textarea id="AddressEmpku"  name="AddressEmpku" class="form-control" rows="3" placeholder="Masukkan Alamat Lengkap"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                              No.Handphone:
                                            </label>
                                            <input id="HpEmployee" name="HpEmployee" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="Cover">Photo Profil</label>
                                          <br>
                                          <img id="uploadPreview6" style="width: 225px;height: 300px;border:1px solid #000000;" src="assets/images/no_image.jpg" />
                                          <br>
                                      </div>
                                      <div class="form-group">
                                          <input id="uploadImage6" type="file" name="uploadImage6" onchange="PreviewImage(6);"/>
                                      </div>

                                      <div class="form-group">
                                          <label><input required="required" id="checkboxButton6" type="checkbox"> Yakin data lengkap ?</label>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" disabled="disabled" id="UpdateButton6" name="UpdateButton6" class="btn btn-primary">Update Data</button>
                            </div>
                          </form>
                      </div>

                    </div>
                </div>
            </div>
