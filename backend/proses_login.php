<?php
    if($_POST){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $level=$_POST['level'];
        if(empty($username)){
            echo "<script>alert('Username tidak boleh kosong');location.href='../login.php';</script>";
        } else if(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='../login.php';</script>";
        } else {
            include "../koneksi.php";
            $qry_login_petugas=mysqli_query($conn,"SELECT * FROM petugas WHERE username = '".$username."' and password = '".$password."'");
            if(mysqli_num_rows($qry_login_petugas)>0){
            $dt_login=mysqli_fetch_array($qry_login_petugas);
                if($dt_login['level'] == 'admin'){
                    session_start();
                    $_SESSION['id_petugas']=$dt_login['id_petugas'];
                    $_SESSION['nama_petugas']=$dt_login['nama_petugas'];
                    $_SESSION['level'] = "admin";
                    $_SESSION['status_login']=true;
                    header("location: ../pages_admin/data_siswa.php");
                }elseif($dt_login['level'] == 'petugas'){
                    session_start();
                    $_SESSION['id_petugas']=$dt_login['id_petugas'];
                    $_SESSION['nama_petugas']=$dt_login['nama_petugas'];
                    $_SESSION['level'] = "petugas";
                    $_SESSION['status_login']=true;
                    header("location: ../pages_petugas/transaksi.php");
                }
            } else {
                echo "<script>alert('Username dan Password tidak ditemukan');location.href='../login.php';</script>";
            }
        }
    }
?>