<?php
session_start();
require 'cauhinh.php';
$id = $_GET['item'];
if(isset($_SESSION['cart'][$id])){
	$soluong = $_SESSION['cart'][$id]+1;
}
else{
	$soluong = 1;
}
$_SESSION['cart'][$id] = $soluong;
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
		$soluong = 0;
		while ($row = mysqli_fetch_array($kq)) {
			
            $soluong += $_SESSION['cart'][$row['matrangsuc']]; 			
            $total += $_SESSION['cart'][$row['matrangsuc']]*$row['giaban'];
            }
           $_SESSION['soluong'] = $soluong;
           $_SESSION['thanhtien'] = $total;
 
		}
	
	
header("location:cart.php");
exit();	
 ?>
