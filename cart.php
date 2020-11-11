<?php
require 'cauhinh.php';

if(isset($_POST['update'])){
	foreach ($_POST['soluong'] as $key => $value) {
		if(($value == 0 ) and (is_numeric($value))){
			unset($_SESSION['cart'][$key]);
				unset($_SESSION['soluong']);
			unset($_SESSION['thanhtien']);
		}
		else if (($value>0) and (is_numeric($value))){
			$_SESSION['cart'][$key] = $value;
		}
	}
	header("location:cart.php");
}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cửa hàng trang sức AC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
		<!--[if IE 7]>
			<link href="css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	<!-- Favicons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
  </head>
<body>
<!-- 
	Upper Header Section 
-->


<!--
Lower Header Section 
-->
<?php
require 'header.php'; 
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
		// if(isset($_SESSION['soluong'])){
		// 	echo '<h1>Giỏ hàng <small class="pull-right"> '.$_SESSION['soluong'].' sản phẩm trong giỏ hàng </small></h1>';
		// }
		// else{
		// 	echo '<h1>Giỏ hàng <small class="pull-right"> 0 sản phẩm trong giỏ hàng </small></h1>';
		// }
		 $ok = 1;
		 if(isset($_SESSION['cart'])){
		 	foreach ($_SESSION['cart'] as $key => $value) {
		 		if(isset($key)){
		 			$ok = 2;

		 		}
		 	}
		 }
		 if($ok != 2){
		 	echo '<h1>Giỏ hàng <small class="pull-right"> 0 sản phẩm trong giỏ hàng </small></h1>';
		 	}
		 else{
		 	$item = $_SESSION['cart'];
		 	echo '<h1>Giỏ hàng <small class="pull-right">' .count($item). ' sản phẩm trong giỏ hàng </small></h1>';
		 }
		 ?>
		<?php 
		$ok = 1;
		if(isset($_SESSION['cart'])){
			foreach ($_SESSION['cart'] as $k => $v) {
				if(isset($k)){
					$ok=2;
	}
		}
			}
		if($ok == 2){
			echo "<form action='cart.php' method='POST'>";
			foreach ($_SESSION['cart'] as $key => $value) {
				$items[] = $key;
			}
		$str = implode(",", $items);
		$sql = "SELECT * FROM trangsuc Where matrangsuc in ($str)";
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
					<input class="span1" style="max-width:34px" id="appendedInputButtons" size="16" type="text" name="soluong['.$row['matrangsuc'].']" size="5" value="'.$_SESSION["cart"][$row["matrangsuc"]].'">
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
		else{
			echo '<a href="index.php" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Tiếp tục mua hàng </a>';
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
