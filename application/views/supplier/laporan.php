 <?php 
  $head = array("#","Nama Supplier","Alamat","Email","No Telepon");
  $no=0;
 ?>
  <?php 
  $head = array("#","Nama Supplier","Alamat","Email","No Telepon");
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
      foreach ($supplier as $data){  
        $no++;
    ?>
    <tr>
      <td class="span1"><?= $no; ?></td>
      <td><?= $data["nama"]; ?></td>
      <td><?= $data["alamat"]; ?></td>
      <td><?= $data["email"]; ?></td>
      <td><?= $data["no_telp"]; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>