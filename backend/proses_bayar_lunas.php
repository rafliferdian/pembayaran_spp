<?php
if($_GET['id_pembayaran']){
    include "../koneksi.php";
    $lunas=mysqli_query($conn,"UPDATE pembayaran, spp SET jumlah_bayar = spp.nominal WHERE pembayaran.id_pembayaran='".$_GET['id_pembayaran']."' AND pembayaran.id_spp = spp.id_spp");

    session_start();
    if($_SESSION['level'] == 'admin' ){
        if($lunas){
            echo "<script>alert('Pembayaran lunas berhasil');location.href='../pages_admin/histori_transaksi.php';</script>";
        } else{
            echo "<script>alert('Gagal bayar lunas');location.href='../pages_admin/histori_transaksi.php';</script>";
        }
    }elseif($_SESSION['level'] == 'petugas' ){
        if($lunas){
            echo "<script>alert('Pembayaran lunas berhasil');location.href='../pages_petugas/histori_transaksi.php';</script>";
        } else{
            echo "<script>alert('Gagal bayar lunas');location.href='../pages_petugas/histori_transaksi.php';</script>";
        }
    }
}
?>