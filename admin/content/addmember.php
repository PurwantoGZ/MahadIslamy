<?php
require_once '../config/base.php';
$db = new BaseClass();
$id = $db->getAutoId("select max(right(member.IdMember,4))as 'IdMember' from mahad.member;", "316");
?>
<!-- SELECT2 EXAMPLE -->
          <div class="box box-info collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title ">Formulir Anggota Baru</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-info" data-widget="collapse">
                <i class="fa fa-plus"> Tambah</i></button>
              </div>
            </div><!-- /.box-header -->
              <form name="FAddMember"  action="control/insertMember.php" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                            <div class="form-group">
                              <label for="IdMember">ID Anggota</label>
                                <input name="IdMember" readonly="readonly" value="<?php echo $id;?>" type="text" class="form-control" id="IdMember" placeholder="<?php echo $id;?>">
                            </div>

                            <div class="form-group">
                              <label for="MemberName">Nama Lengkap</label>
                                <input name="MemberName" required type="text" class="form-control" id="MemberName" style='text-transform:uppercase' placeholder="Masukkan Nama lengkap">
                            </div>

                            <div class="form-group">
                              <label for="gender">Gender</label>
                              <br>
                              <label>
                              <input name="gender" id="gender" value="Laki-laki" checked="true" type="radio"> Laki-laki
                              </label>
                              <label>
                              <input name="gender" id="gender" value="Perempuan" checked="" type="radio"> Perempuan
                              </label>
                            </div>

                            <div class="form-group">
                              <label for="Class">Kelas</label>
                              <select name="Class" id="Class" class="form-control" placeholder="Pilih Kelas">
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
                                <label>Alamat</label>
                                <textarea name="Address" required class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>

                            <div class="form-group">
                              <label>Tanggal Regristasi(tahun-bulan-tanggal):</label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input id="TglRg" name="TglRg" type="text" readonly="readonly" class="form-control" value="<?php echo date("Y-m-d");?>" text="<?php echo date("d/m/Y");?>">
                              </div><!-- /.input group -->
                            </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="Cover">Photo Profil</label>
                          <br>
                          <img id="uploadPreview3" style="width: 250px;height: 350px;border:1px solid #000000;" src="assets/images/no_image.jpg" />
                          <br>
                        </div>
                        <div class="form-group">
                          <input id="uploadImage3" type="file" name="uploadImage3" onchange="PreviewImage(3);"/>
                        </div>
                        <div class="form-group">
                          <label><input required="required" id="checkboxButton2" type="checkbox"> Yakin data lengkap ?</label>
                        </div>
                        <div class="form-group">
                          <input type="submit" class="btn btn-info" id="insertButton2" disabled="disabled" name="insertButton2" value="Simpan">
                            <!--<button type="submit" class="btn btn-info" style="margin-left:120px; width: 80px; ">Simpan</button>-->
                        </div>
                      </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </form>
            <div class="box-footer">

              *) Pastikan Data merupakan data yang valid.
            </div>
          </div><!-- /.box -->

