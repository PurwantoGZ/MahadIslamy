<div id="da-slider" class="da-slider" style="background-position: 1900% 0%;">
<?php 
include_once 'config/base.php';
$db = new BaseClass();
$result=$db->displayTable("select * from viewcollection limit 1,3");
if ($result->num_rows>0) {
	while ($row=$result->fetch_assoc()) {
		echo '<div class="da-slide da-slide-toleft">
	            <div class="container">
	              <div class="row">
	                <div class="col-md-12">
			              <h2>
			                <i>'.$row["Title"].'</i>			                
			                <br>
			                <i style="font-size:30px;">'.$row["AuthorName"].'</i>
			              </h2>
			              <p>
			                <i>'.$row["Description"].'</i>
			                <br>
			                <i>'.$row["Year"].'</i>
			              </p>
			              <a href="#" class="btn btn-info btn-lg da-link">
			                Read more
			              </a>
			              <div class="da-img">
			                <img style="width:360px;height: 400px;" src="admin/assets/images/collection/'.$row["Cover"].'" alt="image01">
			              </div>
	            	</div>
	          	  </div>
	        	</div>
      		</div>';
	}
}
 ?>
    </div>