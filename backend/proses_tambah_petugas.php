<?php
// Proses Simpan
include "../koneksi.php";
if(isset($_POST['simpan'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $simpan = mysqli_query($conn, "INSERT INTO petugas VALUES(NULL, '$username', '$password', '$nama', 'Petugas')");
        if($simpan){
            echo "<script>alert('Sukses menambahkan petugas');location.href=' ../pages_admin/data_petugas.php';</script>";
        }else{
            echo "<script>alert('Data sudah ada');location.href='../pages_admin/tambah_petugas.php';</script>";
        }
}
?>