<?php
    if(!empty($supplier)){
        $data = array("$supplier->id_supplier","$supplier->nama","$supplier->alamat","$supplier->email","$supplier->no_telp");
    }else{
        $data = array("","","","","","","","");
    }

?>
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?= base_url();?>admin/index" title="Go to Home" class="tip-bottom">
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
          <form method="post" action="<?= base_url();?>admin/supplier/input" class="form-horizontal">
            <div class="control-group">
                <label class="control-label">Nama Supplier</label>
                <input type="hidden" name="id_supplier" class="form-control span11" value="<?= $data[0]; ?>">
                <div class="controls">
                <input type="text" name="nama" class="form-control span11" value="<?= $data[1]; ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Alamat</label>
                 <div class="controls">
                <textarea name="alamat" class="form-control span11" rows="4"><?= $data[2]; ?></textarea>
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">Email</label>
                 <div class="controls">
                <input type="email" name="email" class="form-control span11"  value="<?= $data[3]; ?>">
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">No Telepon</label>
                 <div class="controls">
                <input type="no_telp" name="no_telp" class="form-control span11"  value="<?= $data[4]; ?>">
              </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-success">
              <a href="<?= base_url();?>admin/supplier" class="btn btn-sm btn-danger">Batal</a>
            </div>
          </form>
        </div>
          
    </div>
    </div>
  </div>
        <!-- /.container-fluid -->


</div>
      <!-- End of Main Content -->