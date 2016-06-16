<?php
error_reporting(E_ALL^(E_NOTICE|E_WARNING));
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Sirkulasi | Perpustakaan Mahad Islamy Banguntapan</title>
   <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  
  <!--Include CSS-->
  <!-- Bootstrap 3.3.2 -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" href="assets/awesome/font-awesome.min.css">
    <link rel="stylesheet" href="assets/awesome/ionicons.min.css">    
    <!-- DATA TABLES -->
    <link href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/dist/css/summernote.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="assets/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="assets/extendcss/amaran.min.css">
    <link rel="stylesheet" type="text/css" href="assets/extendcss/animate.min.css">
<!--END CSS-->

    <!--CSS PRINT BOOTSRTAP-->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" media="all" >
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

  </head>
  <body id="bodyAdmin" class="skin-blue">
    <div class="wrapper">

      <!-- Header Start -->
      <header class="main-header" id="sideHeader">
<?php include_once 'include/header.php';?>
</header>
      <!-- Header End -->

      <!-- Sidebar Start -->
      <!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<?php include_once 'include/sidebar.php';?>
</aside>
      <!-- Left side column. contains the logo and sidebar -->
        

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <?php
            if ($_SESSION['notif'] == "success") {
            ?>
            <div class="breadcrumb alert-success fade in" id="success-alert">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $_SESSION['message'];
            $_SESSION['notif']   = null;
            $_SESSION['message'] = null;
            ?>
            </div>
            <?php
            }
            if ($_SESSION['notif'] == "danger") {
            ?>
            <div class="breadcrumb alert-danger fade in" id="danger-alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $_SESSION['message'];
            $_SESSION['notif']   = null;
            $_SESSION['message'] = null;
            ?>
            </div>
            <?php
            }
            ?>
          
        </section>
        <section class="content">

<!--NOTIFICATION-->

<!--END NOTIFICATION-->
<?php
if (isset($_GET['content'])) {
  if ($_GET['content']=='setuser') {
    include_once 'content/setting-user.php';
  }

	if ($_GET['content'] == 'home') {
		include_once 'content/main.php';
	} elseif ($_GET['content'] == 'member') {
		include_once 'content/addmember.php';
		include_once 'content/member.php';
	} elseif ($_GET['content'] == 'employee') {
      if (isset($_SESSION['akses'])) {
          if ($_SESSION['akses']=='admin') {
              include_once 'content/addemployee.php';
              include_once 'content/employee.php';
          }else{
            include_once 'content/notfound.php';
          }
      }
	} elseif ($_GET['content'] == 'collection') {
		include_once 'content/addcollection.php';
		include_once 'content/collection.php';
	} elseif ($_GET['content'] == 'inventory') {
		include_once 'content/inventory.php';
	} elseif ($_GET['content'] == 'transaction') {
		include_once 'content/transaction.php';
	}elseif ($_GET['content'] == 'barcodemember') {
    include_once 'content/barcode-member-print.php';
  }elseif ($_GET['content'] == 'barcodecollection') {
    include_once 'content/barcode-collection.php';
  }elseif ($_GET['content'] == 'barcodeemployee') {
    include_once 'content/barcode-employee.php';
  }elseif($_GET['content']=='reportmember'){
    ?>
      <div class="row">
          <div class="col-md-6">
            <div class="btn-group">
                <button id="rptm1" type="button" class="btn btn-default" title="Tabulasi Total" alt="Tabulasi Total"> <i class="fa fa-table"></i> </button>
                <button id="rptm2" type="button" class="btn btn-default" title="Tabulasi Per Semester" alt="Tabulasi Per Semester"> <i class="fa fa-list-alt"></i> </button>
                <button id="rptm3" type="button" class="btn btn-default" title="Grafik" alt="Grafik"> <i class="fa fa-bar-chart-o"></i> </button>
            </div>
          </div><!-- /.col -->
          <!--FILTER KATEGORI-->
          <div id="divFilter1" class="col-md-6" style="margin-bottom:15px;">
            <form role="form" class="form-inline text-right" method="post" action="">
                <div class="form-group">
                    <label>Pilih Kategori:</label>
                        <select class="form-control">
                            <option value="">Penerbit</option>
                            <option value="">Penulis</option>
                            <option value="">Kategori Koleksi</option>
                            <option value="">Jenis Koleksi</option>
                            <option value="">Rak</option>
                            <option value="">Status</option>
                        </select>
                    </div>
                <div class="form-group">
                    <label>Kata Kunci:</label>
                    <select class="form-control">                   
                    </select>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Lihat</button>
                </div>
            </form>
          </div>
          <!--END FILTER-->
      </div><!--/.row-->
      <br>
      <div id="contentreportmember" class="row">
      </div>
    <?php
  }elseif ($_GET['content']=='listRenewMember') {
    include_once 'content/list-expired-member.php';
  }




} else {
	include_once 'content/main.php';
}
?>
</section>
      </div>
      <!-- /.content-wrapper -->
      
    </div><!-- ./wrapper -->

