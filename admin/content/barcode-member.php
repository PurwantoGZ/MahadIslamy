<?php
require_once '../config/base.php';
$db = new BaseClass();
?>
<div class="row">
      <div class="col-md-12">
          <div class="box box-solid">
                <div class="box-header with-border">
                  <i class="fa fa-text-width"></i>
                  <h3 class="box-title">List Data Anggota</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div  class="table-responsive">
                      <table id="tableMember" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>ID Anggota</th>
                          <th>Nama Anggota</th>
                          <th>Gender</th>
                          <th>Kelas</th>
                          <th>Tgl. Daftar</th>
                          <th>Tgl. Jatuh Tempo</th>
                          <th>Status</th>
                          <th >Pilihan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $count  = 1;
                      $result = $db->displayTable("select * from viewmember");
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          ?>
                          <tr>
                              <td><?php echo $count;?></td>
                              <td><?php echo $row['IdMember']?></td>
                              <td><?php echo $row['MemberName']?></td>
                              <td><?php echo $row['Gender']?></td>
                              <td><?php echo $row['ClassName']?></td>
                              <td><?php echo $row['RegristationDate']?></td>
                              <td><?php echo $row['ExpiredDate']?></td>
                              <td><span class="label <?php
                          if ($row['Status'] == "Aktif") {
                            echo "label-success";
                          } else {
                            echo "label-danger";
                          }
                          ?>"><?php echo $row['Status']?></span></td>
                              <td>
                                  <div class="row" style="margin-left: 5px;">
                                        <a class="btn btn-warning" data-toggle="modal" data-placement="top" <?php if ($row['Status'] == "Aktif") { echo "disabled=disabled";}?>title="Perpanjang Data Member" data-target="#newRegristationModal" data-id="<?php echo $row['IdMember'];?>"  href="#" style="color: #fff;"><span class="glyphicon glyphicon-print"></span>
                                        </a>
                                  </div>
                              </td>
                          </tr>
                          <?php
                          $count++;
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="row no-print">
            <div class="col-xs-12">
              <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
            </div>
          </div>
                </div>
          </div><!-- /.box -->
      </div><!-- ./col -->
</div><!-- ./row -->