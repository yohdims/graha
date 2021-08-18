
<!DOCTYPE html>
<html lang="en">
<head>
<title><?= $judul_tab;?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?= base_url('assets/');?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?= base_url('assets/');?>css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?= base_url('assets/');?>css/select2.css" />
<link rel="stylesheet" href="<?= base_url('assets/');?>css/uniform.css" />
<link rel="stylesheet" href="<?= base_url('assets/');?>css/matrix-style.css" />
<link rel="stylesheet" href="<?= base_url('assets/');?>css/matrix-media.css" />
<link href="<?= base_url('assets/');?>font-awesome/css/font-awesome.css" rel="stylesheet" />

<link rel="stylesheet" href="<?= base_url('assets/');?>css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div class="row-fluid">
  <div id="header">
    <div class="span2">
      <center>
        <img src="<?= base_url('assets/');?>images/Logo.png" class="" width="80px">
      </center>
    </div>
  </div>
</div>
<!--close-Header-part--> 
<div id="search">
  <!-- <input type="text" placeholder="Search here..."/> -->
  <input type="text" value="<?= $this->session->userdata("username")?>" readonly/>
  <input type="text" value="<?= $this->session->userdata("tgl_sekarang")?>" readonly/>
  
  <a title="" href="<?= base_url();?>login/logout">
    <button type="submit" class="tip-bottom" title="Logout"><i class="icon-share-alt icon-white"></i></button>
  </a>
</div>
<!--sidebar-menu-->
<div id="sidebar">
  <ul>
    <?php if ($this->session->userdata("level")=="admin"){?>
    <!-- ===== Admin ===== -->
    <li class="active"><a href="<?= base_url();?>admin/index"><i class="icon icon-home"></i> <span>Home</span></a> </li>
    <li> <a href="<?= base_url();?>admin/order_barang/konfirmasi"><i class="icon icon-user"></i> <span>Konfirmasi Order Barang</span></a> </li>
    <li class="submenu open"> <a href="#"><i class="icon icon-th-list"></i> <span>Data dan Laporan</span> 
      <!-- <span class="label label-important">3</span> -->
    </a>
      <ul>
        <li><a href="<?= base_url();?>admin/barang">Data Barang</a></li>
        <li><a href="<?= base_url();?>admin/supplier">Data Supplier</a></li>
        <!-- <li><a href="<?= base_url();?>admin/member">Data Member</a></li> -->
        <li><a href="<?= base_url();?>admin/user">Data User</a></li>
        <li><a href="<?= base_url();?>admin/penjualan">Data Penjualan</a></li>
        <li><a href="<?= base_url();?>admin/order_barang">Data Barang Masuk</a></li>
        <li><a href="<?= base_url();?>admin/retur_barang">Data Retur Barang</a></li>
        <li><a href="<?= base_url();?>admin/barang/persediaan">Data Persediaan Barang</a></li>
        <li><a href="<?= base_url();?>admin/retur_barang/kembali">Data Pengembalian Barang Ke Supplier</a></li>
      </ul>
    </li>
    <li> <a href="<?= base_url();?>admin/bantuan"><i class="icon icon-user"></i> <span>Bantuan</span></a> </li>


    <?php }else if ($this->session->userdata("level")=="kasir"){ ?>
    <!-- ===== Kasir ===== -->
    <li class="active"><a href="<?= base_url();?>kasir/index"><i class="icon icon-home"></i> <span>Home</span></a> </li>
    </li>
    <li class="submenu open"> <a href="#"><i class="icon icon-th-list"></i> <span>Transaksi</span> 
      <!-- <span class="label label-important">3</span> -->
    </a>
      <ul>
        <li><a href="<?= base_url();?>kasir/index">Kasir</a></li>
        <li><a href="<?= base_url();?>kasir/penjualan">Penjualan</a></li>
        <li><a href="<?= base_url();?>kasir/retur_penjualan">Retur Barang</a></li>
      </ul>
    </li>
    <?php }else if ($this->session->userdata("level")=="gudang"){ ?>
    <!-- ===== Gudang ===== -->
    <li class="active"><a href="<?= base_url();?>gudang/dashboard"><i class="icon icon-home"></i> <span>Home</span></a> </li>
    <li class="submenu open"> <a href="#"><i class="icon icon-th-list"></i> <span>Master Data</span> 
      <!-- <span class="label label-important">3</span> -->
    </a>
      <ul>
        <li><a href="<?= base_url();?>gudang/barang">Data Barang</a></li>
        <li><a href="<?= base_url();?>gudang/supplier">Data Supplier</a></li>
      </ul>
    </li>
    <li class="submenu open"> <a href="#"><i class="icon icon-th-list"></i> <span>Transaksi</span> 
      <!-- <span class="label label-important">3</span> -->
    </a>
      <ul>
        <li><a href="<?= base_url();?>gudang/order_barang/barang_masuk">Barang Masuk</a></li>
        <li><a href="<?= base_url();?>gudang/order_barang">Order Barang</a></li>
        <li><a href="<?= base_url();?>gudang/order_barang/acc">Acc Order Barang</a></li>
      </ul>
    </li>
    <?php } ?>
    
  </ul>