<!--Include JS-->
<!-- jQuery 2.1.3 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/app.min.js" type="text/javascript"></script>
    <script src="assets/dist/js/summernote.js" type="text/javascript"></script>
    <script src="assets/dist/js/summernote.min.js" type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
  
    <script type="text/javascript" src="assets/plugins/lobibox/lobibox.js"></script>
    <script type="text/javascript" src="assets/plugins/lobibox/messageboxes.js"></script>
    <script type="text/javascript" src="assets/plugins/lobibox/notifications.js"></script>
    <!--JQUERY NOTIFICATION-->
    <script type="text/javascript" src="assets/extenedjs/jquery.amaran.js"></script>
    <script type="text/javascript" src="assets/extenedjs/jquery.amaran.min.js"></script>
    <script type="text/javascript" src="assets/extenedjs/jquery.select.js"></script>
    <script type="text/javascript" src="assets/extenedjs/imagepreview.js"></script>
<!--END JS-->


<script type="text/javascript">

</script>
<script type="text/javascript">
  $('#tabReturnClick').click(function() {
    $.ajax({
        url:"control/show-list-return-full.php",
        cache:false,
        success:function(table){
          $('#tabReturnClickTable').html(table);
        }
      });
  });
  $('#SearchIdCollReturn').on('input', function() {
    var idSearch=$('#SearchIdCollReturn').val();
    $.ajax({
        url:"control/show-list-return-full.php",
        cache:false,
        data:"SearchIdCollReturn="+idSearch,
        success:function(table){
          $('#tabReturnClickTable').html(table);
        }
      });
  });

  $('#SearchIdCollLoan').on('input', function() {
    /* Act on the event */
    var idSeacrhColl=$('#SearchIdCollLoan').val();
    $.ajax({
      url: 'control/listCollById.php',
      cache:false,
      data:"SearchIdCollLoan="+idSeacrhColl,
      success:function(table){
        $('#tabLoanClickTable').html(table);
      }
    });
    
  });
</script>

<script type="text/javascript">
  $('#rptm1').click(function(){
      $('#divFilter1').attr("hidden","hidden");
      $.ajax({
          url:"content/report-member-full.php",
          cache:false,
          success:function(data){
            $('#contentreportmember').html(data);
          }
      });
      $.ajax({
        url:"control/show-report-member-full.php",
        cache:false,
        success:function(table){
          $('#rpmember').html(table);
        }
      });
    });

  $('#rptm2').click(function(){
      $('#divFilter1').attr("visible","visible");
      $.ajax({
          url:"content/report-member-filter.php",
          cache:false,
          success:function(data){
            $('#contentreportmember').html(data);

          }
      });
    });
  $('#rptm3').click(function(){
      $('#divFilter1').attr("hidden","hidden");
      $.ajax({
          url:"content/report-member-grafik.php",
          cache:false,
          success:function(data){
            $('#contentreportmember').html(data);
          }
      });
    });
</script>

<script type="text/javascript">
//Date range picker
      $('#reservation').daterangepicker({
        format:'MM/DD/YYYY'
      });
        //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true, 
        timePickerIncrement: 30, 
        format: 'MM/DD/YYYY h:mm A'});

      $("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
          $("#success-alert").alert('close');
      });

      $("#info-alert").fadeTo(3000,500).slideUp(500,function(){
        $("#info-alert").alert('close');
      });

      $("#warning-alert").fadeTo(3000,500).slideUp(500,function(){
        $("#warning-alert").alert('close');
      });

      $("#danger-alert").fadeTo(3000,500).slideUp(500,function(){
        $("#danger-alert").alert('close');
      });
</script>
 <!--JS Pilih Category SubCategory-->
