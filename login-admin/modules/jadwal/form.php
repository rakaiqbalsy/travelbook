
 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input jadwal
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=jadwal"> jadwal </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/jadwal/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat id transaksi
             $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_jadwal,6) as kode FROM jadwal
                                                ORDER BY id_jadwal DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil id_jadwal : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              
              if ($count <> 0) {
                  // mengambil data kode_jadwal
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_karyawan
              $buat_id   = str_pad($kode, 6, "0", STR_PAD_LEFT);
              $id_jadwal = "JDWL-$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Id jadwal</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_jadwal" value="<?php echo $id_jadwal; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Jurusan</label>
                <div class="col-sm-5">
                   <select class="form-control" name="nama_jurusan" required>
                    <option value=""></option>
                    <option value="Yogyakarta-Bandung ">Yogyakarta-Bandung</option>
                    <option value="Bandung-Yogyakarta">Bandung-Yogyakarta</option>
                  </select>
                </div>
              </div>


               <div class="form-group">
                <label class="col-sm-2 control-label">Jam berangkat</label>
                <div class="col-sm-5">
                   <select class="form-control" name="jam_berangkat" required>
                    <option value=""></option>
                    <option value="09:00">09:00</option>
                    <option value="20:00">20:00</option>
                    <option value="10:00">10:00</option>
                    <option value="22:00">22:00</option>
                    <option value="08:30">08:30</option>
                    <option value="20:30">20:30</option>
                    <option value="07:30">07:30</option>
                    <option value="19:30">19:30</option>
                    <option value="20:00">20:00</option>
                    <option value="07:00">07:00</option>
                    <option value="18:30">18:30</option>
                  </select>
                </div>
              </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Harga</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input type="text" class="form-control" id="harga" name="harga" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kapasitas</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input type="text" class="form-control" id="kapasitas" name="kapasitas" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                  </div>
                </div>
              </div>

              

              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=jadwal" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel jadwal
      $query = mysqli_query($mysqli, "SELECT * FROM data_jadwal WHERE id_jadwal='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data jadwal : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah jadwal
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=jadwal"> jadwal </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/jadwal/proses.php?act=update" method="POST">
            <div class="box-body">
             
              <div class="form-group">
                <label class="col-sm-2 control-label">Id jadwal</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_jadwal" value="<?php echo $data['id_jadwal']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Jurusan</label>
                <div class="col-sm-5">
                  <select class="form-control" name="nama_jurusan" required>
                    <option value=""></option>
                    <option value="Yogyakarta-Bandung ">Yogyakarta - Bandung </option>
                    <option value="Bandung-Yogyakarta">Bandung - Yogyakarta</option>
                  </select>
                </div>
              </div>


               <div class="form-group">
                <label class="col-sm-2 control-label">Harga</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="harga" autocomplete="off" value="<?php echo $data['harga']; ?>" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Jam Berangkat</label>
                <div class="col-sm-5">
                  <select class="form-control" name="jam_berangkat" required>
                    <option value=""></option>
                    <option value="09:00">09:00</option>
                    <option value="20:00">20:00</option>
                    <option value="10:00">10:00</option>
                    <option value="22:00">22:00</option>
                    <option value="08:30">08:30</option>
                    <option value="20:30">20:30</option>
                    <option value="07:30">07:30</option>
                    <option value="19:30">19:30</option>
                    <option value="20:00">20:00</option>
                    <option value="07:00">07:00</option>
                    <option value="18:30">18:30</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kapasitas</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kapasitas" autocomplete="off" value="<?php echo $data['kapasitas']; ?>"required>
                </div>
              </div>

            

            </div> <!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=jadwal" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>