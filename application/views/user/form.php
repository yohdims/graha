<?php
    if(!empty($user)){
        $data = array("$user->id_user","$user->username","$user->nama_lengkap","$user->password","$user->level");
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
          <form method="post" action="<?= base_url();?>admin/user/input" class="form-horizontal">
            <div class="control-group">
                <label class="control-label">Username</label>
                <input type="hidden" name="id_user" class="form-control span11" value="<?= $data[0]; ?>">
                <div class="controls">
                <input type="text" name="username" class="form-control span11" value="<?= $data[1]; ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nama Lengkap</label>
                 <div class="controls">
                <input type="text" name="nama_lengkap" class="form-control span11" value="<?= $data[2]; ?>">
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">Password</label>
                 <div class="controls">
                <input type="password" name="password" class="form-control span11" value="<?= $data[3]; ?>">
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">Hak Akses</label>
                 <div class="controls">
                <label><input type="radio" name="level" value="admin" checked />Admin</label>
                <label><input type="radio" name="level" value="gudang" <?php if($data[4]=="gudang") echo "checked" ; ?>/>Gudang</label>
                <label><input type="radio" name="level" value="kasir" <?php if($data[4]=="kasir") echo "checked" ; ?>/>Kasir</label>
              </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-success">
              <a href="<?= base_url();?>admin/user" class="btn btn-sm btn-danger">Batal</a>
            </div>
          </form>
        </div>
          
    </div>
    </div>
  </div>
        <!-- /.container-fluid -->


</div>
      <!-- End of Main Content -->