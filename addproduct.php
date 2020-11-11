<?php
include 'cauhinh.php'; 
session_start();
if($_SESSION['quyen']!='1'){
       echo '<script language="javascript">alert("Bạn không phải là admin"); 
  window.location="login.php"</script>';
}
$id = $_REQUEST['idtrangsuc'];
 if(isset($_POST['add'])) {
        $add = "INSERT INTO `trangsuc`(tentrangsuc,maloaitrangsuc,maloaivang,giaban,soluong,hinhanh,Thuonghieu,Bosuutap,Loaida,Mauda,Hinhdang,Diptang,Trongluong,Chungloai,Tuoivang) VALUES (  
        '".$_POST['tentrangsuc']."', 
        '".$_POST['loaitrangsuc']."', 
        '".$_POST['loaivang']."', 
        '".$_POST['giaban']."', 
        '".$_POST['soluong']."',
        '".$_POST['anh']."',
        '".$_POST['thuonghieu']."',
        '".$_POST['bosuutap']."',
        '".$_POST['loaida']."',
        '".$_POST['mauda']."',
        '".$_POST['hinhdang']."',
        '".$_POST['diptang']."',
        '".$_POST['trongluong']."',
        '".$_POST['chungloai']."',
        '".$_POST['tuoivang']."')";

        $added = mysqli_query($conn, $add);
        if(isset($added)){
          echo '<script language="javascript">alert("Thêm sản phẩm thành công"); 
  window.location="manageproduct.php"</script>';
        }
        else echo '<script language="javascript">alert("Lỗi"); 
  window.location="addproduct.php";</script>';
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm sản phẩm</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
       <script src="assets/js/jquery.js"></script>
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
 <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
</head>
 <style>
        .hide {
            display: none;
        }
      div.form-group input{
        width: 500px;
        height: 40px;
      }
        div.form-group  label {
            font-size: 15px;
            font-weight: bold;
            color:#ffa31a;

        }
        @media screen and (max-width: 720px) {
            label {
                display: none;
            }
            h3 {
                font-size: 23px;
            }
        }
    </style>
<body>
  <?php 
  include 'header.php'; ?>
   <main>
        <h3 class="text-center mt-3">Thêm sản phẩm :</h3>

        <div class="container">
            <div class="editorCont">
                <form action="addproduct.php" method="POST">
                    <div class="form-group">
                        <label for="tentrangsuc">Tên trang sức: </label>
                        <input type="text" class="form-control" name="tentrangsuc" id="pname" placeholder="Tên sản phẩm" >
                    </div>
                    <div class="form-group">
                        <label for="loaitrangsuc">Loại trang sức: </label>
                        <select class="form-control" name="loaitrangsuc" id="cateId">
                            <?php
                                $browse = "SELECT * FROM loaitrangsuc";
                                $browser = mysqli_query($conn, $browse);
                                while($row = mysqli_fetch_assoc($browser)) {
                                    // $selected ="";
                                    // if($row['maloaitrangsuc'] == $loaitrangsuc) {
                                    //     $selected = 'selected';
                                    // }
                                    echo '<option value ="'.$row['maloaitrangsuc'].'">'.$row['tenloaitrangsuc'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="loaivang">Loại vàng: </label>
                        <select class="form-control" name="loaivang" id="goldId">
                            <?php
                                $sql = "SELECT * FROM loaivang";
                                $kq = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($kq)) {
                                    // $selected ="";
                                    // if($row['maloaivang'] == $loaivang) {
                                    //     $selected = 'selected';
                                    // }
                                    echo '<option value ="'.$row['maloaivang'].'">'.$row['tenloaivang'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                       <div  class="form-group">
                        <label for="giaban">Đơn giá: </label>
                        <input type="text" class="form-control" name="giaban" id="price" placeholder="Đơn giá" >
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng: </label>
                        <input type="number" min="0" class="form-control" name="soluong" id="quantity" placeholder="Số lượng" >
                    </div>
                    <div class="form-group">
                        <label for="">Thương hiệu: </label>
                        <input type="text"  class="form-control" name="thuonghieu" id="brand" placeholder="Thương hiệu" >
                    </div>
                     <div class="form-group">
                        <label for="">Bộ sưu tập: </label>
                        <input type="text"  class="form-control" name="bosuutap"  placeholder="Bộ sưu tập" >
                    </div>
                     <div class="form-group">
                        <label for="">Loại đá: </label>
                        <input type="text" class="form-control" name="loaida"  placeholder="Loại đá" >
                    </div>
                     <div class="form-group">
                        <label for="">Màu đá: </label>
                        <input type="text"  class="form-control" name="mauda"  placeholder="Màu đá" >
                    </div>
                     <div class="form-group">
                        <label for="">Hình dáng: </label>
                        <input type="text"  class="form-control" name="hinhdang"  placeholder="Hình dáng" >
                    </div>
                    <div class="form-group">
                        <div><label for="describe">Dịp tặng: </label></div>
                        <textarea placeholder="Dịp tặng" name="diptang" id="diptang"></textarea>
                            <script>
                                CKEDITOR.replace( 'diptang' );
                            </script>
                    </div>
                    <div class="form-group">
                        <label for="">Trọng lượng: </label>
                        <input type="number" min="0" step="0.00001" class="form-control" name="trongluong"  placeholder="Trọng lượng" >
                    </div>
                      <div class="form-group">
                        <label for="">Chủng loại: </label>
                        <input type="text" class="form-control" name="chungloai"  placeholder="Chủng loại" >
                    </div>
                      <div class="form-group">
                        <label for="">Tuổi vàng: </label>
                        <input type="text" class="form-control" name="tuoivang"  placeholder="Tuổi vàng" >
                    </div>
                    <div class="form-group">
                        <label for="anh">Link ảnh: </label>
                        <input placeholder="Link ảnh" type="text" class="form-control" name="anh" id="pimage" >
                    </div>
                    <div class="form-group">
                        <input class="btn btn-warning w-100" name="add" type="submit" value="Thêm">
                    </div>
                </form>
            </div>
        </div>
    </main>
  <?php include 'footer.php'; ?>
</div>
</body>
</html>