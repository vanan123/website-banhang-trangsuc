<?php
require 'cauhinh.php';
session_start();
if($_SESSION['quyen']!='1'){
       echo '<script language="javascript">alert("Bạn không phải là admin"); 
  window.location="login.php"</script>';
}
 ?>
<?php require 'header.php'; ?>
     <h1 class="text-center mt-2">THỐNG KÊ DOANH THU</h1>
    <main>
     <div class="container">
        <div class="mt-3 row">
            <div class="col-sm-9">    
                <div>
                    <h3>Doanh thu tháng <?php echo ($_REQUEST['month']) ? $_REQUEST['month'] : date('m') ?></h3>
                    <select name="month" id="month" onchange="reload(this)">
                        <script>
                            var months = "";
                            for (let index = 1; index <= 12; index++) {
                                months = months + "<option value="+index+">"+index+"</option>";
                            }
                            document.getElementById('month').innerHTML = months;

                            function reload(mon) {
                                let url = "statistic.php?month="+mon.value;
                                window.location = url;
                            }
                        </script>
                    </select>
                </div>                        
                <div class="stonks">
                    <?php 
                        $sql = "SELECT sum(soluongdaban) as total_sell FROM `hoadonchitiet`,`hoadon` WHERE idhoadon = mahoadon AND MONTH(ngaylap) = ". (($_REQUEST['month']) ? $_REQUEST['month'] : date("m"));
                        $query = mysqli_query($conn, $sql);
                        $rs = mysqli_fetch_row($query);
                        $totalsell = $rs[0] ? $rs[0]:0;
                        $sql = "SELECT trangsuc.tentrangsuc,soluongdaban,hoadon.ngaylap,soluongdaban*giaban as total FROM `hoadonchitiet`,`trangsuc`,`hoadon` WHERE trangsuc.matrangsuc = idtrangsuc and idhoadon = mahoadon and MONTH(ngaylap) = " . (($_REQUEST['month']) ? $_REQUEST['month'] : date("m"));
                        $query = mysqli_query($conn, $sql);
                        $total_stonk = 0;
                    ?>
                     <div class="sum_table">
                         <?php echo "<h4><strong>Đã bán:</strong> $totalsell </h4>"; ?>
                         <table class="table">
                             <th>
                                 <tr>
                                     <th>Trang sức</th>
                                     <th>Số lượng đã bán</th>
                                     <th>Ngày bán</th>
                                     <th>Tổng tiền</th>
                                 </tr>
                             </th>
                            <tbody>
                            <?php
                                while($row = mysqli_fetch_assoc($query)) {
                                    echo "
                                        <tr>
                                            <th style='color: #fc0808'>".$row['tentrangsuc']."</th>
                                            <td>".$row['soluongdaban']."</td>
                                            <td>".$row['ngaylap']."</td>
                                            <td>".number_format($row['total'])."VNĐ</td>
                                        </tr>
                                    ";
                                    $total_stonk+=$row['total'];
                                }

                            ?>
                            </tbody>
                         </table>
                     </div>
                     <div>
                        <h2>Tổng: <Strong><span style="color: #f1c40f;"><?php echo number_format($total_stonk) ?></span>VNĐ</Strong></h3>
                    </div>
                </div>
            </div>
        </div>
        <a href="managepayment.php" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Quay lại </a>
    </div>
    </main>
    <?php 
    require 'footer.php'; ?>
    <script src="assets/js/ajax.js"></script>
</div>
</body>
</html>