<script type="text/javascript">
  $(document).ready(function(){
    $('#Category').change(function(){
    var idGet=$('#Category').val();
    $.ajax({
        url: "control/getSubCategory.php",
        data: "idCategory="+idGet,
        cache: false,
        success: function(msg){
            $("#SubCategory").html(msg);
        }
    });
    });

    $('#Categoryku').change(function(){
    var idGet=$('#Categoryku').val();
    $.ajax({
        url: "control/getSubCategory.php",
        data: "idCategory="+idGet,
        cache: false,
        success: function(msg){
            $("#SubCategoryku").html(msg);
        }
    });
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){

      $('#formAddAuthor').submit(function(){

        $.ajax({
          type:'POST',
          url:$(this).attr('action'),
          data:$(this).serialize(),
          success:function(data){
            $('#formAddAuthor').trigger("reset");
            $('#AddAuthorModal').hide();
            //Tampil Data
            $.get("control/showAuthor.php",function (dataAuthor){
                $('#AuthorSelect').html(dataAuthor);
            });
            //end Tampil Data
            var pesan=data;
              $.amaran({
                  content:{
                    bgcolor:'#1ABC9C',
                    color:'#ffffff',
                    message:pesan
                  },
                  theme:'colorful'
              });
          }

        })
        return false;
      });

  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#formAddPublish').submit(function(){
        $.ajax({
          type:'POST',
          url:$(this).attr('action'),
          data:$(this).serialize(),
          success:function(data){
            $('#formAddPublish').trigger("reset");
            $('#AddPublishModal').hide();
            $.get("control/showPublisher.php",function (dataPublisher){
                $('#Publisher').html(dataPublisher);
            });
            $.amaran({
                  content:{
                    bgcolor:'#1ABC9C',
                    color:'#ffffff',
                    message:'Penerbit baru ditambahkan'
                  },
                  theme:'colorful'
              });
          }

        })
        return false;
      });
  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#formAddCategory').submit(function(){
        $.ajax({
          type:'POST',
          url:$(this).attr('action'),
          data:$(this).serialize(),
          success:function(data){
            $('#formAddCategory').trigger("reset");
            $('#AddCategoryModal').hide();
            $.get("control/showCategory.php",function(dataCategory){
              $('#Category').html(dataCategory);
            });
            $.get("control/showCategory.php",function(dataCategory){
              $('#induxCategory').html(dataCategory);
            });
            $.amaran({
                  content:{
                    bgcolor:'#1ABC9C',
                    color:'#ffffff',
                    message:'Kategori baru ditambahkan'
                  },
                  theme:'colorful'
              });

          }

        })
        return false;
      });

    $('#formAddSubCategory').submit(function(){
      $.ajax({
        type:'POST',
        url:$(this).attr('action'),
        data:$(this).serialize(),
        success:function(data){
          $('#formAddSubCategory').trigger("reset");
          $('#AddSubCategoryModal').hide();
          $.get("control/showSubCategory.php",function(dataSubCategory){
            $('#SubCategory').html(dataSubCategory);
          });
          $.amaran({
                  content:{
                    bgcolor:'#1ABC9C',
                    color:'#ffffff',
                    message:'Kategori baru ditambahkan'
                  },
                  theme:'colorful'
              });
        }
      })
      return false;
    });
  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#formAddKind').submit(function(){
        $.ajax({
          type:'POST',
          url:$(this).attr('action'),
          data:$(this).serialize(),
          success:function(data){
            $('#formAddKind').trigger("reset");
            $('#AddKindModal').hide();
            $.get("control/showKind.php",function(dataKind){
              $('#Kind').html(dataKind);
            });
            $.amaran({
                  content:{
                    bgcolor:'#1ABC9C',
                    color:'#ffffff',
                    message:'Jenis baru ditambahkan'
                  },
                  theme:'colorful'
              });

          }

        })
        return false;
      });
  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#formAddRak').submit(function(){
        $.ajax({
          type:'POST',
          url:$(this).attr('action'),
          data:$(this).serialize(),
          success:function(data){
            $('#formAddRak').trigger("reset");
            $('#AddRakModal').hide();
            $.get("control/showShelf.php",function(dataShelf){
              $('#Shelf').html(dataShelf);
            });
            $.amaran({
                  content:{
                    bgcolor:'#1ABC9C',
                    color:'#ffffff',
                    message:'Rak berhasil ditambahkan'
                  },
                  theme:'colorful'
              });
          }

        })
        return false;
      });
  })
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#formInsertCollection1').submit(function(){
        $.ajax({
          type:'POST',
          url:$(this).attr('action'),
          data:$(this).serialize(),
          success:function(){
            $('#divCollection').load("../admin.php?content=collection");
            //$('#sideHeader').load("../admin.php?content=setuser");
            //$('#Newtab').load("../admin.php?content=setuser");
            $.amaran({
                  content:{
                    bgcolor:'#1ABC9C',
                    color:'#ffffff',
                    message:'Rak berhasil ditambahkan'
                  },
                  theme:'colorful'
              });
          }

        })
        return false;
      });
  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#newFormPetugas').submit(function(){
        $.ajax({
          type:'POST',
          url:$(this).attr('action'),
          data:$(this).serialize(),
          success:function(){
            $('#sideHeader').load("../admin.php?content=setuser");
            $('#Newtab').load("../admin.php?content=setuser");
            $.amaran({
                  content:{
                    bgcolor:'#1ABC9C',
                    color:'#ffffff',
                    message:'Rak berhasil ditambahkan'
                  },
                  theme:'colorful'
              });
          }

        })
        return false;
      });
  })
