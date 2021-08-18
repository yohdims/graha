 <?php 
  $head = array("#","Tanggal Retur","Tanggal Kembali","No Nota","Member","Id Barang","Nama Barang","Harga Satuan","Qty","Disc");
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
        <form action="<?= base_url($this->session->userdata("level")."/");?>laporan/retur_barang" method="post" target="blank" class="form-horizontal">
          <div class="control-group">
            <input type="date" name="tgl_awal" class=" form-control" required>
            <input type="date" name="tgl_akhir" class=" form-control" required>
          <button   type="submit" class="btn btn-sm btn-primary" target="blank"><i class="icon-eye-open"></i> Cetak Laporan</button>
          </div>
        </form>
      </div>
    <div class="quick-actions_homepage">
<div class="widget-box">
  <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
    <h5><?= $title; ?></h5>
    <!-- <a href="<?= base_url($this->session->userdata("level")."/");?>barang/form/0" class="btn btn-sm btn-success pull-right tip-bottom" style="margin:4px" title='Tambah Data'><i class="icon-plus"></i></a> -->
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
                <td><?= $data["tanggal_retur"]; ?></td>
                <td><?php if($data["tanggal_pengembalian"]=="0000-00-00"){ echo "Belum dikembalikan";}else{ echo $data["tanggal_pengembalian"];} ?></td>
                <td><?= $data["id_penjualan"]; ?></td>
                <td><?= $data["id_barang"]; ?></td>
                <td><?= $data["nama_barang"]; ?></td>
                <td><?= $data["harga"]; ?></td>
                <td><?= $data["jumlah"]; ?></td>
                <td><?= $data["jumlah"]; ?></td>
                <td><?= $data["jumlah"]*$data["harga"]; ?></td>
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