</div>
<!--sidebar-menu-->
<!--main-container-part-->
<div id="content">
 <?php
  if (! empty ($isi)){
      echo $isi;
  }
  ?>

</div>

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>

<!--end-Footer-part-->


</body>

<script src="<?= base_url('assets/');?>js/jquery.min.js"></script> 
<script src="<?= base_url('assets/');?>js/jquery.ui.custom.js"></script> 
<script src="<?= base_url('assets/');?>js/bootstrap.min.js"></script> 
<script src="<?= base_url('assets/');?>js/jquery.uniform.js"></script> 
<script src="<?= base_url('assets/');?>js/select2.min.js"></script> 
<script src="<?= base_url('assets/');?>js/jquery.dataTables.min.js"></script> 
<script src="<?= base_url('assets/');?>js/matrix.js"></script> 
<script src="<?= base_url('assets/');?>js/matrix.tables.js"></script>

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
<script type="text/javascript">
  $("#id_barang").change(function() {
    var id=$('[name="id_barang"]').val();;
    // var harga=$("#harga").val();
    // $("#jumlah").val(1);

    $.ajax({
      type:"POST",
      data:'id_barang='+id,
      url:'<?= base_url()."kasir/index/ambil_data_barang"; ?>',
      dataType :"json",
      success: function(hasil){
        console.log(hasil);
        var harga_jual = hasil.harga_jual;
        $('[name="jumlah"]').val(1);
        // $('[name="jumlah"]').autofocus(true);
        $('[name="nama_barang"]').html(hasil.nama_barang);
        $('[name="harga_jual"]').val(harga_jual);
        $('[name="iharga_jual"]').html("Rp. "+numberFormat(harga_jual));
        diskon_persen();
        // diskon();
      }
    })
    var stok = $("#id_barang option:selected").attr("stok");
    var harga_jual = $("#id_barang option:selected").attr("harga_jual");
    // $('[name="bayar"]').val(harga_jual);
    
      
      })
  
  $('[name="diskon_persen"]').change(function() {
      diskon_persen();
    })
    $('[name="diskon"]').change(function() {
      diskon();
    })
  $('[name="diskon_persen"]').keyup(function() {
      diskon_persen();
      // kembalian();
      })
  $('[name="jumlah"]').change(function() {
      var harga=$('[name="harga_jual"]').val();

      diskon_persen();
      diskon();
    })
  $('[name="diskon"]').keyup(function() {
      diskon();
      // kembalian();
      })

  function diskon() {
    var diskon=new Number($('[name="diskon"]').val());
      var jumlah=new Number($('[name="jumlah"]').val());
    var harga=new Number($('[name="harga_jual"]').val());

      var subtotal=new Number(jumlah*harga);
      var hitung_diskon= diskon/subtotal*100;

      var total=new Number(subtotal-diskon);
      $('[name="diskon_persen"]').val(hitung_diskon);
      $('[name="subtotal"]').val(total);
      $('[name="isubtotal"]').html("Rp."+numberFormat(total));
  }
  function diskon_persen() {
    var diskon=new Number($('[name="diskon"]').val());
    var diskon_persen=new Number($('[name="diskon_persen"]').val());
    var jumlah=new Number($('[name="jumlah"]').val());
    var harga=new Number($('[name="harga_jual"]').val());
      var subtotal=new Number(jumlah*harga);
      var hitung_diskon= diskon_persen/100*subtotal;

      $('[name="diskon"]').val(hitung_diskon);

      var total=new Number(subtotal-hitung_diskon);
      $('[name="subtotal"]').val(total);
      $('[name="isubtotal"]').html("Rp."+numberFormat(total));
  }

  function numberFormat(x){
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
  function kembalian() {
      var bayar=new Number($('[name="bayar"]').val());
      var total=new Number($('[name="total"]').val());
      var kembalian= bayar-total;

      $("#total").html("Rp. "+ numberFormat(kembalian));
  }
  $('[name="bayar"]').keyup(function() {
      kembalian();
      })


  function ambilData(x){
    var id=x;
    // var harga=$("#harga").val();
    // $("#jumlah").val(1);

    $.ajax({
      type:"POST",
      data:'id_det_penjualan='+id,
      url:'<?= base_url()."kasir/index/ambil_data"; ?>',
      dataType :"json",
      success: function(hasil){
        console.log(hasil);
        var id_barang = $("#id_barang option:selected").attr("value");
        // $('[name="id_barang"]').val(hasil[0].id_barang);
        $('[name="id_barang"]').val(hasil[0].id_barang).trigger('change');
        $('[name="id_det_penjualan"]').val(hasil[0].id_det_penjualan);
        $('[name="jumlah"]').val(hasil[0].jumlah);
        $('[name="subtotal"]').val(hasil[0].subtotal);
        $('[name="diskon"]').val(hasil[0].diskon);
        $('[name="harga_jual"]').val(hasil[0].harga);
        $('[name="iharga_jual"]').html("Rp. "+numberFormat(hasil[0].harga));
        $('[name="isubtotal"]').html("Rp. "+numberFormat(hasil[0].subtotal));
        diskon();
      }
    })
  }
  function alasan_retur(x){
    $('[name="id_det_penjualan"]').val(x);
  }
  function cek(){
    var id_penjualan=$('[name="id_penjualan"]').val();
    if(id_penjualan==""){

    }
  }
  function simpanRetur(){
    var id=$('[name="id_det_penjualan"]').val();
    var alasan=$('[name="alasan"]').val();
    var id_penjualan=$('[name="id_penjualan"]').val();
    // var harga=$("#harga").val();
    // $("#jumlah").val(1);

    $.ajax({
      type:"POST",
      data:'id_det_penjualan='+id+'&alasan='+alasan,
      url:'<?= base_url()."kasir/retur_penjualan/input"; ?>',
      dataType :"json",
      success: function(hasil){
        console.log(hasil);
        var tombol="<button type='submit' class='btn btn-primary tip-bottom' title='Cetak'><i class='icon-print'></i> Cetak</button>";
        $('[name="cetak"]').html(tombol);
      }
    })
  }
  function ambilDataDetailPenjualan(x){
    var id=x;
    // var harga=$("#harga").val();
    // $("#jumlah").val(1);

    $.ajax({
      type:"POST",
      data:'id_penjualan='+id,
      url:'<?= base_url()."kasir/retur_penjualan/ambil_data_penjualan"; ?>',
      dataType :"json",
      success: function(hasil){
        console.log(hasil);
        // var id_barang = $("#id_barang option:selected").attr("value");
        // $('[name="id_barang"]').val(hasil[0].id_barang);
        $('[name="id_barang"]').val(hasil[0].id_barang).trigger('change');
        $('#id_penjualan').html(hasil[0].id_penjualan);
        $('[name="id_penjualan"]').val(hasil[0].id_penjualan);
        $('[name="nama"]').html(hasil[0].nama);
        $('[name="nama_lengkap"]').html(hasil[0].nama_lengkap);
        $('[name="tanggal"]').html(hasil[0].tanggal);
        // $('[name="harga_jual"]').val(hasil[0].harga); 
        // $('[name="id_penjualan"]').html(hasil[0].id_penjualan);
        var detail="";
        for (var i = 0 ; i < hasil.length; i++) {
          detail+="<tr><td>"+(i+1)+"</td>"+
            "<td>"+hasil[i].nama_barang+"</td>"+
            "<td>"+hasil[i].jumlah+"</td>"+
            "<td>"+hasil[i].harga+"</td>"+
            "<td>"+hasil[i].diskon+"</td>"+
            "<td>"+hasil[i].subtotal+"</td>"+
            "<td class='span1'> <a href='#myAlert' data-toggle='modal' onclick='alasan_retur("+hasil[i].id_det_penjualan+")' class='btn btn-warning tip-bottom' title='Retur Barang'>Retur</a></td></tr>";
          }
          $('[name="detail_penjualan"]').html(detail);
          
        // diskon();
      }
    })
  }
  function ambil_data(id){
    var id_barang=$('[name="id_barang"]').val(id);
    $('[name="id_barang2"]').val(id).trigger('change');
    var harga_beli = $("#id_barang_order option:selected").attr("harga_beli");
    $('[name="jumlah_order"]').val(1);
    $('[name="harga_beli"]').val(harga_beli);
    $('[name="iharga_beli"]').html("Rp. "+numberFormat(harga_beli));
    hitung_subtotal_order();
  }
  $("#id_barang_order").change(function() {
    var harga_beli = $("#id_barang_order option:selected").attr("harga_beli");

    $('[name="jumlah_order"]').val(1);
    // $('[name="jumlah"]').autofocus(true);
    $('[name="harga_beli"]').val(harga_beli);
    $('[name="iharga_beli"]').html("Rp. "+numberFormat(harga_beli));
    hitung_subtotal_order();
      })
  function hitung_subtotal_order(){
    var harga=$('[name="harga_jual"]').val();
      var jumlah=new Number($('[name="jumlah_order"]').val());
      var harga=new Number($('[name="harga_beli"]').val());

      var subtotal=new Number(jumlah*harga);
       $('[name="subtotal"]').val(subtotal);
      $('[name="isubtotal"]').html("Rp."+numberFormat(subtotal));
  }
   $('[name="jumlah_order"]').change(function() {
      hitung_subtotal_order();
    })
   $('[name="jumlah_order"]').keyup(function() {
      hitung_subtotal_order();
    })

    function ambilDataOrder(x){
    var id=x;
    // var harga=$("#harga").val();
    // $("#jumlah").val(1);

    $.ajax({
      type:"POST",
      data:'id_det_order_brg='+id,
      url:'<?= base_url()."gudang/order_barang/ambil_data"; ?>',
      dataType :"json",
      success: function(hasil){
        console.log(hasil);
        // var id_barang = $("#id_barang option:selected").attr("value");
        // $('[name="id_barang"]').val(hasil[0].id_barang);
        $('[name="id_barang2"]').val(hasil[0].id_barang).trigger('change');
        $('[name="id_supplier"]').val(hasil[0].supplier).trigger('change');
        $('[name="id_det_order_brg"]').val(hasil[0].id_det_order_brg);
        $('[name="jumlah_order"]').val(hasil[0].jumlah);
        $('[name="subtotal"]').val(hasil[0].subtotal);
        $('[name="harga_beli"]').val(hasil[0].harga_beli);
        $('[name="harga_jual"]').val(hasil[0].harga_jual);
        $('[name="iharga_beli"]').html("Rp. "+numberFormat(hasil[0].harga_beli));
        $('[name="isubtotal"]').html("Rp. "+numberFormat(hasil[0].subtotal));
        hitung_subtotal_order();
      }
    })
  }
</script>
</html>
