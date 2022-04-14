<?php
    if($_POST){
        $nisn=$_POST['nisn'];
        $nama=$_POST['nama'];
        $alamat=$_POST['alamat'];
        $no_telp=$_POST['no_telp'];
        $kelas=$_POST['kelas'];

        if(empty($nama)){
            echo "<script>alert('nama tidak boleh kosong');location.href='../pages_admin/edit_siswa.php?nisn=".$nisn."';</script>";
        } elseif(empty($alamat)){
            echo "<script>alert('alamat tidak boleh kosong');location.href='../pages_admin/edit_siswa.php?nisn=".$nisn."';</script>";
        } elseif(empty($no_telp)){
            echo "<script>alert('no. telp tidak boleh kosong');location.href='../pages_admin/edit_siswa.php?nisn=".$nisn."';</script>";
        } else {
            include "../koneksi.php";
            $update = mysqli_query($conn, "UPDATE siswa SET nama='$nama',
                        id_kelas='$kelas', alamat='$alamat', no_telp='$no_telp' 
                        WHERE siswa.nisn='$nisn'") or 
            die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update data');location.href='../pages_admin/data_siswa.php';</script>";
            } else {
               echo "<script>alert('Gagal update data');location.href='../pages_admin/edit_siswa.php?nisn=".$nisn."';</script>";
            }
        } 
    }
?>