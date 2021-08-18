<?php
    if(!empty($barang)){
        $data = array("$barang->id_barang","$barang->nama_barang","$barang->id_supplier","$barang->stok","$barang->harga_beli","$barang->harga_jual","$barang->deskripsi");
    }else{
        $data = array("","","","","","","","");
    }

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
    <div class="span8">
    <div class="widget-box ">
      <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
        <h5><?= $title; ?></h5>
      </div>
      <div class="widget-content nopadding" >
          <form method="post" action="<?= base_url($this->session->userdata("level")."/");?>barang/input" class="form-horizontal">
            <!-- <div class="control-group">
                <label class="control-label">ID Barang</label>
                <div class="controls">
                <input type="text" name="id_barang" class="form-control span11" value="<?= $data[0]; ?>">
                <input type="hiddn" name="id_barang_lama" class="form-control span11" value="<?= $data[0]; ?>">
                </div>
            </div> -->
            <div class="control-group">
                <label class="control-label">Nama Barang</label>
                <div class="controls">
                <input type="text" name="nama_barang" class="form-control span11" value="<?= $data[1]; ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Supplier</label>
              <div class="controls">
                <select name="id_supplier" class="form-control span11">
                  <?php
                    foreach ($supplier as $data_supplier){  
                  ?>
                    <option value="<?= $data_supplier['id_supplier'];?>" <?php if($data[2]==$data_supplier['id_supplier']){echo "selected";}?> > <?= $data_supplier['nama'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">Stok</label>
                 <div class="controls">
                <input type="number" name="stok" class="form-control span11"  value="<?= $data[3]; ?>">
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">Harga Beli</label>
                 <div class="controls">
                <input type="number" name="harga_beli" class="form-control span11"  value="<?= $data[4]; ?>">
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">Harga Jual</label>
                 <div class="controls">
                <input type="number" name="harga_jual" class="form-control span11"  value="<?= $data[5]; ?>">
              </div>
            </div>
             <div class="control-group">
                <label class="control-label">Deskripsi</label>
                 <div class="controls">
                <textarea name="deskripsi" class="form-control span11" rows="4"><?= $data[6]; ?></textarea>
              </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-success">
              <a href="<?= base_url();?>admin/barang" class="btn btn-sm btn-danger">Batal</a>
            </div>
          </form>
        </div>
          
    </div>
    </div>
  </div>
        <!-- /.container-fluid -->


</div>
      <!-- End of Main Content -->