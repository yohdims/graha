<?php
    if(!empty($member)){
        $data = array("$member->id_member","$member->nama","$member->alamat","$member->no_ktp","$member->jenis_kelamin","$member->email","$member->no_telp");
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
          <form method="post" action="<?= base_url();?>admin/member/input" class="form-horizontal">
            <div class="control-group">
                <label class="control-label">Nama member</label>
                <input type="hidden" name="id_member" class="form-control span11" value="<?= $data[0]; ?>">
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
                <label class="control-label">NIK</label>
                 <div class="controls">
                <input type="text" name="no_ktp" class="form-control span11"  value="<?= $data[3]; ?>">
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">Jenis Kelamin</label>
                <div class="controls">
                <label><input type="radio" name="jenis_kelamin" value="L" checked />Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="P" <?php if($data[4]=="P") echo "checked" ; ?>/>Perempuan</label>
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">Email</label>
                 <div class="controls">
                <input type="email" name="email" class="form-control span11"  value="<?= $data[5]; ?>">
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">No Telepon</label>
                 <div class="controls">
                <input type="no_telp" name="no_telp" class="form-control span11"  value="<?= $data[6]; ?>">
              </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-success">
              <a href="<?= base_url();?>admin/member" class="btn btn-sm btn-danger">Batal</a>
            </div>
          </form>
        </div>
          
    </div>
    </div>
  </div>
        <!-- /.container-fluid -->


</div>
      <!-- End of Main Content -->