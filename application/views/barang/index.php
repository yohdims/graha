 <?php 
  $head = array("#","Kode Barang","Nama Barang","Stok","Harga Beli","Harga Jual","Supplier","Action");
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
        <a href="<?= base_url($this->session->userdata("level")."/");?>laporan/barang" type="submit" class="btn btn-sm btn-primary span2" target="blank"><i class="icon-eye-open"></i> Cetak Laporan</a>
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
                foreach ($barang as $data){  
                  $no++;
              ?>
              <tr>
                <td class="span1"><?= $no; ?></td>
                <td><?= $data["kode_barang"]; ?></td>
                <td><?= $data["nama_barang"]; ?></td>
                <td><?= $data["stok"]; ?></td>
                <td>Rp <?= number_format($data["harga_beli"],0); ?></td>
                <td>Rp <?= number_format($data["harga_jual"],0); ?></td>
                <td><?= $data["nama"]; ?></td>
                <td class="span2">
                  <a href="<?= base_url($this->session->userdata("level")."/");?>barang/form/<?php echo $data["id_barang"] ?>" class="btn btn-sm btn-success tip-bottom" title='Ubah Data'><i class="icon-edit"></i></a>
                  <a href=<?= base_url($this->session->userdata("level")."/");?>barang/hapus/<?php echo $data["id_barang"] ?>" onclick="return confirm('Anda Yakin Akan Menghapusnya ?')" title='Hapus Data' class="btn btn-sm btn-danger tip-bottom"><i class="icon-trash"></i></a>
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