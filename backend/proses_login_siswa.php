<?php
    if($_POST){
    $nisn=$_POST['nisn'];
        if(empty($nisn)){
            echo "<script>alert('NISN tidak boleh kosong');location.href='../login_siswa.php';</script>";
        } else {
            include "../koneksi.php";
            $qry_login_siswa=mysqli_query($conn,"SELECT * FROM siswa WHERE nisn = '".$nisn."' ");
            if(mysqli_num_rows($qry_login_siswa)>0){
            $dt_login=mysqli_fetch_array($qry_login_siswa);
                session_start();
                $_SESSION['nisn']=$dt_login['nisn'];
                $_SESSION['nama']=$dt_login['nama'];
                $_SESSION['status_login']=true;
                header("location: ../pages_siswa/histori_transaksi.php");
            } else {
                echo "<script>alert('NISN tidak ditemukan');location.href='../login_siswa.php';</script>";
            }
        }
    }
?>