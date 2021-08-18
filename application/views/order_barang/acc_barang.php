 <?php 
  $head = array("#","Id Barang","Nama Barang","Supplier","Jumlah","Harga Beli","Status");
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
        <form action="<?= base_url($this->session->userdata("level")."/");?>order_barang/surat" method="post" target="blank" class="form-horizontal">
            <select name="id_supplier" class="form-control span3">
              <?php
                foreach ($supplier as $data_supplier){  
              ?>
                <option value="<?= $data_supplier['id_supplier'];?>"> <?= $data_supplier['nama'];?></option>
              <?php } ?>
            </select>
          <button type="submit" class="btn btn-sm btn-primary" target="blank"><i class="icon-eye-open"></i> Cetak Surat</button>
        </form>
      </div>
    <div class="quick-actions_homepage">
<div class="widget-box">
  <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
    <h5><?= $title; ?></h5>
    <!-- <a href="<?= base_url($this->session->userdata("level")."/");?>barang/form/0" class="btn btn-sm btn-success pull-right tip-bottom" style="margin:4px" title='Tambah Data'><i class="icon-plus"></i></a> -->
    <a href="<?= base_url($this->session->userdata("level")."/");?>order_barang/input_order/<?= $order_barang; ?>"  class="btn btn-sm btn-success pull-right">Dipesan</a>
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
                foreach ($detail_order as $data){  
                  $no++;
              ?>
              <tr>
                <td class="span1"><?= $no; ?></td>
                <td><?= $data["id_barang"]; ?></td>
                <td><?= $data["nama_barang"]; ?></td>
                <td><?= $data["nama"]; ?></td>
                <td><?= $data["jumlah"]; ?></td>
                <td><?= $data["harga_beli"]; ?></td>
                <td><?= $data["status"]; ?></td>
                <!-- <td class="span2">
                  <a href="<?= base_url();?>admin/barang/form/<?php echo $data["id_barang"] ?>" class="btn btn-sm btn-success tip-bottom" title='Ubah Data'><i class="icon-edit"></i></a>
                  <a href="<?= base_url();?>admin/barang/hapus/<?php echo $data["id_barang"] ?>" onclick="return confirm('Anda Yakin Akan Menghapusnya ?')" title='Hapus Data' class="btn btn-sm btn-danger tip-bottom"><i class="icon-trash"></i></a>
                </td> -->
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