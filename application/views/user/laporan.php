 <?php 
  $head = array("#","Username","Nama Lengkap","Hak Akses");
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
    </tr>
    <?php } ?>
  </tbody>
</table>