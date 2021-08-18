 <?php 
  $head = array("#","Tanggal","No Nota","Member","Nama Kasir","Tools");
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
        <form action="<?= base_url($this->session->userdata("level")."/");?>retur_penjualan/index" method="post" class="form-horizontal">
            <div class="">
                <label class="control-label">Tanggal</label>
                <div class="controls">
                  <input type="date" name="tanggal" required>
                <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>
      </div>
    <div class="quick-actions_homepage">
<div class="widget-box">
  <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
    <h5><?= $title; ?></h5>
    <!-- <a href="<?= base_url();?>admin/barang/form/0" class="btn btn-sm btn-success pull-right tip-bottom" style="margin:4px" title='Tambah Data'><i class="icon-plus"></i></a> -->
  </div>
   <div class="widget-content nopadding">

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
                foreach ($retur_penjualan as $data){  
                  $no++;
              ?>
              <tr>
                <td class="span1"><?= $no; ?></td>

                <td><?= date("l,d-m-Y",strtotime($data["tanggal"])); ?></td>
                <td><?= $data["id_penjualan"]; ?></td>
                <td><?php if(empty($data["nama"])){echo "Bukan Member";}else{ echo $data["nama"];}  ?></td>
                <td><?= $data["nama_lengkap"]; ?></td>
                <td class="span1">
                  <a onclick="ambilDataDetailPenjualan(<?= $data['id_penjualan']; ?>)" class="btn btn-sm btn-success tip-bottom" title='Lihat Detail'><i class="icon-edit"></i></a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
            </div>
          </div>
          
          <div class="widget-box">
  <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
    <h5>Detail Penjualan</h5>
    <!-- <a href="<?= base_url();?>admin/barang/form/0" class="btn btn-sm btn-success pull-right tip-bottom" style="margin:4px" title='Tambah Data'><i class="icon-plus"></i></a> -->
  </div>
   <div class="widget-content nopadding">
    
    <div class="span6 form-horizontal">
      <div class="control-group">
        <label class="control-label">No Nota</label>
        <input type="hidden" name="id_penjualan">
        <div class="controls" id='id_penjualan'>
          No Nota
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Tanggal</label>
        <div class="controls" name='tanggal'>
          Tanggal
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Nama Member</label>
        <div class="controls" name='nama'>
          Nama Member
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Petugas</label>
        <div class="controls" name='nama_lengkap'>
          Nama Kasir
        </div>
    </div>
    </div>
    <!-- <font style="color:red;"><?= $this->session->flashdata('message'); ?></font>  -->
    <div  class="span4"  style="margin:6px">
      <form  action="<?= base_url($this->session->userdata("level")."/");?>retur_penjualan/nota" method="post" class="form-horizontal" target='blank'>
          <input type="hidden" name="id_penjualan">
          <div name='cetak'></div>
        </form>
      
    </div>
              <table class="table table-bordered">
            <thead>
              <tr>
                <?php 
                $head=array("No","Nama Barang","Jumlah","Harga","Diskon","Total","Tools");
                for($i=0;$i<count($head);$i++){?>
                    <th><?php echo $head[$i]?></th>
                <?php }?>
              </tr>
            </thead>
            <tbody name='detail_penjualan'>

            </tbody>
          </table>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->


      </div>
      <!-- End of Main Content -->
<div id="myAlert" class="modal hide">
    
  <div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">×</button>
    <h3>Retur Barang</h3>
  </div>
  <div class="modal-body">
    <input type="hidden" name="id_det_penjualan">
    <p>Alasan</p>
    <textarea type="text" name="alasan" style="width:95%"></textarea>

  </div>
  <div class="modal-footer"> <a data-dismiss="modal" class="btn btn-primary" onclick="simpanRetur()">Simpan</a> <a data-dismiss="modal" class="btn" href="#">Cancel</a> </div>
</div>