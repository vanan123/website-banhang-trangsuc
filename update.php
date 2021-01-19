<?php 
include 'cauhinh.php';

  if(isset($_POST['update'])) {
  		$id = $_POST['id'];
      $targer_dir = "upload/";
            $targer_file = $targer_dir.basename($_FILES['fileupload']['name']);
           
            if(move_uploaded_file($_FILES['fileupload']['tmp_name'],$targer_file)){
    
        $edited = "UPDATE `trangsuc` SET 
        `tentrangsuc` = '".$_POST['tentrangsuc']."', 
        `maloaitrangsuc` = '".$_POST['loaitrangsuc']."', 
        `maloaivang` = '".$_POST['loaivang']."', 
        `giaban` = '".$_POST['giaban']."', 
        `soluong` = '".$_POST['soluong']."',
        `hinhanh` = '".$targer_file."',
        `Thuonghieu` = '".$_POST['thuonghieu']."',
        `Bosuutap` = '".$_POST['bosuutap']."',
        `Loaida` = '".$_POST['loaida']."',
        `Mauda` = '".$_POST['mauda']."',
        `Hinhdang` = '".$_POST['hinhdang']."',
        `Diptang` = '".$_POST['diptang']."',
        `Trongluong` = '".$_POST['trongluong']."',
        `Chungloai` = '".$_POST['chungloai']."',
        `Tuoivang` = '".$_POST['tuoivang']."'
        WHERE `trangsuc`.`matrangsuc` = ".$id;

        $update = mysqli_query($conn, $edited);
      if(isset($update)){
        	echo '<script language="javascript">alert("Cập nhật thành công"); 
   window.location="manageproduct.php"</script>';
        }
        else echo '<script language="javascript">alert("Lỗi"); 
  window.location="editproduct.php";</script>';
     }
      else echo '<script language="javascript">alert("Lỗi"); 
  window.location="editproduct.php";</script>';
   }
 ?>
