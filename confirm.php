<?php 
require 'cauhinh.php';
    session_start();
    if(!isset($_SESSION['idthanhvien'])) {
        header("location:login.php");
    }

    if(isset($_REQUEST['id'])) {
        $sql = "UPDATE `hoadon` SET `trangthai` = '1' WHERE mahoadon = {$_REQUEST['id']}";
        $query = mysqli_query($conn, $sql);

        echo "ok";
    }else {
        echo "err";
    }
?>