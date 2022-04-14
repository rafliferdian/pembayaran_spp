<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="../assets/img/apple-icon.png"
    />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Histori Pembayaran SPP</title>
    <!--     Fonts and icons     -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
      rel="stylesheet"
    />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script
      src="https://kit.fontawesome.com/42d5adcbca.js"
      crossorigin="anonymous"
    ></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link
      id="pagestyle"
      href="../assets/css/soft-ui-dashboard.css?v=1.0.3"
      rel="stylesheet"
    />
  </head>
  <body>
    <?php
    include "../koneksi.php";
    
    session_start();
    $nisn = $_SESSION['nisn_siswa'];

      // Kita panggil table siswa
      $biodataSiswa = mysqli_query($conn, "SELECT * FROM siswa 
                                  JOIN kelas ON siswa.id_kelas=kelas.id_kelas 
                                  WHERE nisn='$nisn'");

      $r_siswa = mysqli_fetch_assoc($biodataSiswa);
    ?>
    <h5 class="font-weight-bolder mb-0 px-1">Biodata Siswa</h5>
    <table cellpadding="5">
      <tr>
        <td>NISN</td>
        <td>:</td>
        <td><?= $r_siswa['nisn']; ?></td>
      </tr>
      <tr>
        <td>NIS</td>
        <td>:</td>
        <td><?= $r_siswa['nis']; ?></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?= $r_siswa['nama']; ?></td>
      </tr>
      <tr>
        <td>Kelas</td>
        <td>:</td>
        <td><?= $r_siswa['nama_kelas'] . " | " . $r_siswa['kompetensi_keahlian']; ?></td>
      </tr>
    </table>

    <hr />

    <div class="table-responsive p-0">
      <table class="table align-items-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Pembayaran</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Petugas</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun SPP | Nominal yang harus dibayar</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah yang sudah dibayar</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no=0;
            $historyPembayaran = mysqli_query($conn, "SELECT * FROM pembayaran
                                  JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas
                                  JOIN spp ON pembayaran.id_spp=spp.id_spp
                                  WHERE nisn='$nisn'
                                  ORDER BY tahun_dibayar");
            while($r_trx = mysqli_fetch_assoc($historyPembayaran)){
              $no++;
          ?>
          <tr>
            <td>
              <div class="d-flex px-3 py-1">        
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-sm"><?=$no?>.</h6>
                </div>
              </div>
            </td>
            <td>
              <div class="d-flex px-2 py-1">        
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-sm"><?= $r_trx['tgl_bayar'] . " " . $r_trx['bulan_dibayar'] . " " . $r_trx['tahun_dibayar']; ?></h6>
                </div>
              </div>
            </td>
            <td class="align-middle">
              <span class="text-secondary text-xs font-weight-bold"><?=$r_trx['nama_petugas']?></span>
            </td>
            <td>
              <div class="d-flex px-6 py-1">        
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="text-secondary text-xs font-weight-bold"><?=$r_trx['tahun'] . " | Rp. " . $r_trx['nominal']?></h6>
                </div>
              </div>
            </td>            
            <td>
              <div class="d-flex px-5 py-1">        
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="text-secondary text-xs font-weight-bold"><?="Rp. " . $r_trx['jumlah_bayar']?></h6>
                </div>
              </div>
            </td>
            <?php
              if($r_trx['jumlah_bayar'] == $r_trx['nominal']){ ?>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-success">Lunas</span>
                </td>
            <?php }else{ ?>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-danger">Belum Lunas</span>
                </td>
            <?php } ?>
          </tr>
          <?php } ?>  
        </tbody>
      </table>
  </body>
  <script>
    window.print();
  </script>
  <!-- <script>
    function doPrint() {
    window.onload=function(){window.print(); setTimeout(window.close, 500);};       
    }
    doPrint();
  </script> -->
  <!-- <script>
    window.print();
    document.location.href = "histori_transaksi.php";
  </script> -->
</html>