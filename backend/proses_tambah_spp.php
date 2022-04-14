<?php
// Proses Simpan
include "../koneksi.php";
if(isset($_POST['simpan'])){
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];
    
    $simpan = mysqli_query($conn, "INSERT INTO spp VALUES(NULL, '$tahun', '$nominal') ");
        if($simpan){
            echo "<script>alert('Sukses menambahkan data');location.href=' ../pages_admin/data_spp.php';</script>";
        }else{
            echo "<script>alert('Gagal menambahkan data');location.href='../pages_admin/tambah_spp.php';</script>";
        }
}
?>