<div class="breadcrumbs text-center">
    <div class="col-md-12">
          <h1>Profil Librarian</h1>
    </div>
</div>
<div class="container" id="tourpackages-carousel">
      <div class="row">
        <div class="profile">
        <?php 
        include_once 'config/base.php';
        $db= new BaseClass();
        $result=$db->displayTable('SELECT * FROM `mahad`.`employee`');
        if ($result->num_rows>0) {
          while ($row=$result->fetch_assoc()) {
            echo '<div class="col-md-4"><!--ONE PROFIL-->
                <div class="thumbnail wow fadeInUp animated" data-wow-delay=".1s" data-wow-animation-name="fadeInUp" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                  <img src="admin/assets/images/employee/'.$row["Foto"].'" alt="" style="width: 200px;height: 200px; margin-top: 20px;">
                  <div class="caption">
                    <h4 class="text-center">
                      <strong>'.$row["EmployeeName"].'</strong>
                    </h4>
                    <h6 class="text-center">'.$row["Job"].'</h6>
                    <address>
                        <p><i class="fa fa-home pr-10"></i>Address:'.$row["Address"].'<br>
                        <i class="fa fa-globe pr-10"></i>Webiste: www.mtsbanguntapan.sch.id <br>
                        <i class="fa fa-phone pr-10"></i>Mobile : (+62) '.$row["NoHandphone"].' <br>
                        <i class="fa fa-envelope pr-10"></i>Email :   <a href="javascript:;">'.$row["EmployeeName"].'@mtsbanguntapan.sch.id</a></p>
                    </address>
                  </div>
                </div>
              </div>';
          }
        }
         ?>
              <!--END ONE PROFIL-->
        </div>
        <!-- End row -->
      </div>
      <!-- End container -->
    </div>