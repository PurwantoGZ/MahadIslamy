<?php 
require_once '../../config/base.php';
$db = new BaseClass();
 ?>
<div class="col-md-12">
<div class="panel panel-primary">
      <div class="panel-heading">
       <h3 class="panel-title"> Laporan Keseluruhan Data Anggota  </h3>
       <h5><?php echo $db->dateIndo(date("Y-m-d")); ?></h5>         
      </div>
      <div class="panel-body">
          <div class="table-responsive">
            <table id="rpmember" class="table table-bordered table-hover table-striped tablesorter">
            </table>
          </div>
          <div class="row no-print">
            <div class="col-xs-12">
              <button class="btn btn-primary pull-right" ><i class="fa fa-download"></i> Generate PDF</button>
              <button class="btn btn-success pull-right" style="margin-right: 5px;"><i class="fa fa-print"></i> Print</button>
            </div>
          </div>
      </div>
    </div>
</div>