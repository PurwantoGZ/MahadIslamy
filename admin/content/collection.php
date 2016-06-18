<?php
require_once '../config/base.php';
$db = new BaseClass();
?>
<div id="divCollection" class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Koleksi Perpustakaan</h3>
                  <h5><?php echo $db->dateIndo(date("Y-m-d")); ?></h5>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table id="tableCollection"  class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ISBN</th>
                        <th>Judul Koleski</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Kategori</th>
                        <th>Letak</th>
                        <th>Status</th>
                        <th style="width: 145px;">Pilihan</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
$count  = 1;
$result = $db->displayTable("select *from viewcollection");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		?>
		<tr>
				<td><?php echo $count;?></td>
				<td><?php echo $row['ISBN'];?></td>
				<td><?php echo $row['Title'];?></td>
				<td><?php echo $row['AuthorName'];?></td>
        <td><?php echo $row['PublishName']; ?></td>
				<td><?php echo $row['Year'];?></td>
				<td><?php echo $row['SubCategory'];?></td>
				<td><?php echo $row['Location'];?></td>
				<td><span class="label <?php
		if ($row['Status'] == "Tersedia") {
			echo "label-success";
		} else {
			echo "label-danger";
		}
		?>"><?php echo $row['Status'];?></span></td>
				<td style="align-content: center;">
								<a class="btn btn-info btn-flat" data-toggle="modal" data-target="#UpdateCollectionModal"
											data-id="<?php echo $row['IdCollection'];?>"
											data-name="<?php echo $row['Title'];?>"
											data-isbn="<?php echo $row['ISBN'];?>"
											data-author="<?php echo $row['AuthorName'];?>"
											data-publisher="<?php echo $row['PublishName'];?>"
											data-year="<?php echo $row['Year'];?>"
											data-category="<?php echo $row['SubCategory'];?>"
											data-kind="<?php echo $row['KindName'];?>"
											data-shelf="<?php echo $row['Location'];?>"
											data-count="<?php echo $row['Count'];?>"
										  data-status="<?php echo $row['Status'];?>"
											data-cover="<?php echo $row['Cover'];?>"
										style="color: #fff;"><li class="fa fa-edit"></li>
									</a>
									<a data-toggle="modal" class="btn btn-danger btn-flat" data-target="#delCollectionModal" data-id="<?php echo $row['IdCollection'];?>" data-cover="<?php echo $row['Cover'];?>" href="#" style="color: #fff;"><li class="fa fa-trash-o"></li>
                  </a>
                  <a class="btn btn-warning btn-flat" target="_blank" href="../print/print-attr-collection.php?IdCollection=<?php echo $row['IdCollection'];?>"><li class="fa fa-print"></li></a>
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
            <div class="modal fade" id="UpdateCollectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                      </div>
                      <form id="formUpdateCollection" action="control/updateCollection.php" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                    <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="ISBN">ID Koleksi</label>
                                <input id="OldCover" name="OldCover" type="hidden">
                                <input name="idCollku" required="required" id="idCollku" readonly="readonly" class="form-control" type="text" >
                              </div>
                              <div class="form-group">
                                <label for="ISBN">ISBN</label>
                                <input name="ISBNku" required="required" id="ISBNku" class="form-control" readonly="readonly" type="text" placeholder="Masukkan ISBN Buku">
                              </div>
                              <div class="form-group">
                                <label for="Title">Judul Koleksi</label>
                                <textarea name="Titleku" id="Titleku" required="required" class="form-control" rows="2"  placeholder="Masukkan Judul Koleksi"></textarea>
                              </div>
                              <div class="form-group">
                                      <label for="Year">Tahun Terbit</label>
                                      <input class="form-control" required="required" type="text" id="Yearku" name="Yearku" placeholder="Masukkan Tahun Terbit">
                                </div>
                                <div class="form-group">
                                      <label for="Count">Jumlah Exemplar</label>
                                      <input class="form-control" required="required" name="Countkuku" id="Countkuku" type="number" placeholder="Masukkan Jumlah Koleksi">
                                </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="Author">Penulis:</label>
                              <select class="form-control"  name="AuthorSelectku" id="AuthorSelectku" required="required">
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
                                <select class="form-control" name="Publisherku" id="Publisherku" required="required">
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
                              <select  class="form-control " name="Categoryku" id="Categoryku" required="required">
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
                              <select class="form-control select2" style="width: 100%;" name="SubCategoryku" id="SubCategoryku" required="required">
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
                              <select class="form-control" name="Kindku" id="Kindku" required="required">
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
                              <select class="form-control" name="Shelfku" id="Shelfku" required="required">
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
                          <div class="col-md-4">
                                <div class="form-group">
                                      <label for="Cover">Sampul Koleksi</label>
                                      <br>
                                      <img id="uploadPreview2" style="width: 250px;height: 350px;border:1px solid #000000;" src="#" />
                                      <br>
                                </div>
                                <div class="form-group">
                                  <input id="uploadImage2" type="file" name="uploadImage2"  onchange="PreviewImage(2);"/>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkboxButton1" required="required"> Data Sudah lengkap ?
                                    </label>
                                </div>
                                <hr>

                          </div>

                    </div><!-- /.row -->
                </div><!-- /.box-body -->
                <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" name="UpdateButton1" id="UpdateButton1" disabled="disabled" class="btn btn-primary">Update Data</button>
                      </div>
                      </form>

                    </div>
                </div>
            </div>

            <div class="modal fade modal-danger" id="delCollectionModal" tabindex="-1" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Konfimasi Hapus</h4>
                  </div>
                  <form class="contact" method="POST" action="control/delCollection.php">
                  <fieldset>
                    <div class="modal-body">
                      <h5 id="message" name="message"></h5>
                      <input type="text" name="idDelColl" id="idDelColl" value="" hidden="hidden">
                      <input type="hidden" id="delCover" name="delCover">
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

            <div class="modal fade" id="AddAuthorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Tambah Penulis Baru</h4>
                      </div>
                      <div class="modal-body">
                          <form id="formAddAuthor" name="formAddAuthor" role="form" action="control/addAuthor.php" method="POST">
                              <div class="form-group">
                                <label for="AuthorName" class="control-label">Nama Penulis:</label>
                                <input type="text" name="AuthorName" class="form-control" placeholder="Nama Penulis">
                              </div>
                              <div class="form-group">
                                  <label for="Ket" class="control-label">Keterangan:</label>
                                  <textarea class="form-control" id="Ket" name="Ket" placeholder="Isikan Keterangan tentang penulis"></textarea>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" >Simpan</button>
                              </div>
                          </form>
                      </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="AddPublishModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Tambah Penerbit Baru</h4>
                      </div>
                      <div class="modal-body">
                          <form id="formAddPublish" name="formAddPublish" role="form" action="control/addPublish.php" method="POST">
                              <div class="form-group">
                                <label for="PublishName" class="control-label">Nama Penerbit:</label>
                                <input type="text" name="PublishName" class="form-control" placeholder="Nama Penerbit">
                              </div>
                              <div class="form-group">
                                  <label for="Ket" class="control-label">Alamat:</label>
                                  <textarea class="form-control" id="Ket" name="Address" placeholder="Isikan alamat penerbit"></textarea>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" >Simpan</button>
                              </div>
                          </form>
                      </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="AddCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Tambah Kategori Baru</h4>
                      </div>
                      <div class="modal-body">
                          <form id="formAddCategory" name="formAddCategory" role="form" action="control/addCategory.php" method="POST">
                              <div class="form-group">
                                <label class="control-label">Kode Kategori
                                </label>
                                <input type="text" name="IdCategory" placeholder="Kode Kategori" required="required" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="PublishName" class="control-label">Nama Kategori:</label>
                                <input type="text" name="CategoryName"  class="form-control" required="required" placeholder="Nama Kategori">
                              </div>
                              <div class="form-group">
                                  <label for="Ket" class="control-label">Keterangan:</label>
                                  <textarea class="form-control" id="Keterangan" name="Keterangan" placeholder="Isikan deskripsi tentang kategori"></textarea>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" >Simpan</button>
                              </div>
                          </form>
                      </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="AddSubCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Tambah Sub Kategori Baru</h4>
                      </div>
                      <div class="modal-body">
                          <form id="formAddSubCategory" name="formAddSubCategory" role="form" action="control/addSubCategory.php" method="POST">
                              <div class="form-group">
                              <label for="Category">Kelompok Kategori</label>
                              <select  class="form-control " name="indukCategory" id="induxCategory" required="required">
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
                              <label class="control-label">Kode Kategori</label>
                              <input type="text" required="required" class="form-control" placeholder="Kode Kategori" name="IdCategory">
                            </div>

                              <div class="form-group">
                                <label for="PublishName" class="control-label">Nama Kategori:</label>
                                <input type="text" required="required" name="CategoryName" class="form-control" placeholder="Nama Kategori">
                              </div>

                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" >Simpan</button>
                              </div>
                          </form>
                      </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="AddKindModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Tambah Jenis Koleksi Baru</h4>
                      </div>
                      <div class="modal-body">
                          <form id="formAddKind" name="formAddKind" role="form" action="control/addKind.php" method="POST">
                              <div class="form-group">
                                <label for="KindName" class="control-label">Jenis Koleksi:</label>
                                <input type="text" name="KindName" class="form-control" placeholder="Nama Kategori">
                              </div>
                              <div class="form-group">
                                  <label for="Ket" class="control-label">Keterangan:</label>
                                  <textarea class="form-control" id="Keterangan" name="Keterangan" placeholder="Isikan keyword Jenis Buku"></textarea>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" >Simpan</button>
                              </div>
                          </form>
                      </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="AddRakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Tambah Rak Koleksi</h4>
                      </div>
                      <div class="modal-body">
                          <form id="formAddRak" name="formAddRak" role="form" action="control/addRak.php" method="POST">
                              <div class="form-group">
                                <label for="KindName" class="control-label">Lokasi:</label>
                                <input type="text" name="Location" class="form-control" placeholder="Nama Kategori">
                              </div>
                              <div class="form-group">
                                  <label for="Ket" class="control-label">Keterangan:</label>
                                  <textarea class="form-control" id="Keterangan" name="Keterangan" placeholder="Isikan keyword Jenis Buku"></textarea>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" >Simpan</button>
                              </div>
                          </form>
                      </div>

                    </div>
                </div>
            </div>

          <!--END MODAL-->
