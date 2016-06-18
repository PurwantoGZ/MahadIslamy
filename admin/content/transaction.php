<?php
require_once '../config/base.php';
$db       = new BaseClass();
$idLoans  = $db->getAutoId("select max(right(loans.IdLoans,4))as 'IdLoans' from mahad.loans;", "PJ16");

$idMember = $_SESSION['IdAnggota'];
$stmt=$db->displayTable('SELECT * FROM `loans`,`detailloans` WHERE `detailloans`.`Ket`="OK" and `detailloans`.`IdLoans`=`loans`.`IdLoans` AND `loans`.`IdMember`='.$idMember.'');
$CountLoans=$stmt->num_rows;
$Ket="No";
$stmt2=$db->displayTable('SELECT * FROM mahad.`return` WHERE mahad.`return`.`IdMember`='.$idMember.';');
$countReturn=$stmt2->num_rows;
$stmt3=$db->displayTable('SELECT * FROM DataLoans where IdMember='.$idMember.';');
$countHistory=$stmt3->num_rows;
$totalDay=0;
$totalPay=0;
?>
<div class="row">

<?php
if (isset($_GET['viewTrans'])) {
	if ($_GET['viewTrans'] == '1') {
		?>
		<div class="col-md-3">
		<!-- Profile Image -->
				<div class="box box-primary">
					<div class="box-body box-profile">
            <div style="padding-right: 20px;padding-left: 20px;padding-top: 10px;">
              <img style="width: 175px;height: 200px;border:1px solid #fff;" src="assets/images/member/<?php echo $_SESSION['FotoMember']; ?>" alt="User profile picture">
            </div>		
  					<h3 class="profile-username text-center"><?php echo $_SESSION['NamaAnggota'];?></h3>
  					<p class="text-muted text-center"><?php echo $_SESSION['Kelasnya'];?></p>
  					<ul class="list-group list-group-unbordered">
      					<li class="list-group-item">
      						<b>Peminjaman</b> <a class="pull-right"><?php echo $CountLoans;?></a>
      					</li>
      					<li class="list-group-item">
      						<b>Pengembalian</b> <a class="pull-right"><?php echo $countReturn;?></a>
      					</li>
      					<li class="list-group-item">
      						<b>History</b> <a class="pull-right"><?php echo $countHistory;?></a>
      					</li>
  					</ul>
  					<a href="?content=transaction&viewTrans=0" class="btn btn-primary btn-block"><b>Selesai</b></a>
				  </div><!-- /.box-body -->
				</div><!-- /.box -->

    </div><!-- /.col -->

    <div class="col-md-9">
				<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
            <?php
		        if ($db->ValueCheck("loans", "IdMember='$idMember' and Count>'0'") == true) {
			      ?>
			         <li class="active"><a href="#listLoan" data-toggle="tab"><span class="fa fa-list"></span> List Peminjaman</a></li>
			         <li id="tabReturnClick"><a href="#return" data-toggle="tab"><span class="fa fa-cart-arrow-down"></span> Pengembalian</a></li>
			         <li><a href="#debt" data-toggle="tab"><span class="fa fa-money"></span> Denda</a></li>
			         
			      <?php
		        } else {
			       ?>
			         <li class="active"><a href="#loan" data-toggle="tab"><span class="fa fa-cart-plus"></span> Peminjaman</a></li>
			       <?php
		        }
		        ?>
		        <li><a href="#loanHistory" data-toggle="tab"><span class="fa fa-history"></span> History Peminjaman</a></li>
		        </ul>
						<div class="tab-content">
						<!--TABULASI List PEMINJAMAN -->
		        <?php
		if ($db->ValueCheck("loans", "IdMember='$idMember' and Count>'0'") == true) {
			?>
			<div class="active tab-pane" id="listLoan">
					<table id="listLoanTable" class="table table-hover table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>ID Pinjam</th>
									<th>ID Koleksi</th>
									<th>Judul Koleksi</th>
									<th>TGl.Pinjam</th>
									<th>TGL.Jatuh Tempo</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
			<?php
			$j      = 1;
			$result = $db->displayTable("SELECT * FROM DataLoans where IdMember='$idMember' and Status='Dipinjam'");
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					?>
								<tr>
									<td><?php echo $j;?></td>
									<td><?php echo $row['IdLoans'];?></td>
									<td><?php echo $row['IdCollection'];?></td>
									<td><?php echo $row['Title'];?></td>
									<td><?php echo $row['DateLoans'];?></td>
									<td><?php echo $row['ExpiredLoans'];?></td>
									<td><?php echo $row['Status'];?></td>
								</tr>
					<?php
					$j++;
				}
			}
			?>
			         </tbody>
					</table>
		</div>

    <!--TABULASI PENGEMBALIAN-->
				<div class=" tab-pane" id="return">
					<div class="box box-primary box-solid">
                		<div class="box-header with-border">
                  			<h3 class="box-title"></h3>
                  			<div class="box-tools pull-right">
                    			<div class="has-feedback">
                      				<input type="text" class="form-control input-sm" id="SearchIdCollReturn" placeholder="Id Koleksi">
                      				<span class="glyphicon glyphicon-search form-control-feedback"></span>
                    			</div>
                  			</div><!-- /.box-tools -->
                		</div><!-- /.box-header -->
		                <div class="box-body no-padding">
			                  <div class="table-responsive mailbox-messages">
			                    <table id="tabReturnClickTable" class="table table-hover table-striped">
			                    </table><!-- /.table -->
			                  </div><!-- /.mail-box-messages -->
		                </div><!-- /.box-body -->
                		<div class="box-footer no-padding">
                		</div>
              		</div>
				</div><!-- /.tab-pane -->
 <!--END TABULASI PENGEMBALIAN-->

  <!--TABULASI DENDA-->
	<div class="tab-pane" id="debt">

    <div class="modal-body">
    	<div class="table-responsive">
		<table id="debtTable" class="table table-hover table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>ID Koleksi</th>
						<th>Judul Koleksi</th>
						<th>TGl.Pinjam</th>
						<th>TGL.Jatuh Tempo</th>
						<th>Denda(Hari)</th>
						<th>Denda(Rp.)</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$debtCount=1;
				$result=$db->getDebtData($idMember);
				if ($result->num_rows>0) {
					while ($row = $result->fetch_assoc()) {
						?>
						<tr <?php if ($debtCount%2==0) {
							echo "bgcolor=#F1F1F1";
						} ?>>
							<td><?php echo $debtCount; ?></td>
							<td><?php echo $row['IdCollection']; ?></td>
							<td><?php echo $row['Title']; ?></td>
							<td><?php echo $row['DateLoans']; ?></td>
							<td><?php echo $row['ExpiredDate']; ?></td>
							<td><?php echo $row['Interval']; ?> Hari</td>
							<td align="right">Rp. <?php echo $row['Debt']; ?></td>
						</tr>
						<?php
						$totalDay=$totalDay+($row['Interval']);
						$totalPay=$totalPay+($row['Debt']);
						$debtCount++;
					}
				}
				 ?>
					
				</tbody>
				<tfoot>
					<tr>
						<td colspan="5" align="right" ><strong>Total</strong></td>
						<td ><b><strong><?php echo $totalDay; ?> Hari</strong></b></td>
						<td align="right"><b>Rp.<strong><?php echo $totalPay; ?></strong></b></td>
					</tr>
				</tfoot>
		</table>
		</div>
    </div>
    <div class="modal-footer">
    	<a class="btn btn-success pull-right" disabled="disabled" id="insertButton11">
        	<i class="fa fa-credit-card" style="color: #fff"> Bayar</i>
        </a>
        <a  id="checkboxButton11"  href="#" target="_blank"  class="btn btn-default pull-left">
        <i class="fa fa-print"></i> Print</a>
    </div>
	</div>
  <!--END DENDA-->

  

<!--TABULASI PEMINJAMAN-->
			<?php
		} else {
			?>
			<div class="active tab-pane" id="loan">
			  <div class="box box-primary box-solid">
                		<div class="box-header">
                  			<h3 class="box-title"></h3>
                  			<div class="box-tools pull-right">
                    			<div class="has-feedback">
                      				<input type="text" class="form-control input-sm" id="SearchIdCollLoan" placeholder="Scan Barcode Id Koleksi">
                      				<span class="glyphicon glyphicon-search form-control-feedback"></span>
                    			</div>
                  			</div><!-- /.box-tools -->
                		</div><!-- /.box-header -->
		                <div class="box-body no-padding">
			                  <div class="table-responsive mailbox-messages">
			                    <table id="tabLoanClickTable" class="table table-hover table-striped">
			                    </table><!-- /.table -->
			                  </div><!-- /.mail-box-messages -->
		                </div><!-- /.box-body -->
                		<div class="box-footer no-padding">
                		</div>
              		</div>
              <hr>
			  <div class="box box-success box-solid">
			    <div class="box-header">
			      <h3 class="box-title">Daftar Peminjaman Sementara</h3>
			      <div class="box-tools pull-right">
			      </div>
			    </div><!-- /.box-header -->
			    <div class="box-body">
			      <table id="temporaryLoans" class="table table-hover table-striped">
			        <thead>
			          <tr>
			            <th>No.</th>
			            <th>Id Pinjam</th>
			            <th>Id Koleksi</th>
			            <th>Judul</th>
			            <th>Tgl.Pinjam</th>
			            <th>Jatuh Tempo</th>
			           <th>Pilihan</th>
			          </tr>
			        </thead>
			        <tbody>
			<?php
			$i      = 1;
			$result = $db->displayTable("SELECT * FROM TempLoans where IdLoans='$idLoans'");
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					?>
			    <tr>
			      <td><?php echo $i;?></td>
			      <td><?php echo $row['IdLoans'];?></td>
			      <td><?php echo $row['IdCollection'];?></td>
			      <td><?php echo $row['Title'];?></td>
			      <td><?php echo $row['Dateloans'];?></td>
		      <td><?php echo $row['ExpiredLoans'];?></td>
			      <td>
			        <div style="margin-left: 5px;">
			            <a href="control/delloan.php?idCancel=<?php echo $row['No'];?>&&idColl=<?php echo $row['IdCollection']; ?>"><button class="btn btn-danger"><span class="fa fa-edit">  Batal</span></button></a>
			        </div>
			      </td>
			    </tr>
					<?php
					$i++;
				}
			}
			?>
			</tbody>
	</table>