</script>
<script type="text/javascript">
  $('#EditModalEmp').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget)
    var idEmp=button.data('id')
    var namaEmp=button.data('name')
    var nikEmp=button.data('nik')
    var jobEmp=button.data('job')
    var hp=button.data('hp')
    var alamatEmp=button.data('address')
    var foto=button.data('foto')
    $('#IdEmployee').val(idEmp);
    $('#NikEmployee').val(nikEmp);
    $('#NamaEmployee').val(namaEmp);
    $('#AddressEmpku').val(alamatEmp);
    $('#HpEmployee').val(hp);
    $('#oldFotoEmp').val(foto);
    $('#uploadPreview6').attr("src","assets/images/employee/"+foto);
    $('#JobEmployee option').each(function(){
      if ($(this).text() == jobEmp) {
        $(this).attr('selected', 'selected');
      }
    });
    $('#TitleModalEmp').text("Edit Data -"+idEmp);
  });
</script>
<script type="text/javascript">
  $('#UpdateCollectionModal').on('show.bs.modal',function(event){
    var button=$(event.relatedTarget)
    var idColl=button.data('id')
    var title=button.data('name')
    var isbn=button.data('isbn')
    var author=button.data('author')
    var publisher=button.data('publisher')
    var year=button.data('year')
    var category=button.data('category')
    var kind=button.data('kind')
    var rak=button.data('shelf')
    var jumlah=button.data('count')
    var status=button.data('status')
    var cover=button.data('cover')
    var modal=$(this)
    $('#idCollku').val(idColl);
    $('#ISBNku').val(isbn);
    $('#Titleku').val(title);
    $('#Yearku').val(year);
    $('#Countkuku').val(jumlah);
    $('#OldCover').val(cover);
    $('#uploadPreview2').attr("src","assets/images/collection/"+cover);
    $('#AuthorSelectku  option').each(function(){
      if($(this).text() == author) {
          $(this).attr('selected', 'selected');
      }
    });
    $('#Publisherku option').each(function(){
      if($(this).text() == publisher) {
          $(this).attr('selected', 'selected');
      }
    });
    $('#SubCategoryku option').each(function(){
      if($(this).text() == category) {
          $(this).attr('selected', 'selected');
      }
    });
    $('#Kindku option').each(function(){
      if($(this).text() == kind) {
          $(this).attr('selected', 'selected');
      }
    });
    $('#Shelfku option').each(function(){
      if($(this).text() == rak) {
          $(this).attr('selected', 'selected');
      }
    });
    modal.find('.modal-title').text('Edit Data , ' + idColl)
  });
