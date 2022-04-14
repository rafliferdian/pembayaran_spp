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
    <title>Pembayaran SPP</title>
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

  <body class="bg-gray-100">
    <main
      class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg"
    >
      <!-- Navbar -->
      <nav
        class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl"
        id="navbarBlur"
        navbar-scroll="true"
      >
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol
              class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5"
            >
              <li class="breadcrumb-item text-sm">
                <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
              </li>
              <li
                class="breadcrumb-item text-sm text-dark active"
                aria-current="page"
              >
                Siswa
              </li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Histori Pembayaran</h6>
          </nav>
          <div
            class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4"
            id="navbar"
          >
            <ul class="navbar-nav ms-md-auto pe-md-3 d-flex align-items-center">
              <li class="nav-item d-flex align-items-center">
                <a
                  href="../backend/logout.php"
                  class="nav-link text-body font-weight-bold px-0"
                >
                  <i class="fa fa-user me-sm-1"></i>
                  <span class="d-sm-inline d-none">Log Out</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Histori Pembayaran</h6>
              </div>
              <?php include "../koneksi.php";
              session_start(); ?>
              <div class="card-body px-4 pt-0 pb-2">
              <?php
                  $nisn = $_SESSION['nisn'];
                  // Kita panggil table siswa
                  $biodataSiswa = mysqli_query($conn, "SELECT * FROM siswa 
                                  JOIN kelas ON siswa.id_kelas=kelas.id_kelas 
                                  WHERE nisn='$nisn'");
                  $r_siswa = mysqli_fetch_assoc($biodataSiswa);
              ?>


              <!-- Kita tampilkan Biodata Siswa -->
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
                        <?php }else{
                          ?><td class="align-middle text-center text-sm">
                              <span class="badge badge-sm bg-gradient-danger">Belum Lunas</span>
                            </td>
                        <?php } ?>

                      </tr>
                        <?php } ?>  
                    </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
      var win = navigator.platform.indexOf("Win") > -1;
      if (win && document.querySelector("#sidenav-scrollbar")) {
        var options = {
          damping: "0.5",
        };
        Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
      }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
  </body>
</html>
