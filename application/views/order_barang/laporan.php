 <?php 
  $head = array("#","Tanggal Masuk","Id Barang","Nama Barang","Supplier","Jumlah","Harga Beli");
  $no=0;
 ?>
  <header>
   <b><?= $title ?></b>
   <br>
   PT. Graha Rajasa Yogyakarta
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
    foreach ($order_barang as $data){  
      $no++;
  ?>
  <tr>
    <td class="span1"><?= $no; ?></td>
    <td><?= $data["tanggal_order_brg"]; ?></td>
    <td><?= $data["id_barang"]; ?></td>
    <td><?= $data["nama_barang"]; ?></td>
    <td><?= $data["nama"]; ?></td>
    <td><?= $data["jumlah"]; ?></td>
    <td><?= $data["harga_beli"]; ?></td>
    <!-- <td class="span2">
      <a href="<?= base_url();?>admin/barang/form/<?php echo $data["id_barang"] ?>" class="btn btn-sm btn-success tip-bottom" title='Ubah Data'><i class="icon-edit"></i></a>
      <a href="<?= base_url();?>admin/barang/hapus/<?php echo $data["id_barang"] ?>" onclick="return confirm('Anda Yakin Akan Menghapusnya ?')" title='Hapus Data' class="btn btn-sm btn-danger tip-bottom"><i class="icon-trash"></i></a>
    </td> -->
  </tr>
  <?php } ?>
</tbody>
</table>