<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="assets/images/employee/<?php echo $_SESSION['Foto']; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php $nama = $_SESSION['EmpName'];echo $nama;?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview <?php if (isset($_GET['content'])) {if ($_GET['content'] == 'home') {echo "active";}}?>">
              <a href="?content=home">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>

            </li>

            <li class="treeview <?php if (isset($_GET['content'])) { if (($_GET['content'] == 'member') || ($_GET['content'] == 'employee') || ($_GET['content'] == 'collection') || ($_GET['content'] == 'inventory')) {echo "active";}}?>">
              <a href="?content">
                <i class="fa fa-laptop"></i>
                <span>Master Data</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?content=member"><i class="fa fa-circle-o"></i> Data Anggota</a></li>
                <li><a href="?content=employee"><i class="fa fa-circle-o"></i> Data Petugas</a></li>
                <li><a href="?content=collection"><i class="fa fa-circle-o"></i> Data Koleksi</a></li>
              </ul>
            </li>

            <li class="treeview <?php if (isset($_GET['content'])) {
	if ($_GET['content'] == 'transaction') {
		echo "active";
	}
}?>">
              <a href="?content=transaction">
                <i class="fa fa-edit">
                </i> <span>Transaksi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?content=transaction"><i class="fa fa-circle-o"></i> Pinjam/Kembali</a></li>
                <li><a href="?content=listRenewMember"><i class="fa fa-circle-o"></i> Perpanjang Kartu Anggota</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="?content=barcodemember">
                <i class="fa fa-barcode"></i>
                <span>Barcode Generator</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="content/barcode-member-print.php?id=purwanto" target="_blank"><i class="fa fa-circle-o"></i> Member ID</a></li>
                <li><a href="?content=barcodecollection"><i class="fa fa-circle-o"></i> Data Koleksi </a></li>
                <li><a href="?content=barcodeemployee"><i class="fa fa-circle-o"></i> ID Petugas</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?content=reportmember"><i class="fa fa-circle-o"></i> Data Anggota</a></li>
                <li><a href="?content=report"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
                <li><a href="?content=report"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
                <li><a href="?content=report"><i class="fa fa-circle-o"></i> Data Koleksi</a></li>
              </ul>
            </li>
            <li><a href="?"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">PENGATURAN</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Backu Data</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?"><i class="fa fa-circle-o"></i>Denda</a></li>
                <li><a href="?"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
                <li><a href="?"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
                <li><a href="?"><i class="fa fa-circle-o"></i> Data Koleksi</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Pengaturan Data</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?"><i class="fa fa-circle-o"></i>Denda</a></li>
                <li><a href="?"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
                <li><a href="?"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
                <li><a href="?"><i class="fa fa-circle-o"></i> Data Koleksi</a></li>
              </ul>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
