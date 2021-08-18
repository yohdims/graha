 <?php 
  $head = array("#","Id Barang","Nama Barang","Harga Satuan","Qty","Diskon","Subtotal","Opsi");
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
    <div class="row-fluid">
          <form method="post" action="<?= base_url($this->session->userdata("level")."/");?>index/input_detail" class="form-horizontal" >
      <div class="span6">
        <div class="widget-content" >
            
            <div class="control-group">
                <label class="span5">ID Barang</label>
                 <div class="span6">
                  <!-- <input type="number" name="id_barang" id="id_barang" min='0' class=" form-control"> -->
                  <select name="id_barang" id="id_barang" class=" form-control"> 
                    <?php
                      foreach ($barang as $itembarang){
                        
                    ?>
                        <option value="<?= $itembarang['id_barang'] ?>"><?= $itembarang['nama_barang'] ?></option>
                    <?php
                      }
                    ?>
                  </select>
              </div>
            </div>
             <div class="control-group">
                <label class="span5">Jumlah</label>
                 <div class="span6">
                  <input type="number" name="jumlah" min='0' class=" form-control span5" id='jumlah' value="0">
                  <input type="hidden" name="id_penjualan" min='0' class=" form-control span5" id='jumlah' value="<?= $penjualan;?>">
                  <input type="hidden" name="id_det_penjualan" min='0' class=" form-control span5" id='jumlah' value="0">
              </div>
            </div>
            <div class="control-group">
                <label class="span5">Nama Barang</label>
                 <div class="span6">
                  <h4 name="nama_barang" min='0' class=" form-control span11" > --- </h4>
              </div>
            </div>
           
            <div class="control-group">
                <label class="span5">Harga</label>
                 <div class="span6">
                  <input type="hidden" name="harga_jual" min='0' class=" form-control span11" value="0">
                  <h4 name="iharga_jual" min='0' class=" form-control span11" >Rp. 000 </h4>
              </div>
            </div>
            <div class="control-group">
                <label class="span5">Diskon</label>
                <div class="span6">
                  <input type="number" name="diskon_persen" min='0' class="span5" value="0"> % =
                  <input type="number" name="diskon" min='0' class="span5" value="0">
                </div>
            </div>
            <div class="control-group">
                <label class="span5">Sub Total</label>
                <div class="span6">
                  <h4 name="isubtotal" class=" form-control span11" >Rp. 000 </h4>
                  <input type="hidden" name="subtotal" min='0' class="span11"  value="0">
                </div>
            </div>
            <div class="form-actions">
              <input type="submit" name="simpan" value="Input" class="btn btn-sm btn-primary">
            </div>
        </div>
      </div>
      </form>
      <div class="span6">
        <div class="widget-content" >
          <form method="post" action="<?= base_url($this->session->userdata("level")."/");?>penjualan/input" class="form-horizontal">
            
            <div class="control-group">
                <label class="span5">Bayar</label>
                <div class="span6">
                  <input type="number" name="bayar" min='0' class="span11" value="0">
                  <input type="hidden" name="id_penjualan" min='0' class="span11" value="<?= $penjualan ?>">
                  <input type="hidden" name="total" min='0' class="span11" value="<?= $total ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="span5">Total Harga</label>
                <div class="span6">
                  <h2>Rp. <?= number_format($total) ?></h2>
                </div>
            </div>
            <div class="control-group">
                <label class="span5">Kembalian</label>
                <div class="span6">
                <h2 id="total">Rp. 000</h2>
              </div>
            </div>
            <div class="form-actions">
               <?php if(!empty($detail_penjualan)){?>
               <button type="submit" name="simpan" class="btn btn-sm btn-success"> Simpan </button>
                <a href="<?= base_url($this->session->userdata("level")."/");?>index/nota/<?= $penjualan;?>" target="blank" class="btn btn-sm btn-primary">Cetak Nota</a>
                <?php } ?>
            </div>
          </form>
            </div>
            
            <font style="color:red;"><?= $this->session->flashdata('message'); ?></font> 
      </div>
          
    </div>
    <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
    <h5>Detail Barang yang dibeli</h5>
  </div>
    
    <table class="table table-bordered">
            <thead>
              <tr>
                <?php for($i=0;$i<count($head);$i++){?>
                    <th><?php echo $head[$i]?></th>
                <?php }?>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($detail_penjualan as $data){  
                  $no++;
              ?>
              <tr>
                <td class="span1"><?= $no; ?></td>
                <td><?= $data["id_barang"]; ?></td>
                <td><?= $data["nama_barang"]; ?></td>
                <td><?= $data["harga"]; ?></td>
                <td><?= $data["jumlah"]; ?></td>
                <td><?= $data["diskon"]; ?></td>
                <td><?= $data["subtotal"]; ?></td>
                <td class="span2">
                  <a onclick="ambilData(<?= $data["id_det_penjualan"]; ?>)" class="btn btn-sm btn-success tip-bottom" title='Ubah Data'><i class="icon-edit"></i></a>
                  <a href="<?= base_url($this->session->userdata("level")."/");?>/index/hapus/<?= $data["id_det_penjualan"]; ?>" onclick="return confirm('Anda Yakin Akan Menghapusnya ?')" title='Hapus Data' class="btn btn-sm btn-danger tip-bottom"><i class="icon-trash"></i></a>
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

      