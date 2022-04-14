<?php
    if($_POST){
        $id=$_POST['id_spp'];
        $tahun=$_POST['tahun'];
        $nom=$_POST['nominal'];

        if(empty($tahun)){
            echo "<script>alert('tahun spp tidak boleh kosong');location.href='../pages_admin/edit_spp.php?id_spp=".$id."';</script>";
        } elseif(empty($nom)){
            echo "<script>alert('nominal spp tidak boleh kosong');location.href='../pages_admin/edit_spp.php?id_spp=".$id."';</script>";
        } else {
            include "../koneksi.php";
            $update = mysqli_query($conn, "UPDATE spp SET tahun='$tahun',
                        nominal='$nom' 
                        WHERE spp.id_spp='$id'") or 
            die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update data');location.href='../pages_admin/data_spp.php';</script>";
            } else {
               echo "<script>alert('Gagal update data');location.href='../pages_admin/edit_spp.php?id_spp=".$id."';</script>";
            }
        } 
    }
?>