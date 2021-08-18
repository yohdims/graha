
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


<body onload="popup_print()">
<!-- <body > -->
  <center>

  <div class="col-12">
<div class="container" >
  <div class="row">
    <div class="col-2 mt-3">
      <center>
      <img src="<?= base_url('assets/');?>images/logo.png" width="100%">
      </center>
    </div>
    <div class="col-10 mt-3" >
      <center>
      <b style="font-size: 30px">PT. GRAHA RAJASA YOGYAKARTA</b>
      <br>
      <b style="font-size: 20px">Service Kendaraan Mobil dan Bus</b>
      <br>
      Jl. Ringroad Barat No 250, Mlangi, Nogotirto, Kec. Gamping, Kabupaten Sleman, Daerah Istimewa Yogyakarta 555992
    </center>
    </div>
  </div>
  <hr>
<div class="container">
  <div class='row'>
  <div class="col-12">
 <?php
  if (! empty ($isi)){
      echo $isi;
  }
  ?>
  </div>
  </div>
</div>
<div class="row mt-3">
    <div class="col">
    </div>
    <div class="col-5 pull-right">
      Mengetahui,<br>
      Pimpinan PT. Graha Rajasa
      <div style="height: 100px">
        
      </div>
      <hr>
    </div>
  </div>
</div>
  </div>
    <a href="#" onclick="window.print()">Cetak</a>
  </center>
</body>
</html>
