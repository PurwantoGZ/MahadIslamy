<?php
require_once '../config/base.php';
$db = new BaseClass();
$id = $db->getAutoId("select max(right(employee.IdEmployee,4))as 'IdEmployee' from mahad.employee;", "EMP16");
?>
<!-- SELECT2 EXAMPLE -->
          <div class="box box-info collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title ">Formulir Petugas Baru</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-info" data-widget="collapse">
                <i class="fa fa-plus"> Tambah</i></button>
              </div>
            </div><!-- /.box-header -->
              <form role="form" action="control/insertEmployee.php" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="row">
                          <div class="col-md-4">
                                <div class="form-group">
                                  <label for="IdEmp">ID Petugas</label>
                                    <input name="IdEmp" type="text" readonly="readonly" value="<?php echo $id;?>" class="form-control" id="IdEmp" placeholder="ID Petugas">
                                </div>
                                <div class="form-group">
                                  <label for="IdEmp">NIK </label>
                                    <input name="NIK" type="number" required="required"  class="form-control" id="NIK" placeholder="Masukkan NIK yang valid">
                                </div>
                                <div class="form-group">
                                  <label for="EmpName">Nama Lengkap</label>
                                    <input name="EmpName" required="required" type="text" class="form-control" id="EmpName" style='text-transform:uppercase' placeholder="Masukkan Nama lengkap">
                                </div>

                                <div class="form-group">
                                  <label for="Job">Jabatan</label>
                                  <select name="Job" id="Job" class="form-control" placeholder="Pilih Kelas">
                                        <option>Kepala Perpustakaan</option>
                                        <option>Administrasi/Sirkulasi</option>
                                        <option>Inventory</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea id="Address"  name="Address" class="form-control" required="required" rows="3" placeholder="Masukkan Alamat Lengkap"></textarea>
                                </div>

                                <div class="form-group">
                                  <label for="">No.Handphone:</label>
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="number" id="noHP" name="noHP" class="form-control" required="required">
                                  </div>
                                </div>

                          </div>
                          <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Cover">Foto Profil</label>
                                    <br>
                                    <img id="uploadPreview4" style="width: 250px;height: 350px;border:1px solid #000000;" src="assets/images/no_image.jpg" />
                                    <br>
                                </div>
                                <div class="form-group">
                                    <input id="uploadImage4" type="file" name="uploadImage4" onchange="PreviewImage(4);"/>
                                </div>
                          </div>
                          <!--KOLOM 2-->
                          <div class="col-md-4" style="padding-right: 50px;">
                              <h3>Account Login</h3>
                              <div class="form-group">
                                  <label for="username">Username</label>
                                  <input class="form-control"readonly="readonly" value="<?php echo $id;?>" id="username" name="username" placeholder="Masukkan Username" type="text">
                              </div>
                              <div class="form-group">
                                  <label for="password">Password Baru</label>
                                  <input class="form-control" type="password" name="password" id="passwordEmp" required="required" placeholder="Min 8 Karakter">
                              </div>
                              <div class="form-group">
                                  <label for="confirmpassword">Konfirmasi Password</label>
                                  <input class="form-control" type="password" name="confirmpassword" id="confirmpasswordEmp" placeholder="Ketik Ulang Password" required="required">
                              </div>

                              <div class="form-group">
                                  <label><input required="required" id="checkboxButton5" type="checkbox"> Yakin data sudah lengkap ?</label>
                              </div>
                              <div class="form-group">
                                    <button type="submit" disabled="disabled" id="insertButton5" name="insertButton5" class="btn btn-info pull-right" >Simpan</button>
                              </div>
                          </div>
                          <!--END KOLOM 2-->
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </form>
            <div class="box-footer">

              *) Pastikan Data merupakan data yang valid.
            </div>
          </div><!-- /.box -->