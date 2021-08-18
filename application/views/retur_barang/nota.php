
<!DOCTYPE html>
<html lang="en">
<head>
<title><?= $judul_tab;?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?= base_url('assets/');?>bootstrap.css" />
<link rel="stylesheet" href="<?= base_url('assets/');?>bootstrap-grid.min.css" />
<!-- <link rel="stylesheet" href="<?= base_url('assets/');?>css/select2.css" /> -->
<!-- <link rel="stylesheet" href="<?= base_url('assets/');?>css/uniform.css" /> -->
<!-- <link rel="stylesheet" href="<?= base_url('assets/');?>css/matrix-style.css" /> -->
<!-- <link rel="stylesheet" href="<?= base_url('assets/');?>css/matrix-media.css" /> -->
<link href="<?= base_url('assets/');?>font-awesome/css/font-awesome.css" rel="stylesheet" />

<!-- <link rel="stylesheet" href="<?= base_url('assets/');?>css/jquery.gritter.css" /> -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>

<style type="text/css">
  *{
    font-size: 14px;
  }
</style>
<body >
<!-- <body > -->

  <div class="col-12" >
<div class="container col-5" >
  <div class="row">
    <div class="col-12 mt-3" >
      <center>
      <b style="font-size: 16px">PT. GRAHA RAJASA YOGYAKARTA</b>
      <br>
      <b style="font-size: 12px">Service Kendaraan Mobil dan Bus</b>
      <br>
      <font style="font-size: 10px">
      Jl. Ringroad Barat No 250, Mlangi, Nogotirto, Kec. Gamping, Kabupaten Sleman, Daerah Istimewa Yogyakarta 555992
      </font>
    </center>
    </div>
  </div>
  <hr>
<div class="container">
  <div class='row'>
  <div class="col-12">
 <?php 
  $head = array("#","Nama Barang","Harga Satuan","Qty","Disc","Subtotal");
  $no=0;
 ?>
  <header>
   <center><b><?= $title ?></b></center>
 </header>
 Tanggal : <?= date("l,d-m-Y",strtotime($penjualan->tanggal)); ?>
 <br>
 No Nota : <?= $penjualan->id_penjualan; ?>
 <br>
 Petugas : <?= $this->session->userdata("username")?>
 <br>
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
    <td><?= $no; ?></td>
    <td><?= $data["nama_barang"]; ?></td>
    <td><?= "Rp. ".number_format($data["harga"]); ?></td>
    <td><?= $data["jumlah"]; ?></td>
    <td><?= "Rp. ".number_format($data["diskon"]); ?></td>
    <td><?= "Rp. ".number_format($data["subtotal"]); ?></td>
  </tr>
  <?php } ?>
  <tfoot>
    <tr>
      <td colspan="5">Total</td>
      <td><?= "Rp. ".number_format($total); ?></td>
    </tr>
  </tfoot>
</tbody>
</table>
  </div>
  </div>
</div>
<div class="row mt-3">
  NB: Barang yang dibeli dapat ditukar jika terjadi kerusakan dalam waktu 1 bulan dari pembelian dengan membawa nota penjualan ini.
  </div>
</div>
  </div>
  <center>
    <a href="#" onclick="window.print()">Cetak</a>
  </center>
</body>
</html>
