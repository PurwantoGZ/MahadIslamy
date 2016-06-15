<div class="col-md-12">
  <div class="box box-info  box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Masukkan Id Anggota dengan keyboard /Barcode Scanner</h3>
    
    </div><!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" action="control/startTransaction.php" method="POST" enctype="multipart/form-data">
      <div class="box-body">
        <div class="form-group">
          <div class="col-sm-4">
            <input type="text" class="form-control" id="idMember" name="idMember" placeholder="Id Anggota">
          </div>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-info pull-left">Mulai Transaksi</button>
          </div>
        </div>
      </div><!-- /.box-body -->
    </form>

  </div><!-- /.box -->
</div>
