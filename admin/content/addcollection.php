<?php
require_once '../config/base.php';
$db = new BaseClass();
?>
<!-- SELECT2 EXAMPLE -->
          <div class="box box-info collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title ">Input Koleksi Baru</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-info" data-widget="collapse">
                <i class="fa fa-plus"> Tambah</i></button>
              </div>
            </div><!-- /.box-header -->
              <form id="formInsertCollection" role="form" action="control/insertCollection.php" method="POST"  enctype="multipart/form-data">
                <div class="box-body">
                    <div class="row">
                          <div class="col-md-4">

                              <div class="form-group">
                                <label for="ISBN">ISBN</label>
                                <input name="ISBN" required="required" id="ISBN" class="form-control" type="text" placeholder="Masukkan ISBN Buku">
                              </div>
                              <div class="form-group">
                                <label for="Title">Judul Koleksi</label>
                                <input name="Title" id="Title" required="required" class="form-control" type="text" placeholder="Masukkan Judul Koleksi">
                              </div>
                              <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea  name="Description" required="required" class="form-control" rows="5" placeholder="Tuliskan kata kunci koleksi"></textarea>
                              </div>
                              <div class="form-group">
                                      <label for="Year">Tahun Terbit</label>
                                      <input class="form-control" required="required" type="text" name="Year" id="Year" placeholder="Masukkan Tahun Terbit">
                                </div>
                                <div class="form-group">
                                      <label for="Count">Jumlah Exemplar</label>
                                      <input class="form-control" required="required" name="Count" id="Count" type="number" placeholder="Masukkan Jumlah Koleksi">
                                </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="Author">Penulis:</label>
                              <select class="form-control"  name="AuthorSelect" id="AuthorSelect" required="required">
                              <option>--Pilih Penulis--</option>
<?php
$db->dataClass = null;
$db->readData("select *from author");
foreach ($db->dataClass as $val2) {
	extract($val2);
	?>
																													                                  <option value="<?php echo $IdAuthor;?>"><?php echo $AuthorName;
	?></option>
	<?php
}
?>
</select>
                            </div>
                            <div class="form-group">
                              <label for="Publisher">Penerbit</label>
                                <select class="form-control" name="Publisher" id="Publisher" required="required">
                                  <option>--Pilih Penerbit--</option>
<?php
$db->dataClass = null;
$db->readData("select *from publisher");
foreach ($db->dataClass as $val2) {
	extract($val2);
	?>
																													                                  <option value="<?php echo $IdPublisher;?>"><?php echo $PublishName;
	?></option>
	<?php
}
?>
</select>
                            </div>
                            <div class="form-group">
                              <label for="Category">Kategory</label>
                              <select  class="form-control " name="Category" id="Category" required="required">
                                <option>--Pilih Kategori--</option>
<?php
$db->dataClass = null;
$db->readData("select *from category");
foreach ($db->dataClass as $val3) {
	extract($val3);
	?>
																													                                  <option  value="<?php echo $IdCategory;?>"><?php echo $Category;
	?></option>
	<?php
}
?>
</select>
                            </div>
                            <div class="form-group">
                              <label for="Category">Sub. Kategory</label>
                              <select class="form-control select2" style="width: 100%;" name="SubCategory" id="SubCategory" required="required">
                                <option>--Pilih Sub. Kategori--</option>
<?php
$db->dataClass = null;
$db->readData("select *from subcategory");
foreach ($db->dataClass as $val4) {
	extract($val4);
	?>
																													                                  <option value="<?php echo $idSubCategory;?>"><?php echo $SubCategory;
	?></option>
	<?php
}
?>
</select>
                            </div>
                            <div class="form-group">
                              <label for="Kind">Jenis</label>
                              <select class="form-control" name="Kind" id="Kind" required="required">
                                <option>--Pilih Jenis--</option>
<?php
$db->dataClass = null;
$db->readData("select *from kind");
foreach ($db->dataClass as $val5) {
	extract($val5);
	?>
																													                                  <option value="<?php echo $IdKind;?>"><?php echo $KindName;
	?></option>
	<?php
}
?>
</select>
                            </div>
                            <div class="form-group">
                              <label for="Shelf">Rak</label>
                              <select class="form-control" name="Shelf" id="Shelf" required="required">
                                <option>--Pilih Letak Rak--</option>
<?php
$db->dataClass = null;
$db->readData("select *from shelf");
foreach ($db->dataClass as $val6) {
	extract($val6);
	?>
																													                                  <option value="<?php echo $IdShelf;?>"><?php echo $Location;
	?></option>
	<?php
}
?>
</select>
                            </div>
                          </div>

                          <div class="col-md-1" style="margin-left:-25px; ">
                              <div class="form-group" style="padding-top: 23px;">
                                <a  data-toggle="modal"  data-target="#AddAuthorModal">
                                  <button class="btn btn-info"><span  class="fa fa-edit">Tambah</span></button>
                                </a>
                              </div>
                              <div class="form-group" style="padding-top: 25px;">
                                <a  data-toggle="modal" data-target="#AddPublishModal">
                                  <button class="btn btn-info"><span  class="fa fa-edit">Tambah</span></button>
                                </a>
                              </div>
                              <div class="form-group" style="padding-top: 27px;">
                                <a  data-toggle="modal" data-target="#AddCategoryModal">
                                  <button class="btn btn-info"><span  class="fa fa-edit">Tambah</span></button>
                                </a>
                              </div>
                              <div class="form-group" style="padding-top: 24px;">
                                <a data-toggle="modal" data-target="#AddSubCategoryModal">
                                  <button class="btn btn-info"><span  class="fa fa-edit">Tambah</span></button>
                                </a>
                              </div>
                              <div class="form-group" style="padding-top: 24px;">
                                <a data-toggle="modal" data-target="#AddKindModal">
                                  <button class="btn btn-info"><span  class="fa fa-edit">Tambah</span></button>
                                </a>
                              </div>
                              <div class="form-group" style="padding-top: 25px;">
                                <a data-toggle="modal" data-target="#AddRakModal">
                                  <button class="btn btn-info"><span  class="fa fa-edit">Tambah</span></button>
                                </a>
                              </div>
                          </div>

                          <div class="col-md-4" style="padding-left: 50px;">
                                <div class="form-group">
                                      <label for="Cover">Sampul Koleksi</label>
                                      <br>
                                      <img id="uploadPreview1" style="width: 250px;height: 350px;border:1px solid #000000;" src="assets/images/no_image.jpg" />
                                      <br>
                                </div>
                                <div class="form-group">
                                  <input id="uploadImage1" type="file" name="uploadImage1" onchange="PreviewImage(1);"/>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkboxButton7" required="required"> Data Sudah lengkap ?
                                    </label>
                                </div>
                                <hr>
                                <div class="form-group">
                                      <button type="submit" disabled="disabled" id="insertButton7" class="btn btn-info pull-right" name="insertButton7">Simpan</button>
                                </div>
                          </div>

                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </form>
            <div class="box-footer">

              *) Pastikan Data merupakan data yang valid.
            </div>
          </div><!-- /.box -->
