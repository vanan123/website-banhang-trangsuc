<?php
session_start();
require 'cauhinh.php';
$cart = $_SESSION['cart'];
$id = $_GET['idtrangsuc'];
if($id == 0){
 	unset($_SESSION['cart']);
 	unset($_SESSION['soluong']);
	unset($_SESSION['thanhtien']);
}
else
{
	unset($_SESSION['cart'][$id]);
	
}
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
		$sql1 = "SELECT * FROM trangsuc Where matrangsuc in ($str)";
		$kq1 = mysqli_query($conn,$sql1);
		$row1 = mysqli_fetch_assoc($kq1);
		$_SESSION['loaitrangsuc'] = $row1['maloaitrangsuc'];
		$total = 0;
		$soluong = 0;
		while ($row = mysqli_fetch_array($kq)) {
			
            $soluong += $_SESSION['cart'][$row['matrangsuc']]; 			
            $total += $_SESSION['cart'][$row['matrangsuc']]*$row['giaban'];
            }
           $_SESSION['soluong'] = $soluong;
           $_SESSION['thanhtien'] = $total;
 
		}
		else{
	unset($_SESSION['soluong']);
	unset($_SESSION['thanhtien']);
		}
header('location:cart.php');
exit();
 ?>
