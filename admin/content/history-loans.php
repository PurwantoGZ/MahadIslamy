		<!--TABULASI HISTORY -->
	<div class="tab-pane" id="loanHistory">
		<div class="box box-default">
			<div class="box-body">
					<table id="loanHistoryTable" class="table table-hover table-striped">
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
			require_once '../config/base.php';
			$db= new BaseClass();
			$idMemberNow = $_SESSION['IdAnggota'];
			$jk= 1;
			$hasil = $db->displayTable("SELECT * FROM DataLoans where IdMember='$idMemberNow'");
			if ($hasil->num_rows > 0) {
				while ($table = $hasil->fetch_assoc()) {
					?>
					<tr>
						<td><?php echo $jk;?></td>
						<td><?php echo $table['IdLoans'];?></td>
						<td><?php echo $table['IdCollection'];?></td>
						<td><?php echo $table['Title'];?></td>
						<td><?php echo $table['DateLoans'];?></td>
						<td><?php echo $table['ExpiredLoans'];?></td>
						<td><?php echo $table['Status'];?></td>
					</tr>
					<?php
					$jk++;
				}
			}
			?>
			</tbody>
		</table>				
			</div>
			<div class="box-footer text-right">
		        <a href="#" target="_blank" class="btn btn-default">
		        <i class="fa fa-print"></i> Print</a>
			</div>
		</div>
		
</div>
<!--END TABULASI HISTORY -->