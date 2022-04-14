<?php
// Proses Simpan
include "../koneksi.php";
if(isset($_POST['simpan'])){
    $nama = $_POST['nama_kelas'];
    $komp = $_POST['kompetensi_keahlian'];
    $uppercase = strtoupper($komp);
    
    $simpan = mysqli_query($conn, "INSERT INTO kelas VALUES(NULL, '$nama', '$uppercase') ");
        if($simpan){
            echo "<script>alert('Sukses menambahkan data');location.href=' ../pages_admin/data_kelas.php';</script>";
        }else{
            echo "<script>alert('Gagal menambahkan data');location.href='../pages_admin/tambah_kelas.php';</script>";
        }
}
?>