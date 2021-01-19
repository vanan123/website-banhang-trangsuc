<?php
require 'header.php'; 
 ?>
<?php
require 'cauhinh.php';
if(isset($_POST['update'])){
	foreach ($_POST['soluong'] as $key => $value) {
		if(($value == 0 ) && (is_numeric($value))){
			unset($_SESSION['cart'][$key]);
		 	unset($_SESSION['soluong']);
			unset($_SESSION['thanhtien']);
		}
		else if (($value > 0) && (is_numeric($value))){
			$_SESSION['cart'][$key] = $value;
		}
	}	
}

 ?>

<!-- 
Body Section 
-->
	<div class="row">
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="index.php">Trang chủ</a> <span class="divider">/</span></li>
		<li class="active">Giỏ hàng</li>
    </ul>
	<div class="well well-small">
		<?php
		 $ok = 1;
		 if(isset($_SESSION['cart'])){
		 	foreach ($_SESSION['cart'] as $key => $value) {
		 		if(isset($key)){
		 			$ok = 2;

		 		}
		 	}
		 }
		 if($ok !=2){
		 	echo '<h1>Giỏ hàng <small class="pull-right"> 0 sản phẩm trong giỏ hàng </small></h1>';
		 	echo '<br><a href="index.php" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Tiếp tục mua hàng </a>';
		}
		 else {
		 	$item = $_SESSION['cart'];
		 	echo '<h1>Giỏ hàng <small class="pull-right">' .count($item). ' sản phẩm trong giỏ hàng </small></h1>';
			echo "<form action='cart.php' method='POST'>";
			foreach ($_SESSION['cart'] as $key => $value) {
				$items[] = $key;
			}
		$str = implode(",", $items);
		$sql = "SELECT * FROM trangsuc Where matrangsuc in ($str) order by matrangsuc desc";
		$kq = mysqli_query($conn,$sql);
		$sql1 = "SELECT * FROM trangsuc Where matrangsuc in ($str)";
		$kq1 = mysqli_query($conn,$sql1);
		$row1 = mysqli_fetch_assoc($kq1);
		$_SESSION['loaitrangsuc'] = $row1['maloaitrangsuc'];
		$total = 0;
		$soluong = 0;
		while ($row = mysqli_fetch_array($kq)) {
			echo '<hr class="soften"/>';	

			echo '<table class="table table-bordered table-condensed">';
            echo  '<thead>
                <tr>
                  <th>Sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Đơn giá</th>
                  <th>Số lượng</th>
                  <th>Thành tiền</th>
				</tr>
              </thead>';
            echo  '<tbody>
                <tr>
                  <td><a href="product_details.php?idtrangsuc='.$row['matrangsuc'].'"><img width="100" src="'.$row['hinhanh'].'" alt=""></a></td>
                  <td class="product"><a href="product_details.php?idtrangsuc='.$row['matrangsuc'].'">'.$row['tentrangsuc'].'</a></td>
                  <td>'.number_format($row['giaban']).'</td>
                  <td>
					<input class="span1" style="max-width:34px" size="16" min="0" type="number" name="soluong['.$row['matrangsuc'].']" size="5" value="'.$_SESSION["cart"][$row["matrangsuc"]].'">
				  <div class="input-append">
					<button class="btn  btn-danger remove" type="button"><a href="delcart.php?idtrangsuc='.$row['matrangsuc'].'"><span class="icon-remove"></span></a></button>
				</div>
				</td>
                  <td>'.number_format($_SESSION['cart'][$row['matrangsuc']]*$row['giaban']).' VNĐ</td>
                </tr>
                
				 
				</tbody>';
            echo '</table>';
            $soluong += $_SESSION['cart'][$row['matrangsuc']]; 			
            $total += $_SESSION['cart'][$row['matrangsuc']]*$row['giaban'];
            }
           $_SESSION['soluong'] = $soluong;
           $_SESSION['thanhtien'] = $total;
            echo '<table class="table table-bordered"';
            echo '<tr>
                  <td colspan="6" class="alignR"><h3>Tổng tiền:	</h3></td>
                  <td class="label label-light"><h3> '.number_format($total).' VNĐ</h3></td>
                </tr>';
            echo '</table><br>';
            echo '<input type="submit" class="btn btn-primary" name="update" value="Cập nhật giỏ hàng"><br><br>';
             echo '<button class="btn btn-danger delete" type="button"><a href="delcart.php?idtrangsuc=0">Xóa giỏ hàng</a></button><br><br>';
            echo '					
	<a href="products.php?loaitrangsuc='.$_SESSION['loaitrangsuc'].'" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Tiếp tục mua hàng </a>';
		if(!isset($_SESSION['name'])){
	echo'<a href="login.php" class="shopBtn btn-large pull-right">Đăng nhập để thanh toán <span class="icon-arrow-right"></span></a>';
			}
		else{
			echo'<a href="payment.php" class="shopBtn btn-large pull-right">Thanh toán <span class="icon-arrow-right"></span></a>';
		}	
		echo "</form>";
		}
	
 ?>
</div>
</div>
</div>
<!-- 
Clients 
-->
<!--
Footer
-->
<?php
require 'footer.php'; 
 ?>
</div><!-- /container -->

  </body>
</html>
