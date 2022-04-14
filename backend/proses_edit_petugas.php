<?php
    if($_POST){
        include "../koneksi.php";
        $id_petugas=$_POST['id_petugas'];
        $nama_petugas=$_POST['nama_petugas'];
        $username=$_POST['username'];
        $password=$_POST['password'];

        if(empty($nama_petugas)){
            echo "<script>alert('nama tidak boleh kosong');location.href='../pages_admin/edit_petugas.php?id_petugas=".$id_petugas."';</script>";
        } elseif(empty($username)){
            echo "<script>alert('username tidak boleh kosong');location.href='../pages_admin/edit_petugas.php?id_petugas=".$id_petugas."';</script>";
        } else {
            if(empty($password)){
                $update=mysqli_query($conn,"UPDATE petugas SET username='$username', nama_petugas='$nama_petugas' 
                WHERE petugas.id_petugas='$id_petugas'") or
                die(mysqli_error($conn));
                if($update){
                    echo "<script>alert('Sukses update data');location.href='../pages_admin/data_petugas.php';</script>";
                } else {
                    echo "<script>alert('Gagal update data');location.href='../pages_admin/edit_petugas.php?id_petugas=".$id_petugas."';</script>";
                }
            } else {
                $update=mysqli_query($conn,"UPDATE petugas SET username='$username', password='$password', nama_petugas='$nama_petugas' 
                WHERE petugas.id_petugas='$id_petugas'") or
                die(mysqli_error($conn));
                if($update){
                    echo "<script>alert('Sukses update data');location.href='../pages_admin/data_petugas.php';</script>";
                } else {
                    echo "<script>alert('Gagal update data');location.href='../pages_admin/edit_petugas.php?id_petugas=".$id_petugas."';</script>";
                }
            }
        }
    }
?>