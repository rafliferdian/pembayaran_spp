<?php
if($_GET['id_spp']){
    include "../koneksi.php";
    $qry_hapus=mysqli_query($conn,"delete from spp where id_spp='".$_GET['id_spp']."'");
    if($qry_hapus){
        header("location: ../pages_admin/data_spp.php");
    } else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');location.href='../pages_admin/data_spp.php';</script>";
    }
}
?>