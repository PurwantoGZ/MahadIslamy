<!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Portfolio 4 column</h1>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Portfolio</a></li>
                        <li class="active">Portfolio 4 Column</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->


    <!--container start-->
    <div class="container">
      <div class="row">
            <div class="col-lg-9">
              <div class="blog-item">
                  <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <ul id="filters" class="clearfix">
                                <li><span class="filter active" data-filter="app card icon logo web">All</span></li>
                                <li><span class="filter" data-filter="app">App</span></li>
                                <li><span class="filter" data-filter="card">Card</span></li>
                                <li><span class="filter" data-filter="icon">Icon</span></li>
                                <li><span class="filter" data-filter="logo">Logo</span></li>
                                <li><span class="filter" data-filter="web">Web</span></li>
                            </ul>
                        </div>
                    </div>
                </div><!--////-->

                <div class="container">
                    <div class="row mar-b-30">
                            <div id="portfoliolist">
                                <div class="col-sm-12">
                                <?php 
                                    for ($i=0; $i <5 ; $i++) { 
                                        echo '<div class="portfolio logo" data-cat="logo">
                                        <div class="portfolio-wrapper">
                                            <div class="portfolio-hover">
                                                <div class="image-caption">
                                                    <a href="img/portfolios/logo/5.jpg" class="label magnefig label-info icon" data-toggle="tooltip" data-placement="left" title="Zoom"><i class="fa fa-eye"></i></a>
                                                    <a href="blog-detail.html" class="label label-info icon" data-toggle="tooltip" data-placement="top" title="Details"><i class="fa fa-link"></i></a>
                                                    <a href="#" class="label label-info icon" data-toggle="tooltip" data-placement="right" title="Likes"><i class="fa fa-heart"></i></a>

                                                </div>
                                                <img src="img/portfolios/logo/5.jpg" alt="" />

                                            </div>
                                        </div>
                                    </div>';
                                    }
                                 ?>

                                    <!--END PORTOFOLIO-->

                                </div>
                            </div>
                    </div>
                </div>
              </div>
                
            </div><!--END COL 9-->
        
            <div class="col-lg-3">
                <div class="blog-side-item">
                    <div class="search-row">
                        <input id="akucoba" type="text" class="form-control" placeholder="Search here">
                    </div>
                    <div class="category">
                      <h3>
                        Categories
                      </h3>
                      <ul class="list-unstyled">
                        <li>
                          <a href="javascript:;">
                            <i class="fa fa-angle-right pr-10">
                            </i>
                            Animals
                          </a>
                        </li>
                        <li>
                          <a href="javascript:;">
                            <i class="fa fa-angle-right pr-10">
                            </i>
                            Landscape
                          </a>
                        </li>
                        <li>
                          <a href="javascript:;">
                            <i class="fa fa-angle-right pr-10">
                            </i>
                            Portait
                          </a>
                        </li>
                        <li>
                          <a href="javascript:;">
                            <i class="fa fa-angle-right pr-10">
                            </i>
                            Wild Life
                          </a>
                        </li>
                        <li>
                          <a href="javascript:;">
                            <i class="fa fa-angle-right pr-10">
                            </i>
                            Video
                          </a>
                        </li>
                      </ul>
                    </div><!--END CATEGORY-->
                </div><!--END BLOG SIDE-->

            </div> <!--END COL 3-->
      </div> <!--END ROW-->
    </div><!--END CONTAINER-->
    <!--container end-->