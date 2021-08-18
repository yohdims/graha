 <?php 
  $head = array("#","Tanggal","No Nota","Member","Id Barang","Nama Barang","Harga Satuan","Qty","Total");
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
      foreach ($retur_barang as $data){  
        $no++;
    ?>
    <tr>
      <td class="span1"><?= $no; ?></td>
      <td><?= $data["tanggal_retur"]; ?></td>
      <td><?= $data["id_penjualan"]; ?></td>
      <td><?= $data["id_barang"]; ?></td>
      <td><?= $data["nama_barang"]; ?></td>
      <td><?= $data["harga"]; ?></td>
      <td><?= $data["jumlah"]; ?></td>
      <td><?= $data["jumlah"]; ?></td>
      <td><?= $data["jumlah"]*$data["harga"]; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>