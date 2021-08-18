 <?php 
  $head = array("#","Username","Nama Lengkap","Hak Akses","Action");
  $no=0;
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
        <a  href="<?= base_url($this->session->userdata("level")."/");?>laporan/user" type="submit" class="btn btn-sm btn-primary span2" target="blank"><i class="icon-eye-open"></i> Cetak Laporan</a>
      </div>
    <div class="quick-actions_homepage">
<div class="widget-box">
  <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
    <h5><?= $title; ?></h5>
    <a href="<?= base_url($this->session->userdata("level")."/");?>user/form/0" class="btn btn-sm btn-success pull-right tip-bottom" style="margin:4px" title='Tambah Data'><i class="icon-plus"></i></a>
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
                foreach ($user as $data){  
                  $no++;
              ?>
              <tr>
                <td class="span1"><?= $no; ?></td>
                <td><?= $data["username"]; ?></td>
                <td><?= $data["nama_lengkap"]; ?></td>
                <td>
                  <?php 
                    if($data["level"]=="K"){echo "Kasir";}
                    elseif($data["level"]=="G"){echo "Gudang";}
                    elseif($data["level"]=="A"){echo "Admin";} ?>
                  
                </td>
                <td class="span2">
                  <a href="<?= base_url();?>admin/user/form/<?= $data["id_user"] ?>" class="btn btn-sm btn-success tip-bottom" title='Ubah Data'><i class="icon-edit"></i></a>
                  <a href="<?= base_url();?>admin/user/hapus/<?= $data["id_user"] ?>" onclick="return confirm('Anda Yakin Akan Menghapusnya ?')" title='Hapus Data' class="btn btn-sm btn-danger tip-bottom"><i class="icon-trash"></i></a>
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