    <!--container start-->
<div class="component-bg">
    <div class="container">
        <div class="bs-docs-section mar-b-30">
        <h1 id="forms" class="page-header">Buku Tamu</h1>
        <div class="bs-example">
    <form role="form" enctype="multipart/form-data" action="control/saveGuestIn.php" method="post" id="newGuestForm">
      <div class="form-group">
        <label for="exampleInputEmail1">Id Member/Id Siswa</label>
        <input type="text" autofocus class="form-control" name="guestId" id="guestId" required placeholder="Isikan Id Member atau Id Siswa">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Nama Lengkap</label>
        <input type="text" disabled class="form-control" id="guestName" placeholder="Isikan Nama Anda">
      </div>
      <div class="form-group">
        <label for="exampleInputFile">Pesan</label>
        <textarea class="form-control" name="Message" rows="3" placeholder="Isikan Kritik atau Pesan yang membangun"></textarea>
      </div>
      <div class="form-group text-right">
        <input type="submit" class="btn btn-lg btn-info btn-flat">
      </div>
    </form>
  </div><!-- /example -->
        </div>
    </div>
</div>
    <!--container end-->