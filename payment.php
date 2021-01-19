<?php
require 'cauhinh.php';
session_start();
if(!isset($_SESSION['idthanhvien'])){
  header("location:login.php");
}
if(isset($_POST['submit'])){
	$thanhtien = $_SESSION['thanhtien'];
	$mathanhvien = $_SESSION['idthanhvien'];
	$date = date("y-m-d");
	$hoten = $_POST['firstname'];
	$tentrenthe = $_POST['cardname'];
	$sdt = $_POST['nphone'];
	$sothe =$_POST['cardnumber'];
	$email = $_POST['email'];
	$CVV  = md5($_POST['cvv']);
	$diachigiaohang = $_POST['address'];
	$items = array();
	foreach ($_SESSION['cart'] as $key => $value) {
				$soluong = mysqli_fetch_row(mysqli_query($conn,"SELECT soluong FROM trangsuc WHERE matrangsuc = ".$key))[0];
        $slconlai = (intval($soluong)-intval($value));
        if($slconlai < 0){
          $mess = "Sản phẩm không đủ trong kho";
        }
        else{
        $kq =mysqli_query($conn,"UPDATE trangsuc SET `soluong`= ".$slconlai." WHERE matrangsuc = ".$key);
        }
        $item[$key]=$value;
			}
      if(!isset($mess)){
       $sql3 =  "INSERT INTO thethanhtoan (`mathe`,`tentrenthe`,`CVV`) VALUES ('".$sothe."','".$tentrenthe."','".$CVV."')";
    $kq3= mysqli_query($conn,$sql3);
  $sql1 = "INSERT INTO hoadon (`mathe`,`mathanhvien`,`ngaylap`,`tongtien`,`email`,`sdt`,`diachigiaohang`,`trangthai`) VALUES ('".$sothe."','".$mathanhvien."','".$date."','".$thanhtien."','".$email."','".$sdt."','".$diachigiaohang."',0)";
  $kq1 = mysqli_query($conn,$sql1);
     $query = mysqli_query($conn, "SELECT mahoadon FROM hoadon ORDER BY mahoadon desc");
        $getid = mysqli_fetch_row($query);
        foreach($item as $k=>$v) {
            $sql2 = "INSERT INTO hoadonchitiet (`idhoadon`,`idtrangsuc`,`soluongdaban`) VALUES ('".$getid[0]."','".$k."','".$v."')";
           $kq2=mysqli_query($conn, $sql2);
            $item[] = $k; 
        }
      }
        else{
    echo '<script language="javascript">
    alert("'.$mess.'"); 
     window.location="cart.php";</script>';
    }
  	  	if(isset($kq1) && isset($kq3) && isset($kq) && isset($kq2)){
     	 		echo '<script language="javascript">alert("Thanh toán thành công.Hàng của bạn sẽ sớm chuyển tới");window.location="mypayment.php" </script>';
          unset($_SESSION['soluong']);
  unset($_SESSION['thanhtien']);
  unset($_SESSION['cart']);
     }
}
	 	
	
  
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Giỏ hàng</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../giuaky/css/payment.css">
<link rel="stylesheet" href="../giuaky/css/style.css">
</head>
<body>
<h2>Thanh toán</h2>
 <ul class="breadcrumb">
  <li><a href="index.php">Trang chủ</a></li>
  <li><a href="cart.php">Giỏ hàng</a></li>
  <li>Thanh toán</li>
</ul>
	<hr class="soft"/>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      
        <div class="row">
          <div class="col-50">
            <h3>Địa chỉ thanh toán</h3>
            <label for="fname"><i class="fa fa-user"></i> Họ và tên</label>
            <input type="text" id="fname" name="firstname" placeholder="Nguyễn Văn A...">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="abc123@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Địa chỉ</label>
            <input type="text" id="adr" name="address" >
            <label for="city"><i class="fa fa-phone"></i> Số điện thoại</label>
            <input type="text" id="phone" name="nphone" >
          </div>

          <div class="col-50">
            <h3>Thanh toán</h3>
            <label for="fname">Thẻ được chấp nhận</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Tên trên thẻ</label>
            <input type="text" id="cname" name="cardname" placeholder="NGUYEN VAN A">
            <label for="ccnum">Số thẻ tín dụng</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder="352">
          </div>
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Giao hàng tới địa chỉ này
        </label>
        <input type="submit" value="Thanh toán" class="btn" name="submit">
        <input type="reset" class="btn btn-danger" value="Hủy">
        <br>
        <br>
        <a href="cart.php" class="btn btn-warning">Quay lại giỏ hàng</a>
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
    	<?php 
     echo '<h4>Sản phẩm <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>'.$_SESSION['soluong'].'</b></span></h4>';
		$ok = 1;
		if(isset($_SESSION['cart'])){
			foreach ($_SESSION['cart'] as $k => $v) {
				if(isset($k)){
					$ok=2;
	}
		}
			}
		if($ok == 2){
			foreach ($_SESSION['cart'] as $key => $value) {
				$items[] = $key;
			}
		$str = implode(",", $items);
		$sql = "SELECT * FROM trangsuc Where matrangsuc in ($str)";
		$kq = mysqli_query($conn,$sql);
		$total = 0;
		while ($row = mysqli_fetch_array($kq)) {
			echo '<hr class="soften"/>';	

			echo '<table class="table table-bordered table-condensed">';
           
            echo  '<tbody>
                <tr>
                  <td class="product"><a href="product_details.php?idtrangsuc='.$row['matrangsuc'].'">'.$row['tentrangsuc'].'</a></td>
                  <td>'.number_format($_SESSION['cart'][$row['matrangsuc']]*$row['giaban']).' VNĐ</td>
                </tr>
                
				 
				</tbody>';
            echo '</table>';			
            $total += $_SESSION['cart'][$row['matrangsuc']]*$row['giaban'];
            }
            echo '<table class="table table-bordered"';
            echo '<tr>
                  <td colspan="6" class="alignR"><h3>Tổng tiền:	</h3></td>
                  <td class="label label-light" style="text-align:left"><h3> '.number_format($total).' VNĐ</h3></td>
                </tr>';
            echo '</table><br>';
		}
   echo'</div>';
     ?>
  </div>
</div>
</body>
</html>