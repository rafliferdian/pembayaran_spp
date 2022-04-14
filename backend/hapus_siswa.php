<?php
if($_GET['nisn']){
    include "../koneksi.php";
    $qry_hapus=mysqli_query($conn,"delete from siswa where nisn='".$_GET['nisn']."'");
    if($qry_hapus){
        header("location: ../pages_admin/data_siswa.php");
    } else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');location.href='../pages_admin/data_siswa.php';</script>";
    }
}
?>