</div><!-- /.box-body -->
<div class="modal-footer">
<style type="text/css" media="screen">
	.icheckbox_flat-green {
    background-position: 0 0;
}
    .icheckbox_flat-green.checked {
        background-position: -22px 0;
    }
    .icheckbox_flat-green.disabled {
        background-position: -44px 0;
        cursor: default;
    }
    .icheckbox_flat-green.checked.disabled {
        background-position: -66px 0;
    }

</style>
	<label><input class="icheckbox_flat-green"  required="required" id="checkboxButton8" type="checkbox"> Validasi Peminjaman </label><br>
      <button id="insertButton8" disabled="disabled" class="btn btn-primary pull-right"><a href="control/saveloans.php?idLoans=<?php echo $idLoans;?>">
        <i class="fa fa-save" style="color: #fff"> Simpan</i></a>
      </button>
</div>
</div><!-- /.box -->
</div><!-- /.tab-pane -->
<!--END TABULASI TABULASI -->
			<?php
		}
		?>
<?php 
include_once 'content/history-loans.php';
 ?>
		</div><!-- /.tab-content -->
		</div><!-- /.nav-tabs-custom -->
	</div><!-- /.col -->
		<?php
	} else {
		include_once 'content/viewtransaction.php';
	}
} else {
	include_once 'content/viewtransaction.php';
}
?>
</div><!-- /.row -->




