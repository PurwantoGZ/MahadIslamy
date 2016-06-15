<?php 
  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
  session_start();
$_SESSION['lock']='yes';
$nama=$_SESSION['EmpName'];
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sirkulasi | Perpustakaan Mahad Islamy Banguntapan</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
              <div class="lockscreen-logo">
              <a href="../../index2.html"><b>Admin</b>PERPUSTAKAAN</a>
              </div>
            <!-- User name -->
              <div class="lockscreen-name"><b><strong><?php echo $nama; ?></strong></b></div>

              <!-- START LOCK SCREEN ITEM -->
              <div class="lockscreen-item">
                  <!-- lockscreen image -->
                  <div class="lockscreen-image">
                      <img src="assets/images/employee/<?php echo $_SESSION['Foto']; ?>" alt="User Image">
                  </div>
                  <!-- /.lockscreen-image -->

                  <!-- lockscreen credentials (contains the form) -->
                  <form class="lockscreen-credentials" method="POST" action="lock-cek.php" >
                        <div class="input-group">
                            <input type="password" name="lock-pwd" class="form-control" placeholder="password">
                            <div class="input-group-btn">
                                <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                            </div>
                        </div>
                  </form><!-- /.lockscreen credentials -->

              </div><!-- /.lockscreen-item -->

              <div class="help-block text-center">
                  Masukkan Password Anda untuk masuk lagi.
              </div>
              
              <div class="lockscreen-footer text-center">
              Copyright &copy; 2016-2020 <b><a href="localhost/mahad" class="text-black">Perpustakaan Mahad Islamy Banguntapan</a></b><br>
              All rights reserved
              </div>
    </div><!-- /.center -->

    <!-- jQuery 2.1.4 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
