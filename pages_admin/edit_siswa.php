<?php
    include "../backend/session_admin.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Pembayaran SPP
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
  <section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Selamat Datang !</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Edit Data Siswa</h5>
            </div>
            <?php
            include "../koneksi.php";
            $qry_get_siswa=mysqli_query($conn,"select * from siswa where nisn = '".$_GET['nisn']."'");
            $dt_siswa=mysqli_fetch_array($qry_get_siswa);
            ?>
            <div class="card-body">
              <form role="form text-left" action="../backend/proses_edit_siswa.php" method="POST">
                  <input type="hidden" name="nisn" value="<?= $dt_siswa['nisn']; ?>">
                  <input type="hidden" name="nis" value="<?= $dt_siswa['nis']; ?>">
                <label>Nama :</label>  
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Nama"
                         name="nama" value="<?=$dt_siswa['nama']?>">
                </div>
                <label>Kelas :</label> 
                <div class="mb-3">
                  <select name="kelas" class="form-select">
                  <?php
                    include "../koneksi.php";
                    $qry_kelas=mysqli_query($conn,"SELECT * FROM kelas ORDER BY nama_kelas ASC");
                    while($data_kelas=mysqli_fetch_array($qry_kelas)){
                        if($data_kelas['id_kelas']==$dt_siswa['id_kelas']){
                            $selek="selected";
                        }
                        else {
                            $selek="";
                        }
                        echo '<option value= "'.$data_kelas['id_kelas'].'" '.$selek.' > '.$data_kelas['nama_kelas'].' | '.$data_kelas['kompetensi_keahlian'].'</option>';
                    }
                ?>
                  </select>
                </div>
                <label>Alamat :</label>  
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Alamat"
                         name="alamat" value="<?=$dt_siswa['alamat']?>">
                </div>
                <label>No. Telp :</label>  
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="No. Telp"
                  name="no_telp" value="<?=$dt_siswa['no_telp']?>">
                </div>
                <div class="text-center">
                  <button type="submit" name="simpan" class="btn bg-gradient-dark w-100 my-4 mb-2">Ubah Data Siswa</button>
                </div>
                <p class="text-sm mt-3 mb-0">Tidak jadi mengubah data? <a href="data_siswa.php" class="text-dark font-weight-bolder">Kembali</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>