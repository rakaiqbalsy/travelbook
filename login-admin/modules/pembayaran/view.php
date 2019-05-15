
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Pembayaran Tiket

    <a class="btn btn-primary btn-social pull-right" href="?module=form_pembayaran&form=add" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  
    // fungsi untuk menampilkan pesan
    // jika alert = "" (kosong)
    // tampilkan pesan "" (kosong)
    if (empty($_GET['alert'])) {
      echo "";
    } 
    // jika alert = 1
    // tampilkan pesan Sukses "Data pembayaran baru berhasil disimpan"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data pembayaran baru berhasil disimpan.
            </div>";
    }
    // jika alert = 2
    // tampilkan pesan Sukses "Data pembayaran berhasil diubah"
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data pembayaran berhasil diubah.
            </div>";
    }
    // jika alert = 3
    // tampilkan pesan Sukses "Data pembayaran berhasil dihapus"
    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data pembayaran berhasil dihapus.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel pembayaran -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">ID Pembayaran</th>
                <th class="center">ID Pembelian</th>
                <th class="center">Tanggal Transaksi</th>
                <th class="center">Subtotal</th>
                <th class="center">Jumlah Bayar</th>
                <th class="center">Status</th>
                <th class="center">Action</th>
                
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel pembayaran
            $query = mysqli_query($mysqli, "SELECT * FROM pembayaran ORDER BY id_pembayaran DESC")
                                            or die('Ada kesalahan pada query tampil Data pembayaran: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
            //   $harga_beli = format_rupiah($data['harga_beli']);
            //   $harga_jual = format_rupiah($data['harga_jual']);
              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='50' class='center'>$no</td>
                      <td width='150' class='center'>$data[id_pembayaran]</td>
                      <td width='180'class='center'>$data[id_pembelian]</td>
                      <td width='150' class='center'>$data[tgl_transaksi]</td>
                      <td width='150' class='center'>$data[subtotal]</td>
                      <td width='100'class='center'>$data[jumlah_bayar]</td>
                      <td width='100'class='center'>$data[status]</td>
                     
                      <td class='center' width='100'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_pembayaran2&form2=edit&id=$data[id_pembayaran]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/pembayaran/proses.php?act=delete&id=<?php echo $data['id_pembayaran'];?>" onclick="return confirm('Anda yakin ingin menghapus pembayaran <?php echo $data['nama_pembayaran']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>

                           <a class="btn btn-primary btn-social pull-right" href="modules/pembayaran/cetak.php?act=print&id=<?php echo $data['id_pembayaran']; ?>" target="_blank">
                            <i class="fa fa-print"></i> Cetak
                          </a>
            <?php
              echo "    </div>
                      </td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content