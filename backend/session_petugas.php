<?php
    session_start();
    if($_SESSION['level'] != 'petugas' ){
        header('location: ../login.php');
    }
?>