 <?php 
  $head = array("No","Id Barang","Nama Barang","Jumlah");
  $no=0;
 ?>
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
      foreach ($detail_order as $data){  
        $no++;
    ?>
    <tr>
      <td class="span1"><?= $no; ?></td>
      <td><?= $data["id_barang"]; ?></td>
      <td><?= $data["nama_barang"]; ?></td>
      <td><?= $data["jumlah"]; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>