 <?php 
  $head = array("#","Tanggal Masuk","Id Barang","Nama Barang","Supplier","Jumlah","Harga Beli","Acc");
  $no=0;
 ?>
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="?menu=dashboard" title="Go to Home" class="tip-bottom">
      <i class="icon-home"></i> Home
    </a>
    </div>
    <h1><?= $title; ?></h1>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <a  href="<?= base_url($this->session->userdata("level")."/");?>laporan/order_barang" type="submit" class="btn btn-sm btn-primary span2" target="blank"><i class="icon-eye-open"></i> Cetak Laporan</a>
      </div>
    <div class="quick-actions_homepage">
<div class="widget-box">
  <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
    <h5><?= $title; ?></h5>
    <a href="<?= base_url($this->session->userdata("level")."/");?>barang/form/0" class="btn btn-sm btn-success pull-right tip-bottom" style="margin:4px" title='Tambah Data'><i class="icon-plus"></i></a>
  </div>
   <div class="widget-content nopadding" style="min-height: 400px">

              <table class="table table-bordered data-table">
            <thead>
              <tr>
                <?php for($i=0;$i<count($head);$i++){?>
                    <th><?php echo $head[$i]?></th>
                <?php }?>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($order_barang as $data){  
                  $no++;
              ?>
              <tr>
                <td class="span1"><?= $no; ?></td>
                <td><?= $data["tanggal_order_brg"]; ?></td>
                <td><?= $data["id_barang"]; ?></td>
                <td><?= $data["nama_barang"]; ?></td>
                <td><?= $data["nama"]; ?></td>
                <td><?= $data["jumlah"]; ?></td>
                <td><?= $data["harga_beli"]; ?></td>
                <td class="span2">
                  <a href="<?= base_url($this->session->userdata("level")."/");?>order_barang/input_acc/<?php echo $data["id_det_order_brg"] ?>" class="btn btn-sm btn-success tip-bottom" title='Acc'><i class="icon-check"></i></a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->


      </div>
      <!-- End of Main Content -->

      