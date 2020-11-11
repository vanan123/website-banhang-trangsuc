<?php
include 'cauhinh.php';
if(isset($_GET['delete-user'])&& isset($_GET['idthanhvien'])){
	$idthanhvien = $_GET['idthanhvien'];
	$sql = "DELETE FROM thanhvien Where mathanhvien = $idthanhvien ";
	$kq = mysqli_query($conn,$sql);
	if(isset($kq)){

echo '<script language="javascript">alert("Đã xóa khách hàng"); 
  window.location="manageuser.php";</script>';
}else {
	echo '<script language="javascript">alert("Lỗi"); 
  window.location="manageuser.php";</script>';
}
}
else if(isset($_GET['delete-category'])&& isset($_GET['idloaitrangsuc'])){
	$idloaitrangsuc = $_GET['idloaitrangsuc'];
	$sql = "DELETE FROM loaitrangsuc WHERE maloaitrangsuc = $idloaitrangsuc";
	$kq = mysqli_query($conn,$sql);
	if(isset($kq)){
		echo '<script language="javascript">alert("Đã xóa loại trang sức"); 
  window.location="managecategory.php";</script>';
	}
	else 	echo '<script language="javascript">alert("Lỗi"); 
  window.location="managecategory.php";</script>';
	}
	else if(isset($_GET['delete-product'])&& isset($_GET['idtrangsuc'])){
		$idtrangsuc = $_GET['idtrangsuc'];
		$sql = "DELETE FROM trangsuc WHERE matrangsuc = $idtrangsuc";
		$kq = mysqli_query($conn,$sql);
		if(isset($kq)){
			echo '<script language="javascript">alert("Đã xóa trang sức"); 
  window.location="manageproduct.php";</script>';
		}
	else 	echo '<script language="javascript">alert("Lỗi"); 
  window.location="manageproduct.php";</script>';
	}
 ?>
