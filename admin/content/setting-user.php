
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile" style="height: 455px;">
                  	<div style="padding-right: 20px;padding-left: 37px;padding-top: 10px;">
              			<img style="width: 175px;height: 200px;border:1px solid #fff;"id="newImagePetugas" src="assets/images/employee/<?php 
              			echo $_SESSION['Foto']; ?>" alt="User profile picture">
            		</div>	
                  <h3 class="profile-username text-center"><?php echo $_SESSION['EmpName']; ?></h3>
                  <p class="text-muted text-center"><?php echo $_SESSION['Jabatan']; ?></p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
              
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#data-diri" data-toggle="tab">Data Diri</a></li>
                  <li><a href="#account" data-toggle="tab">Account</a></li>
                </ul>
                <div id="Newtab" class="tab-content">
                  <div class="active tab-pane" id="data-diri">
                  		<form id="newFormPetugas" class="form-horizontal" role="form" action="control/update-employee-id.php" method="POST" enctype="multipart/form-data">
                  			<div class="row">
                  				<div class="col-sm-7">
                  					<div class="form-group">
                        				<label for="inputName" class="col-sm-3 control-label">ID Petugas</label>
                        				<div class="col-sm-9">
                          					<input type="text" class="form-control"	 value="<?php echo $_SESSION['IdEmployee']; ?>" readonly id="newIdPetugas" name="newIdPetugas" placeholder="ID Petugas">
                        				</div>
                      				</div>
                      				<div class="form-group">
                        				<label for="inputName" class="col-sm-3 control-label">NIK</label>
                        				<div class="col-sm-9">
                          					<input type="text" class="form-control"	value="<?php echo $_SESSION['NIK']; ?>" id="newNikPetugas" name="newNikPetugas" placeholder="Isikan NIK">
                        				</div>
                      				</div>
                      				<div class="form-group">
                        				<label for="inputName" class="col-sm-3 control-label">Nama Petugas</label>
                        				<div class="col-sm-9">
                          					<input type="text" class="form-control"	value="<?php echo $_SESSION['EmpName']; ?>" id="newNamaPetugas" name="newNamaPetugas" placeholder="Ketik Nama Lengkap">
                        				</div>
                      				</div>
                      				<div class="form-group">
                        				<label for="inputName" class="col-sm-3 control-label">Jabatan</label>
                        				<div class="col-sm-9">
                                  			<input type="text" readonly="readonly" class="form-control"	value="<?php echo $_SESSION['Jabatan']; ?>" id="newJabatanPetugas" name="newJabatanPetugas" placeholder="Ketik Nama Lengkap">
                        				</div>
                      				</div>
                      				<div class="form-group">
                        				<label for="inputName" class="col-sm-3 control-label">Alamat</label>
                        				<div class="col-sm-9">
                          					<textarea class="form-control" rows="4"	 id="newAlamatPetugas" name="newAlamatPetugas" placeholder="Ketikan Alamat Asli"><?php echo $_SESSION['Address']; ?></textarea>
                        				</div>
                      				</div>
                      				<div class="form-group">
                        				<label for="inputName" class="col-sm-3 control-label">No.Handphone</label>
                        				<div class="col-sm-9">
                          					<input type="text" class="form-control"	value="<?php echo $_SESSION['Handphone']; ?>" id="newHpPetugas" name="newHpPetugas" placeholder="No.Handphone aktif">
                        				</div>
                      				</div>
                      				<div class="form-group" >
                                  		<label class="col-sm-8 control-label"><input required="required" id="checkboxButton9" type="checkbox"> Yakin data sudah lengkap ?</label>
                              		</div>
                              		<div class="form-group" style="padding-left: 145px;">
                                    	<button type="submit" id="insertButton9" name="insertButton9" class="btn btn-info pull-left " disabled="disabled">Simpan</button>
                              		</div>
                      			</div>
                      			
                  			</div>
                  		</form>                   
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="account">
	                    <form id="newFormAccount" class="form-horizontal" role="form" action="control/update-account-login.php" method="POST" enctype="multipart/form-data">
	                      <div class="form-group">
	                        <label for="inputName" class="col-sm-4 control-label">Password Lama</label>
	                        <input type="hidden" id="loginIdPetugas" name="loginIdPetugas" value="<?php echo $_SESSION['IdEmployee']; ?>">
	                        <input type="hidden" id="loginUserPetugas" name="loginUserPetugas" value="<?php echo $_SESSION['username']; ?>">
	                        <div class="col-sm-6">
	                          <input type="password" class="form-control" name="newPassOld"  placeholder="Ketik Password Lama" required>
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="inputEmail" class="col-sm-4 control-label">Password Baru</label>
	                        <div class="col-sm-6">
	                          <input type="password" class="form-control" name="newPass" placeholder="Ketik Password Baru" required>
	                        </div>
	                      </div>
	                      
	                      <div class="form-group">
	                        <div class="col-sm-offset-4 col-sm-4">
	                          <div class="checkbox">
	                            <label>
	                              <input type="checkbox" id="checkboxButton10"> I agree to the <a href="#">terms and conditions</a>
	                            </label>
	                          </div>
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <div class="col-sm-offset-4 col-sm-4">
	                          <button type="submit" class="btn btn-danger" id="insertButton10" name="insertButton10" disabled="disabled">Submit</button>
	                        </div>
                      	  </div>
                    	</form>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->