<?php 
$id=$_GET['idSearch'];
if ($id=='saya') {
	echo '<div class="breadcrumbs"></div>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="blog-left wow fadeInLeft">
            <div class="blog-img">
              <img src="img/blog/img8.jpg" alt=""/>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="blog-two-info">
                  <p>
                    <i class="fa fa-user">
                    </i>
                    by
                    <a href="#">
                      John
                    </a>

                    |
                    <i class="fa fa-calendar">
                    </i>
                    Sept 16th, 2012
                    |
                    <i class="fa fa-comment">
                    </i>

                    <a href="#">
                      3 Comments
                    </a>
                    |
                    <i class="fa fa-share">
                    </i>

                    <a href="#">
                      39 Shares
                    </a>
                    <br>
                    <i class="fa fa-tags">
                    </i>
                    Tags :
                    <a href="#">
                      <span class="label label-info">
                        Snipp
                      </span>
                    </a>

                    <a href="#">
                      <span class="label label-info">
                        Bootstrap
                      </span>
                    </a>

                    <a href="#">
                      <span class="label label-info">
                        UI
                      </span>
                    </a>

                    <a href="#">
                      <span class="label label-info">
                        growth
                      </span>
                    </a>
                  </p>
                </div>
              </div>
            </div>
            <div class="blog-content">
              <h3>
                '.$id.'
              </h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
            <button class="btn btn-primary">
              Read More
            </button>

          </div>
		</div>
	</div>
</div>';
}
 ?>