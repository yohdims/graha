 <?php 
  $head = array("#","Nama Barang","Stok","Supplier");
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
      foreach ($barang as $data){  
        $no++;
    ?>
    <tr>
      <td style="width:10px;" class="col-1"><?= $no; ?></td>
      <td><?= $data["nama_barang"]; ?></td>
      <td><?= $data["stok"]; ?></td>
      <td><?= $data["nama"]; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>