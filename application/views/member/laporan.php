 <?php 
  $head = array("#","Nama Member","NIK","Alamat","Jenis Kelamin","Email","No Telepon");
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
      foreach ($member as $data){  
        $no++;
    ?>
    <tr>
      <td class="span1"><?= $no; ?></td>
      <td><?= $data["nama"]; ?></td>
      <td><?= $data["no_ktp"]; ?></td>
      <td><?= $data["alamat"]; ?></td>
      <td><?php if($data["jenis_kelamin"]=="L"){echo "Laki-laki";}else{echo "Perempuan";} ?></td>
      <td><?= $data["email"]; ?></td>
      <td><?= $data["no_telp"]; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>