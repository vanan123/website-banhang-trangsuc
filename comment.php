<?php
require 'cauhinh.php';
    session_start();
    $cmt = $_REQUEST['cmt'];
    $productid = $_REQUEST['productid'];
    $userid = $_REQUEST['userid'];
    $date = date("y-m-d");
    if(isset($_REQUEST['parentid'])){
            $idcomt = $_REQUEST['parentid'];
    $sql ="INSERT INTO traloibinhluan(`idBinhluan`,`idThanhvien`,`Noidung`,`ngay`) VALUES ('".$idcomt."','".$userid."','".$cmt."','".$date."')";
}
else{
    $sql = "INSERT INTO binhluan (`idtrangsuc`, `idthanhvien`, `noidung`, `thoigian`) VALUES ('".$productid."','".$userid."', '".$cmt."', '".$date."');";
    }
    $query = mysqli_query($conn, $sql);

    $sql = "SELECT mathanhvien, hoten FROM thanhvien WHERE mathanhvien = " .$userid;
    $query = mysqli_query($conn, $sql);
    $userinfo = mysqli_fetch_row($query);
    $user = $userinfo[1];

    echo "
        <div class='comment'>
            <p class='cmt-user'><span class='icon-user'></span> ".$user."<span class='text-muted small'> --- Ngày đăng: ".$date."</span><p>
            <div class='cmt-commment'>
                ".$cmt."
            </div>                                         
        </div>
        <br>
    ";
?>