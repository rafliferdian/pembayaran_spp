<?php
    if($_POST){
        $id=$_POST['id_kelas'];
        $nama=$_POST['nama_kelas'];
        $komp=$_POST['kompetensi_keahlian'];
        $uppercase= strtoupper($komp);

        if(empty($nama)){
            echo "<script>alert('nama kelas tidak boleh kosong');location.href='../pages_admin/edit_kelas.php?id_kelas=".$id."';</script>";
        } elseif(empty($komp)){
            echo "<script>alert('kompetensi keahlian tidak boleh kosong');location.href='../pages_admin/edit_kelas.php?id_kelas=".$id."';</script>";
        } else {
            include "../koneksi.php";
            $update = mysqli_query($conn, "UPDATE kelas SET nama_kelas='$nama',
                        kompetensi_keahlian='$uppercase' 
                        WHERE kelas.id_kelas='$id'") or 
            die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update data');location.href='../pages_admin/data_kelas.php';</script>";
            } else {
               echo "<script>alert('Gagal update data');location.href='../pages_admin/edit_kelas.php?id_kelas=".$id."';</script>";
            }
        } 
    }
?>