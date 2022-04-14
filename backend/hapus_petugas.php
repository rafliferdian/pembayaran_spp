<?php
if($_GET['id_petugas']){
    include "../koneksi.php";
    $qry_hapus=mysqli_query($conn,"delete from petugas where id_petugas='".$_GET['id_petugas']."'");
    if($qry_hapus){
        header("location: ../pages_admin/data_petugas.php");
    } else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');location.href='../pages_admin/data_petugas.php';</script>";
    }
}
?>