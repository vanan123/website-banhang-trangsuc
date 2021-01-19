<?php
    session_start();

    if($_SESSION['quyen'] == 0) {
        header('location:login.php');
    }

  require 'cauhinh.php';
    
?>

<?php require 'header.php'; ?>
    <div class="container">
        <div><h2 style="text-align: center;color: #EA4C2A;">HÓA ĐƠN CHI TIẾT</h2></div>
        <div class="receipt-wrap">
            <?php 
                if(isset($_REQUEST['id'])) {
                    $sql = "SELECT `mahoadon`,`hoten`, product.matrangsuc,`tentrangsuc`,`giaban`,`soluongdaban`,`giaban`*`soluongdaban` as `thanhtien`,`ngaylap`,`diachigiaohang`,card.mathe,trangthai FROM `thanhvien` user, `hoadon` payment,`hoadonchitiet` detail,`trangsuc` product,`thethanhtoan` card WHERE payment.mathanhvien = user.mathanhvien and detail.idhoadon = payment.mahoadon and product.matrangsuc = detail.idtrangsuc and payment.mathe = card.mathe AND mahoadon = ".$_REQUEST['id'];
                    $query = mysqli_query($conn, $sql);
                    $total_price = 0;
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID trang sức</th>
                        <th>Tên trang sức</th>
                        <th>Đơn giá</th>
                        <th>Số lượng đã bán</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            while($row = mysqli_fetch_assoc($query)) {
                                echo "
                                    <tr>
                                        <td>".$row['matrangsuc']."</td>
                                    
                                        <td>".$row['tentrangsuc']."</td>
                                    
                                        <td>".number_format($row['giaban'])."<strong>VNĐ</strong></td>
                                    
                                        <td>".$row['soluongdaban']."</td>
                                    
                                        <td>".number_format($row['thanhtien'])."VNĐ</td>                                    
                                    </tr>
                                ";
                                $total_price+= $row['thanhtien'];
                                $card = $row['mathe'];
                                $user = $row['hoten'];
                                $date = $row['ngaylap'];
                                $address = $row['diachigiaohang'];
                                $status = $row['trangthai'];
                            }
                        }
                    ?>
                </tbody>
            </table>
            <hr>
            <div class="info">
                <p><strong>Mã thẻ thanh toán: </strong><?php echo $card ?></p>
                 <p><strong>Tên người thanh toán: </strong><?php echo $user ?></p>
                <p><strong>Ngày:</strong><?php echo $date ?></p>
                <p><strong>Địa chỉ:</strong><?php echo $address ?></p>
                <p><strong>Thành tiền:</strong><?php echo number_format($total_price) ?><strong>VNĐ</strong></p>
               <?php   echo'<p style="color:'.sttcolor($status).'"><strong>Trạng thái: '.stt($status).'</strong></p>';
               ?>
                    <?php  
                    function stt($trangthai){
                                if($trangthai == "0") return 'Đang vận chuyển';
                                if($trangthai == "1") return 'Đã nhận';
                                 if($trangthai == "2") return 'Hủy';
                             }
                             function sttcolor($stt) {
                                if($stt == '0') return '#f1c40f';
                                if($stt == '1') return '#1b00b5';
                                if($stt == '2') return '#EA2027';
                            
                            }
                    ?>
             </div>
            <hr>
        </div>
        <a href="managepayment.php" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Quay lại </a>
    </div>
  </body>
 
</html>