</script>
<script type="text/javascript">
  $('#EditModal').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget)
      var idData = button.data('id')
      var namaData=button.data('name')
      var genderData=button.data('gender')
      var classData=button.data('class')
      var daftarData=button.data('tgldaftar')
      var expiredData=button.data('expired')
      var status=button.data('status')
      var alamatData=button.data('address')
      var foto=button.data('foto');
      $('#uploadPreview4').attr("src","assets/images/member/"+foto);
      var modal = $(this)
      $('#idAnggota').val(idData);
      $('#NamaAnggota').val(namaData);
      $('#oldProfil').val(foto);
      //$('#KelasAnggota option:selected').text(classData);
      //KelasAnggota
      $('#KelasAnggota option').each(function() {
      if($(this).text() == classData) {
          $(this).attr('selected', 'selected');
      }
      });
      if (genderData=="Laki-laki") {
        $('#gender1').prop("checked", true);
      }else{
        $('#gender2').prop("checked", true);
      }
      $('#Addressku').val(alamatData);
      $('#tglDaftarku').val(daftarData);
      $('#tglExpiredku').val(expiredData);
      $('#Statusku').val(status);
      modal.find('.modal-title').text('Edit Data , ' + idData)
    });

  $('#delModal').on('show.bs.modal', function(event){
      var button=$(event.relatedTarget)
      var idData=button.data('id')
      var modal=$(this)
      modal.find('.modal-body h5').text('Ingin hapus data '+idData)
      modal.find('.modal-body input').val(idData)
  });
  $('#delCollectionModal').on('show.bs.modal', function(event){
      var button=$(event.relatedTarget)
      var idData=button.data('id')
      var oldCover=button.data('cover')
      var modal=$(this)
      modal.find('.modal-body h5').text('Ingin hapus data '+idData)
      $('#idDelColl').val(idData);
      $('#delCover').val(oldCover);
  });

  $('#delModalEmp').on('show.bs.modal', function(event){
      var button=$(event.relatedTarget)
      var idData=button.data('id')
      var foto=button.data('foto')
      var modal=$(this)
      $('#delFotoEmp').val(foto);
      $('#idDelEmp').val(idData);
      modal.find('.modal-body h5').text('Ingin hapus data '+idData)
  });

  $('#delMemberModal').on('show.bs.modal', function(event){
      var button=$(event.relatedTarget)
      var idData=button.data('id')
      var foto=button.data('foto')
      var modal=$(this)
      modal.find('.modal-body h5').text('Ingin hapus data '+idData)
      modal.find('.modal-body input').val(idData)
      $('#oldNewPhoto').val(foto);
  });

   $('#newRegristationModal').on('show.bs.modal', function(event){
      var button=$(event.relatedTarget)
      var idData=button.data('id')
      var foto=button.data('foto')
      var modal=$(this)
      modal.find('.modal-body h5').text('Ingin Perpanjang Anggota - '+idData)
      $('#idNewMem').val(idData);
  });
  function priviewImage(input){
          if (input.files && input.files[0]) {
            var reader =new FileReader();

            reader.onload=function(e){
              $('#profil').attr('src',e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }

    $("#fileToUpload").change(function(){
      priviewImage(this);
    });

</script>

<script type="text/javascript">
     $(function () {
        $('#tableMember').dataTable();
        $('#tableCollection').dataTable({
          bAutoWidth:false
        });
        $('#tableEmployee').dataTable({
          bAutoWidth:false
        });
        $('#loanTable').dataTable({
          bAutoWidth:false
        });
        $('#loanHistoryTable').DataTable({
          bAutoWidth:false
        });
        $('#tabLoanClickTable').DataTable({
          bAutoWidth:false
        });
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });

</script>
<script>
  var submitted = false;

  function canSubmit() {
   if(submitted) return false;
   submitted = true;
   return true;
  }
</script>

<script type="text/javascript">
    function PreviewImage(no) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage"+no).files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview"+no).src = oFREvent.target.result;
        };
    }
</script>
<!--
<script type="text/javascript">
    var password = document.getElementById("passwordEmp"), confirm_password = document.getElementById("confirmpasswordEmp");
    function validatePassword(){
      if(password.value != confirm_password.value) {
          confirm_password.setCustomValidity("Passwords tidak sama");
        } else {
          confirm_password.setCustomValidity('');
        }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
-->
<!--JS BUTTON CHECKED UNCHECKED-->
<script type="text/javascript">
  $('#checkboxButton1').click(function (){
    $('#UpdateButton1').attr("disabled",!this.checked);
  });
  $('#checkboxButton2').click(function (){
    $('#insertButton2').attr("disabled",!this.checked);
  });
  $('#checkboxButton4').click(function (){
    $('#UpdateButton4').attr("disabled",!this.checked);
  });
  $('#checkboxButton6').click(function (){
    $('#UpdateButton6').attr("disabled",!this.checked);
  });
  $('#checkboxButton5').click(function (){
    $('#insertButton5').attr("disabled",!this.checked);
  });
  $('#checkboxButton7').click(function (){
    $('#insertButton7').attr("disabled",!this.checked);
  });
  $('#checkboxButton8').click(function (){
    $('#insertButton8').attr("disabled",!this.checked);
  });
  $('#checkboxButton9').click(function (){
    $('#insertButton9').attr("disabled",!this.checked);
  });
  $('#checkboxButton10').click(function (){
    $('#insertButton10').attr("disabled",!this.checked);
  });

  $('#checkboxButton11').click(function (){
    $('#insertButton11').attr("disabled",!this.click);
  });

  $('#checkboxDaftar').click(function (){
    $('#tglDaftarku').attr("readonly",!this.checked);
  });
</script>
  </body>
</html>
