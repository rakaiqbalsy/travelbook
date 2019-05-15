<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>NOTA PEMBELIAN TIKET</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>
        <div id="title">
            NOTA PEMBELIAN TIKET 
        </div>
        
        <hr><br>

        <div id="isi">
            <table width="50%" border="0.3" cellpadding="0" align="center" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">

                        <th height="20" align="center" valign="middle">NO.</th>
                        <th height="25" align="center" valign="middle">ID Pembelian</th>
                        <th height="25" align="center" valign="middle">Tgl Transaksi</th>
                        <th height="25" align="center" valign="middle">Nama User</th>
                        <th height="25" align="center" valign="middle">ID Jadwal</th>
                        <th height="25" align="center" valign="middle">Harga</th>
                        <th height="25" align="center" valign="middle">Jumlah Tiket</th>
                        <th height="25" align="center" valign="middle">Subtotal</th>
                        
                
                    </tr>
                </thead>
                <tbody>
        <?php
        // tampilkan data
        while ($data = mysqli_fetch_assoc($query)) {
           // $harga_beli = format_rupiah($data['harga_beli']);
           // $harga_jual = format_rupiah($data['harga_jual']);
            // menampilkan isi tabel dari database ke tabel di aplikasi
            echo "  <tr>
                        <td width='75' height='13' align='center' valign='middle'>$no</td>
                        <td width='75' height='13' align='center' valign='middle'>$data[id_pembelian]</td>
                        <td style='padding-left:5px;' width='75' height='13' valign='middle'>$data[tgl_pembelian]</td>
                        <td width='75' height='13' align='center' valign='middle'>$data[nama_user]</td>
                        <td width='75' height='13' align='center' valign='middle'>$data[id_jadwal]</td>
                        <td width='75' height='13' align='center' valign='middle'>$data[harga]</td>
                        <td width='75' height='13' align='center' valign='middle'>$data[jumlah_tiket]</td>
                        <td width='75' height='13' align='center' valign='middle'>$data[subtotal]</td>
                    </tr>";
            $no++;
        }
        ?>  
                </tbody>
            </table>

            <div id="footer-tanggal">
                Yogyakarta, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
            </div>
            <div id="footer-jabatan">
                Pimpinan
            </div>
            
            <div id="footer-nama">
                RAKA IQBAL SY
            </div>
        </div>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->