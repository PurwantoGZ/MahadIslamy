<?php 
  $Jabatan=$_SESSION['Jabatan'];
 ?>
<a href="index.php" class="logo">
          <span class="logo-lg"><b>Sirkulasi</b></span>
        </a>
  <nav class="navbar navbar-static-top">
    <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse">
      
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
        </div>
      </form>
      
      <ul class="nav navbar-nav navbar-right">
        <li >
            <a href="lock.php"><span class="fa fa-lock"></span></a>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $Jabatan; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="admin.php?content=setuser"><span class="fa fa-cog"></span>Setting</a></li>
            <li class="divider"></li>
            <li><a href="../logout.php"><span class="fa fa-power-off"></span>Keluar</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

