<?php
require 'cauhinh.php';
session_start();
if($_SESSION['quyen']!='0'){
       echo '<script language="javascript"> 
  window.location="login.php"</script>';
}
require 'pagination.php'; 
 ?>
    <?php require 'header.php'; ?>
     <h1 class="text-center mt-2">Đơn hàng của tôi</h1>
    <main>
        <div class="container">
            <div class="table-responsive-md">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên trang sức</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th>Mã thẻ thanh toán</th>
                            <th>SĐT</th>
                            <th>Địa chỉ</th>
                            <th>Ngày lập</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                          <?php
                        $sql = "SELECT count(mahoadon) as 'total' from hoadon where mathanhvien = ".$_SESSION['idthanhvien'];
                        $kq = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($kq);
                        $total_rc = $row['total']; 
                        $cr_page = isset($_GET['page'])? ($_GET['page']):1;
                        $limit = 5;
                        $total_page = ceil($total_rc/$limit);
                        if($cr_page>$total_page){
                            $cr_page = $total_page;
                        }
                        else if($cr_page<1){
                            $cr_page = 1;
                        }
                        $start = ($cr_page - 1)*$limit; 
                         ?>
                        <?php
                            $query = "SELECT hoadon.mahoadon,tentrangsuc,soluongdaban,tongtien,mathe,sdt,diachigiaohang,ngaylap,trangthai FROM hoadon,trangsuc,hoadonchitiet WHERE mahoadon = idhoadon and idtrangsuc = matrangsuc and mathanhvien = ".$_SESSION['idthanhvien']." limit $start,$limit ";
                            $rs = mysqli_query($conn, $query);
                            
                            while($row = mysqli_fetch_assoc($rs)) {
                                echo '<tr>
                                        <td>'.$row['mahoadon'].'</td>
                                        <td>'.$row['tentrangsuc'].'</td>
                                        <td>'.$row['soluongdaban'].'</td>
                                        <td>'.number_format($row['tongtien']).'VNĐ</td>
                                        <td>'.$row['mathe'].'</td>
                                        <td>'.$row['sdt'].'</td>
                                        <td>'.$row['diachigiaohang'].'</td>
                                        <td>'.$row['ngaylap'].'</td>
                                       <td style="color:'.sttcolor($row['trangthai']).'; font-weight: 600">
                                            <p style="cursor: pointer" onclick="confirm(this,'.$row['mahoadon'].');">'.stt($row['trangthai']).'</p>
                                        </td>';
                                        if($row['trangthai'] == 0){
                                        echo'<td>   
                                        <div class="mb-1">
                                                <form action ="delete.php" method="GET">
                                                    <input  type="hidden" name="idhoadon" value="'.$row['mahoadon'].'">
                                                    <input class="btn btn-danger" type="submit" name="delete-product" value="Hủy">   
                                                </form>
                                            </div>
                                             <form action ="delete.php" method="GET">
                                                    <input  type="hidden" name="idhoadon1" value="'.$row['mahoadon'].'">
                                                    <input class="btn btn-primary" type="submit" name="delete-product" value="Đã nhận">   
                                                </form>
                                            </div>
                                            </td>';
                                        }
                                    echo'</tr>';
                            }
                             function sttcolor($stt) {
                                if($stt == '0') return '#f1c40f';
                                if($stt == '1') return '#20e8e8';
                                if($stt == '2') return '#EA2027';
                            
                            }
                            function stt($trangthai){
                                if($trangthai == "0") return 'Đang vận chuyển';
                                if($trangthai == "1") return 'Đã nhận';
                                 if($trangthai == "2") return 'Hủy';
                            }
            
    ?>
         
                    </tbody>  
                </table>
                 
            </div>
            <?php 
                 echo'<hr class="soften"/>
  <div class="center">
    <div class="pagination">';
        if($cr_page > 1 && $total_page > 1){
     echo'<a class="page-link" href="mypayment.php?page='.($cr_page - 1 ).'">Previous</a>';
    }
     for($i = 1; $i <= $total_page;$i++){ 
        if($i == $cr_page){
     echo'<a class="active" href="#">'.$i.'</a>';
     }else{
         echo'<a class="page-link" href="mypayment.php?page='.$i.'">'.$i.'</a>';
     }
    }
    if($cr_page < $total_page && $total_page > 1){
  echo'<a class="page-link" href="mypayment.php?page='.($cr_page + 1).'">Next</a>';
    }
        echo'</div>
        </div>';
             ?>
        </div>
    </main>
    <?php 
    require 'footer.php'; ?>
</div>
</body>
</html>