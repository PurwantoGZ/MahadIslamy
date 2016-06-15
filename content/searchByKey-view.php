<?php 
include_once 'config/base.php';
$db= new BaseClass();
$keywords=$_GET['keywords'];
$result=$db->displayTable('SELECT * FROM `viewcollection` WHERE Status LIKE "%'.$keywords.'%" OR SubCategory LIKE "%'.$keywords.'%" OR KindName LIKE "%'.$keywords.'%" OR  AuthorName LIKE "%'.$keywords.'%" OR  Year LIKE "%'.$keywords.'%" OR Title LIKE "%'.$keywords.'%"');
echo '<div class="breadcrumbs"></div>
      <div class="container" >
        <div class="row">';
if ($result->num_rows>0) {
	while ($row=$result->fetch_assoc()) {
		if ($row["Status"]=="Tersedia") {
			$enabled="label-info";
		}else{
			$enabled="label-danger";
		}
		echo '<div class="col-md-6">
          		<div class="blog-left wow fadeInLeft animated" data-wow-animation-name="fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
            		<div class="blog-img">
              			<img style="width:100%;height:350px;" src="admin/assets/images/collection/'.$row["Cover"].'" alt="">
            		</div>
            		<div class="row">
              			<div class="col-md-12">
                			<div class="blog-two-info">
                  				<p>
                    				<i class="fa fa-user"></i> Author: <a href="#"> '.$row["AuthorName"].'</a> |
                    				<i class="fa fa-calendar"></i> '.$row["Year"].' |
                    				<br>
                    				<i class="fa fa-tags">
                    				</i>
                    				Tags :
                    				<a href="#">
                      					<span class="label label-info">'.$row["KindName"].'</span>
                    				</a>
				                    <a href="#">
				                      <span class="label label-info">
				                        '.$row["SubCategory"].'
				                      </span>
				                    </a>
				                    <a href="#">
				                      <span class="label label-info">
				                       '.$row["Location"].'
				                      </span>
				                    </a>
				                    <a href="#">
				                      <span class="label '.$enabled.'">
				                        '.$row["Status"].'
				                      </span>
				                    </a>
                  				</p>
                			</div>
              			</div>
            		</div>
            		<div style="margin-top:-55px;" class="blog-content">
		              <h3>
		                '.$row["Title"].'
		              </h3>
		              <p>'.$row["Description"].'</p>
            		</div>
          		</div>
          </div>';
	}
}else{
	echo '<div class="gray-bg">
    <div class="fof">
            <!-- 404 error -->
        <div class="container  error-inner wow flipInX animated text-center" data-wow-animation-name="flipInX" style="visibility: visible; animation-name: flipInX;">
            <div class="text-center">
				<h1>404, Koleksi tidak ditemukan.</h1>
            <h4>Keywords yang dicari tidak cocok dengan koleksi yang ada. Silahkan ganti kata kunci yang sesuai dengan daftar koleksi yang tersedia</h4>
            <quote><i>"ttd : Administrator"</i></quote>
            </div>
        </div>
        <!-- /404 error -->
        </div>
    </div>';
}

echo '</div>
</div>';
 ?>

