 <?php 
  $head = array("#","Kode Barang","Nama Barang","Stok","Harga Beli","Opsi");
  $head2 = array("#","Kode Barang","Nama Barang","Harga Satuan","Qty","Subtotal","Opsi");
  $no=0;
 ?>
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="?menu=dashboard" title="Go to Home" class="tip-bottom">
      <i class="icon-home"></i> Home
    </a>
    </div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
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
                foreach ($barang as $data){  
                  $no++;
              ?>
              <tr>
                <td class="span1"><?= $no; ?></td>
                <td><?= $data["kode_barang"]; ?></td>
                <td><?= $data["nama_barang"]; ?></td>
                <td><?= $data["stok"]; ?></td>
                <td><?= $data["harga_beli"]; ?></td>
                <td class="span2">
                  <a href="#myAlert" onclick="ambil_data_barang(<?= $data["id_barang"]; ?>)" data-toggle='modal' class="btn btn-sm btn-success tip-bottom" title='Pesan'><i class="icon-plus"></i></a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
  </div>
          


    <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
    <h5>Detail Barang yang dibeli</h5>
  </div>
<a href="<?= base_url($this->session->userdata("level")."/");?>order_barang/input/<?= $order_barang; ?>"  class="btn btn-sm btn-success pull-right">Kirim Ke Pimpinan</a>
    <table class="table table-bordered">
            <thead>
              <tr>
                <?php for($i=0;$i<count($head2);$i++){?>
                    <th><?php echo $head2[$i]?></th>
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
                <td><?= $data["kode_barang"]; ?></td>
                <td><?= $data["nama_barang"]; ?></td>
                <td><?= "Rp." .number_format($data["harga_beli"]); ?></td>
                <td><?= $data["jumlah"]; ?></td>
                <td><?= "Rp." .number_format($data["subtotal"]); ?></td>
                <td class="span2">
                  <a  href="#myAlert" data-toggle='modal' onclick="ambil_data_barang(<?= $data["id_barang"]; ?>)" class="btn btn-sm btn-success tip-bottom" title='Ubah Data'><i class="icon-edit"></i></a>
                  <a href="<?= base_url($this->session->userdata("level")."/");?>order_barang/hapus/<?= $data["id_det_order_brg"]; ?>" onclick="return confirm('Anda Yakin Akan Menghapusnya ?')" title='Hapus Data' class="btn btn-sm btn-danger tip-bottom"><i class="icon-trash"></i></a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
  </div>
</div>
          
        </div>
   


      </div>
      <!-- End of Main Content -->

<div id="myAlert" class="modal hide">
    
  <div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">×</button>
    <h3>Order Barang</h3>
  </div>
    <form method="post" action="<?= base_url($this->session->userdata("level")."/");?>order_barang/input_detail" class="form-horizontal">
  <div class="modal-body">
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-content" >
            
            <div class="control-group">
                <label class="span5">Nama Barang</label>
                 <div class="span6">
                  <select name="id_barang2" class="form-control span11" id="id_barang_order" >
                  <?php
                    foreach ($barang as $barang){  
                  ?>
                    <option  value="<?= $barang['id_barang'];?>" stok="<?= $barang['stok'];?>" harga_beli="<?= $barang['harga_beli'];?>"> <?= $barang['nama_barang'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
             <div class="control-group">
                <label class="span5">Supplier</label>
                <div class="span6">
                  <input type="hidden" name="id_order_barang" min='0' class=" form-control span5" value="<?= $order_barang; ?>">
                  <input type="hidden" name="id_barang" min='0' class=" form-control span5">
                <!-- <select name="id_supplier" class="form-control span11" required> -->
                  <?php
                    foreach ($supplier as $supplier){  
                  ?>
                    <label class="radio inline">
                        <input type="radio" name="id_supplier" value="<?= $supplier['id_supplier'];?>" checked> <?= $supplier['nama'];?>
                    </label>
                    <br>
                  <?php } ?>
                <!-- </select> -->
                </div>
            </div>
            <div class="control-group">
                <label class="span5">Jumlah</label>
                 <div class="span6">
                  <input type="number" name="jumlah_order" min='0' class=" form-control span5" id='jumlah_order' value="0">
              </div>
            </div>
            
            
        </div>
      </div>
      <div class="span6">
        <div class="widget-content" >
         <div class="control-group">
                <label class="span5">Harga</label>
                 <div class="span6">
                  
                  <input type="hidden" name="harga_beli" min='0' class=" form-control span11" value="0">
                  <h4 name="iharga_beli" min='0' class=" form-control span11" >Rp. 000 </h4>
              </div>
            </div>
            <div class="control-group">
                <label class="span5">Sub Total</label>
                <div class="span6">
                  <h4 name="isubtotal" class=" form-control span11" >Rp. 000 </h4>
                  <input type="hidden" name="subtotal" min='0' class="span11"  value="0">
                </div>
            </div>
            
            </div>
            
            <font style="color:red;"><?= $this->session->flashdata('message'); ?></font> 
      </div>
          
    </div>
    <div class="form-actions">
              
              <input type="submit" name="simpan" value="Input" class="btn btn-sm btn-primary">
            </div>

  </div>
      </form>
  <!-- <div class="modal-footer"> <a data-dismiss="modal" class="btn btn-primary" onclick="simpanRetur()">Simpan</a> <a data-dismiss="modal" class="btn" href="#">Cancel</a> </div> -->
</div>