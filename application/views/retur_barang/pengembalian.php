 <?php 
  $head = array("#","Id Barang","Nama Barang","Harga Satuan","Qty","Total","Alasan","Tools");
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
<form action="<?= base_url($this->session->userdata("level")."/");?>retur_barang/surat" method="post" target="blank" class="form-horizontal">
          <div class="control-group">
            <select name="id_supplier" class="form-control span3" required>
              <?php
                foreach ($supplier as $data_supplier){  
              ?>
                <option value="<?= $data_supplier['id_supplier'];?>"> <?= $data_supplier['nama'];?></option>
              <?php } ?>
            </select>
            <input type="date" name="tanggal_pengembalian" class=" form-control" required>
          <button   type="submit" class="btn btn-sm btn-primary" target="blank"><i class="icon-eye-open"></i> Cetak Surat Pengembalian</button>
          </div>
        </form>
      </div>
    <div class="quick-actions_homepage">
      <font style="color:red;"><?= $this->session->flashdata('message'); ?></font> 
<div class="widget-box">
  <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
    <h5><?= $title; ?></h5>
    <!-- <a href="<?= base_url();?>admin/barang/form/0" class="btn btn-sm btn-success pull-right tip-bottom" style="margin:4px" title='Tambah Data'><i class="icon-plus"></i></a> -->
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
                foreach ($retur_barang as $data){  
                  $no++;
              ?>
              <tr>
                <td class="span1"><?= $no; ?></td>
                <td><?= $data["id_barang"]; ?></td>
                <td><?= $data["nama_barang"]; ?></td>
                <td><?= $data["harga"]; ?></td>
                <td><?= $data["jumlah"]; ?></td>
                <td><?= $data["jumlah"]*$data["harga"]; ?></td>
                <td><?= $data["alasan"]; ?></td>
                <td><a href="<?= base_url($this->session->userdata("level")."/");?>retur_barang/input/<?php echo $data["id_retur_barang"] ?>" class="btn btn-sm btn-success tip-bottom" title='Kembalikan Sekarang'><i class="icon-edit"></i></a></td>
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