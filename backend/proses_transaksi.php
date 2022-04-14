<?php
include "../koneksi.php";
session_start();
// Kita simpan proses simpan datanya disini
if(isset($_POST['simpan'])){
    $petugas = $_POST['petugas'];
    $nisn = $_POST['siswa'];
    $tgl = $_POST['tgl']; $bulan = $_POST['bulan']; $tahun = $_POST['tahun'];
    $spp = $_POST['spp'];
    $jumlah = $_POST['jumlah'];

    $cek = mysqli_query($conn, "SELECT * FROM pembayaran WHERE nisn = '$nisn'");
    $ambil = mysqli_fetch_array($cek);
    
    if($spp == $ambil['id_spp']){

        if($_SESSION['level'] == 'admin' ){
            echo "<script>alert('Tahun spp tersebut sudah ada pada siswa');location.href=' ../pages_admin/transaksi.php';</script>";
        }elseif($_SESSION['level'] == 'petugas' ){
            echo "<script>alert('Tahun spp tersebut sudah ada pada siswa');location.href=' ../pages_petugas/transaksi.php';</script>";
        }

    }

    else{
    $s = mysqli_query($conn,"INSERT INTO pembayaran VALUES
                (NULL, '$petugas', '$nisn', '$tgl', '$bulan', '$tahun', '$spp', '$jumlah')");
    // Arahkan ke menu transaksi

    if($_SESSION['level'] == 'admin' ){
        if($s){
            echo "<script>alert('Transaksi berhasil');location.href=' ../pages_admin/transaksi.php';</script>"; 
        }else{
            echo "<script>alert('Transaksi gagal');location.href=' ../pages_admin/transaksi.php';</script>";
        }
    }elseif($_SESSION['level'] == 'petugas' ){
        if($s){
            echo "<script>alert('Transaksi berhasil');location.href=' ../pages_petugas/transaksi.php';</script>"; 
        }else{
            echo "<script>alert('Transaksi gagal');location.href=' ../pages_petugas/transaksi.php';</script>";
        }
    }
}
}
?>