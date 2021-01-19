<?php
require 'cauhinh.php';
session_start();
if($_SESSION['quyen']!='1'){
       echo '<script language="javascript">alert("Bạn không phải là admin"); 
  window.location="login.php"</script>';
}
 ?>
<?php require 'header.php'; ?>
	 <h1 class="text-center mt-2">Quản lý hóa đơn</h1>
    <main>
        <div class="container">
            <div class="table-responsive-md">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Mã thẻ thanh toán</th>
                            <th>Mã thành viên</th>
                            <th>Ngày mua</th>
                            <th>Tổng tiền</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT count(mahoadon) as 'total' from hoadon";
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
                            $query = "SELECT * FROM hoadon limit $start,$limit ";
                            $rs = mysqli_query($conn, $query);
                            
                            while($row = mysqli_fetch_assoc($rs)) {
                                echo '<tr>
                                        <td><a class="btn btn-primary" href="payment_detail.php?id='.$row['mahoadon'].'" target="_blank">Xem</a></td>
                                        <td>'.$row['mahoadon'].'</td>
                                        <td>'.$row['mathe'].'</td>
                                        <td>'.$row['mathanhvien'].'</td>
                                        <td>'.$row['ngaylap'].'</td>
                                        <td>'.number_format($row['tongtien']).'<strong>VNĐ</strong></td>
                                        <td>'.$row['email'].'</td>
                                        <td>'.$row['sdt'].'</td>
                                        <td>'.$row['diachigiaohang'].'</td>
                                        <td style="color:'.sttcolor($row['trangthai']).'; font-weight: 600">
                                            <p style="cursor: pointer" onclick="confirm(this,'.$row['mahoadon'].');">'.stt($row['trangthai']).'</p>
                                        </td>
                                        
                                    </tr>';
                                }
                                 function sttcolor($stt) {
                                if($stt == '0') return '#f1c40f';
                                if($stt == '1') return '#20e8e8';
                                if($stt == '2') return '#EA2027';
                            
                            }
                            function stt($trangthai){
                                if($trangthai == "0") return 'Đang vận chuyển';
                                if($trangthai == "1") return 'Đã giao hàng';
                                 if($trangthai == "2") return 'Hủy';
                            }
			
    ?>
         
                    </tbody>  
                     <script>
                                function confirm(status, id) {
                                    let url = `confirm.php?id=${id}`;
                                    loadDoc(url, change = (xhttp) => {
                                        {   
                                            if(xhttp.responseText == 'ok') {
                                                status.innerHTML = "Đã giao hàng";
                                                status.style.color = "#20e8e8";
                                            }else {
                                                window.alert('err');
                                            }
                                        }
                                    });
                                }
                            </script>
                </table>
                <br>
                <hr class="soften"/>
                  <div style="margin: 1em 0 0 0;">
                           <a href="statistic.php?month=1" class="shopBtn btn-large pull-right" style="font-size: 15px;"><span class="icon-money"></span><b> THỐNG KÊ DOANH THU  </b></a>
                           </div>
            </div>
            <?php 
            	 echo'
  <div class="center">
  	<div class="pagination">';
		if($cr_page > 1 && $total_page > 1){
	 echo'<a class="page-link" href="managepayment.php?page='.($cr_page - 1 ).'">Previous</a>';
	}
	 for($i = 1; $i <= $total_page;$i++){ 
	 	if($i == $cr_page){
 	 echo'<a class="active" href="#">'.$i.'</a>';
 	 }else{
 	 	 echo'<a class="page-link" href="managepayment.php?page='.$i.'">'.$i.'</a>';
 	 }
 	}
 	if($cr_page < $total_page && $total_page > 1){
  echo'<a class="page-link" href="managepayment.php?page='.($cr_page + 1).'">Next</a>';
  	}
		echo'</div>
		</div>';
             ?>

        </div>
    </main>
    <?php 
    require 'footer.php'; ?>
    <script src="assets/js/ajax.js"></script>
</div>
</body>
</html>