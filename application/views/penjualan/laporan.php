 <?php 
  $head = array("#","Tanggal","No Nota","Member","Id Barang","Nama Barang","Harga Satuan","Qty","Disc","Total");
  $no=0;
 ?>
  <header>
   <b><?= $title ?></b>
   <br>
   PT. Graha Rajasa Yogyakarta
   <br>
   Periode <?= date("d-m-Y",strtotime( $tgl_awal)) ?> sampai dengan  <?= date("d-m-Y",strtotime( $tgl_akhir)) ?>
 </header>
 <br>
<table class="table">
 <thead>
  <tr>
    <?php for($i=0;$i<count($head);$i++){?>
        <th><?php echo $head[$i]?></th>
    <?php }?>
  </tr>
</thead>
<tbody>
  <?php
    foreach ($penjualan as $data){  
      $no++;
  ?>
  <tr>
    <td class="span1"><?= $no; ?></td>

    <td><?= date("l,d-m-Y",strtotime($data["tanggal"])); ?></td>
    <td><?= $data["id_penjualan"]; ?></td>
    <!-- <td><?php if(empty($data["nama"])){echo "Bukan Member";}else{ echo $data["nama"];}  ?></td> -->
    <td><?= $data["id_barang"]; ?></td>
    <td><?= $data["nama_barang"]; ?></td>
    <td><?= $data["harga"]; ?></td>
    <td><?= $data["jumlah"]; ?></td>
    <td><?= $data["diskon"]; ?></td>
    <td><?= $data["subtotal"]; ?></td>
    <!-- <td class="span2">
      <a href="<?= base_url();?>admin/barang/form/<?php echo $data["id_barang"] ?>" class="btn btn-sm btn-success tip-bottom" title='Ubah Data'><i class="icon-edit"></i></a>
      <a href="<?= base_url();?>admin/barang/hapus/<?php echo $data["id_barang"] ?>" onclick="return confirm('Anda Yakin Akan Menghapusnya ?')" title='Hapus Data' class="btn btn-sm btn-danger tip-bottom"><i class="icon-trash"></i></a>
    </td> -->
  </tr>
  <?php } ?>
</tbody>
</table>