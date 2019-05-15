<?php

// jika form edit data yang dipilih
// isset : cek data ada / tidak
if ($_GET['form2']=='edit') { 
 if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel pelanggan
      $query = mysqli_query($mysqli, "SELECT * FROM pembelian WHERE id_pembelian='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data Pembelian : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>

<section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Pembelian
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=pembelian"> Pembelian </a></li>
      <li class="active"> Ubah </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start -->
    <form role="form" class="form-horizontal" action="modules/pembelian/proses.php?act=update" method="POST">
          <div class="box-body">
            
             <div class="form-group">
                <label class="col-sm-2 control-label">Id Pembelian</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_pembelian" value="<?php echo $data['id_pembelian']; ?>" readonly required>
                </div>
              </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">ID Pelanggan</label>
              <div class="col-sm-5">
                <select class="chosen-select" name="id_pelanggan" data-placeholder="-- Pilih Pelanggan --" onchange="tampil_pelanggan(this)" autocomplete="off" required>
                  <option value="<?php echo $data['nama_pelanggan'] ?>"></option>
                  <?php
                  $query_pelanggan = mysqli_query($mysqli, "SELECT id_pelanggan, nama_pelanggan FROM data_pelanggan ORDER BY nama_pelanggan ASC")
                  or die('Ada kesalahan pada query tampil pelanggan: '.mysqli_error($mysqli));
                  while ($data_pelanggan = mysqli_fetch_assoc($query_pelanggan)) {
                  echo"<option value=\"$data_pelanggan[id_pelanggan]\"> $data_pelanggan[id_pelanggan] | $data_pelanggan[nama_pelanggan] </option>";
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tgl Pembelian</label>
              <div class="col-sm-5">
                <input type="date" class="form-control" id="tgl_pembelian"  name="tgl_pembelian" value="<?php echo $data['tgl_pembelian'] ?>" readonly required>
              </div>
            </div>

            <hr>
            <div class="form-group">
              <label class="col-sm-2 control-label">ID Jadwal</label>
              <div class="col-sm-5">
                <select class="chosen-select" id="id_jadwal" name="id_jadwal" data-placeholder="-- Pilih Jadwal --"  autocomplete="off" required>
                  <option value="<?php echo $data['id_jadwal'] ?>"></option>
                  <?php
                  $query_pelanggan = mysqli_query($mysqli, "SELECT id_jadwal, nama_jurusan FROM jadwal ORDER BY nama_jurusan ASC")
                  or die('Ada kesalahan pada query tampil jadwal: '.mysqli_error($mysqli));
                  while ($data_jadwal = mysqli_fetch_assoc($query_pelanggan)) {
                  echo"<option value=\"$data_jadwal[id_jadwal]\"> $data_jadwal[id_jadwal] | $data_jadwal[nama_jurusan] </option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Harga Tiket</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="harga"  name="harga" onchange="subtotal()" value="<?php $data['harga'] ?>"  required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Tiket</label>
              <div class="col-sm-5" id="jumlah_tiket_div">
                <input type="number" class="form-control" id="jumlah_tiket"  name="jumlah_tiket" required data-max="8" value="<?php echo $data['jumlah_tiket'] ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Subtotal</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="subtotal"  name="subtotal" value="<?php echo $data['subtotal'] ?>"  required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tgl Berangkat</label>
              <div class="col-sm-5">
                <input type="date" class="form-control" id="tgl_berangkat"  name="tgl_berangkat" value="<?php echo $data['tgl_berangkat'] ?>"  required>
              </div>
            </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=pembelian" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->

            <!-- Modal Footer -->
            
          </div>
    </form>
      </div>
    </div><!-- /.box -->
  </div><!--/.col -->
</section>



<!-- /.content --><!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <!-- fontawesome Plugin JS -->
    <script type="text/javascript" src="assets/plugins/fontawesome-free-5.4.1-web/js/all.min.js"></script>
    <!-- DataTables Plugin JS -->
    <script type="text/javascript" src="assets/plugins/DataTables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/plugins/DataTables/js/dataTables.bootstrap4.min.js"></script>
    <!-- datepicker Plugin JS -->
    <script type="text/javascript" src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- SweetAlert Plugin JS --><!-- 
    <script type="text/javascript" src="assets/plugins/sweetalert/js/sweetalert.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script type="text/javascript" src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script type="text/javascript">
    function subtotal() {
        var jumlah_tiket=$('#jumlah_tiket').val();
        var harga=$('#harga').val();
        var subtotal=0;
        subtotal=parseInt(harga)*(jumlah_tiket);
        console.log(jumlah_tiket);
        console.log(harga);
        console.log(subtotal);
        $('#subtotal').attr('value', subtotal);
    }
    $(document).ready(function() {
      $('#id_jadwal').on('change', function(){
        var id_jadwal=$('#id_jadwal').val();
        //console.log(id_jadwal);
        var link="http://localhost/travel/modules/pembelian/cek_data.php?id_jadwal="+id_jadwal;
        //console.log(link);
        // url for ajax http://localhost/travel/modules/pembelian/cek_data.php?id_jadwal=JDWL-000001
        $.ajax({
          url: link,
          success:function(dt){
            data=JSON.parse(dt);
             // data iku isine object json key harga: xxxxk
            $('#harga').attr('value', data.harga);
            $('#jumlah_tiket').attr('data-max', data.kapasitas);
            $('#jumlah_tiket').attr('max', data.kapasitas);
            $('#jumlah_tiket').attr('placeholder', 'max-'+data.kapasitas);
          }
        });
      });

      $('#jumlah_tiket').on('change', function(){
        var jumlah_tiket=$('#jumlah_tiket').val();
        var max_jumlah_tiket=$('#jumlah_tiket').data('max');
        var harga=$('#harga').val();
        if(parseInt(jumlah_tiket)>parseInt(max_jumlah_tiket)){
          alert('tiket terlalu banyak');
          $('#jumlah_tiket').val(max_jumlah_tiket);
        subtotal=parseInt(harga)*(max_jumlah_tiket);
        $('#subtotal').attr('value', subtotal);
        }
        if(parseInt(jumlah_tiket)<=parseInt(max_jumlah_tiket)){
        subtotal=parseInt(harga)*(jumlah_tiket);
        $('#subtotal').attr('value', subtotal);
        }
      });
    });


    function hitung() {
      harga = parseInt($("#harga").val());
      jumlah_tiket = parseInt($("#jumlah_tiket").val());
      if (isNaN(harga)) harga = 0;
      if (isNaN(jumlah_tiket)) jumlah_tiket = 0;
      subtotal = harga + jumlah_tiket;
      $("#subtotal").empty().append("subtotal:");
      $("#subtotal").append(subtotal);
     // $(".pesan").append("<hr/>kunjungilah <a href='http://adapani.blogspot.com/search/label/ajax'>ADAPANI BLOG untuk ilmu yang lebih mumpuni</a>");
    }

    $("#harga, #jumlah_tiket").keyup(function() {
      hitung();
    });




    // function subtotal() {
    // var harga = parseInt(document.getElementById('harga').value);
    // var jumlah_tiket = parseInt(document.getElementById('jumlah_tiket').value);
    // var subtotal = harga * jumlah_tiket;

    // document.getElementById('subtotal').value = subtotal;
    // }


    </script>
  </body>
</html>
<?php
}
?>