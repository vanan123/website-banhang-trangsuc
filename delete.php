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
	else if(isset($_GET['delete-product'])&& isset($_GET['idbinhluan'])){
		$idbinhluan = $_GET['idbinhluan'];
		$sql="DELETE FROM binhluan WHERE id = ".$idbinhluan;
		$kq = mysqli_query($conn,$sql);
		if(isset($kq)){
			echo '<script language="javascript">alert("Đã xóa bình luận"); 
  window.location="managecomment.php";</script>';
		}
	else 	echo '<script language="javascript">alert("Lỗi"); 
  window.location="managecomment.php";</script>';
	}
	else if(isset($_GET['delete-product'])&& isset($_GET['idhoadon'])){
		$idhoadon = $_GET['idhoadon'];
		  $sql = "UPDATE `hoadon` SET `trangthai` = '2' WHERE mahoadon = ".$idhoadon;
        $kq = mysqli_query($conn, $sql);
		if(isset($kq)){
			echo '<script language="javascript">alert("Đã hủy đơn hàng"); 
  window.location="mypayment.php";</script>';
		}
	else 	echo '<script language="javascript">alert("Lỗi"); 
  window.location="mypayment.php";</script>';
	}
	else if(isset($_GET['delete-product'])&& isset($_GET['idhoadon1'])){
		$idhoadon = $_GET['idhoadon1'];
		  $sql = "UPDATE `hoadon` SET `trangthai` = '1' WHERE mahoadon = ".$idhoadon;
        $kq = mysqli_query($conn, $sql);
		if(isset($kq)){
			echo '<script language="javascript">alert("Đã nhận hàng"); 
  window.location="mypayment.php";</script>';
		}
	else 	echo '<script language="javascript">alert("Lỗi"); 
  window.location="mypayment.php";</script>';
	}
 ?>
