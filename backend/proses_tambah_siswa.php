<?php
// Proses Simpan
include "../koneksi.php";
if(isset($_POST['simpan'])){
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no = $_POST['no'];
    $simpan = mysqli_query($conn, "INSERT INTO siswa VALUES
    ('$nisn', '$nis', '$nama', '$kelas', '$alamat', '$no')");
        if($simpan){
            echo "<script>alert('Sukses menambahkan siswa');location.href=' ../pages_admin/data_siswa.php';</script>";
        }else{
            echo "<script>alert('Data sudah ada');location.href='../pages_admin/tambah_siswa.php';</script>";
        }
}
?>