<div class="container" >
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
            <div class="form-wrapper">
                  <form role="form" enctype="multipart/form-data" id="loginForm"  action="login-cek.php" class="form-signin wow fadeInUp" method="POST">
                  <h2 class="form-signin-heading">Login sirkulasi</h2>
                  <div class="login-wrap">
                    <div class="form-group text-center" id="error-teks"></div>
                    <div class="form-group ">
                      <input name="inpuser" id="inpuser" autofocus type="text" class="form-control" placeholder="Username" >
                    </div>
                    <div class="form-group ">
                      <input name="inppass" type="password" class="form-control has-warning" placeholder="Password">
                    </div>
                      <label class="checkbox">
                          <input type="checkbox" value="remember-me"> Remember me
                          <span class="pull-right">
                              <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                          </span>
                      </label>
                      <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
                  </div>
                </form>
            </div>
    </div>
  </div>
</div>