<?php
if($_GET['id_kelas']){
    include "../koneksi.php";
    $qry_hapus=mysqli_query($conn,"delete from kelas where id_kelas='".$_GET['id_kelas']."'");
    if($qry_hapus){
        header("location: ../pages_admin/data_kelas.php");
    } else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');location.href='../pages_admin/data_kelas.php';</script>";
    }
}
?>