<?php
include 'cauhinh.php';
session_start(); 
if($_SESSION['quyen']!='1'){
       echo '<script language="javascript">alert("Bạn không phải là admin"); 
  window.location="login.php"</script>';
}
    if(isset($_GET['idtrangsuc'])){
    $id = $_GET['idtrangsuc'];
    $query1 = "SELECT * FROM trangsuc WHERE matrangsuc = '$id'";
    $sql1 = mysqli_query($conn, $query1);
    while($row = mysqli_fetch_array($sql1)){
    $tentrangsuc = $row['tentrangsuc'];
    $loaitrangsuc = $row['maloaitrangsuc'];
    $loaivang = $row['maloaivang'];
    $giaban = $row['giaban'];
    $soluong = $row['soluong'];
    $thuonghieu = $row['Thuonghieu'];
    $bosuutap = $row['Bosuutap'];
    $loaida = $row['Loaida'];
    $mauda = $row['Mauda'];
    $hinhdang = $row['Hinhdang'];
    $diptang = $row['Diptang'];
    $trongluong = $row['Trongluong'];
    $chungloai = $row['Chungloai'];
    $tuoivang = $row['Tuoivang'];
    $anh = $row["hinhanh"];
    $path_anh = basename($anh);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cập nhật sản phẩm</title>
		<link href="assets/css/bootstrap.css" rel="stylesheet"/>
 	  <link rel="shortcut icon" href="assets/ico/favicon.ico">
       <script src="assets/js/jquery.js"></script>
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
 <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
 <script src="assets/js/img.js"></script>
 <style>
        .hide {
            display: none;
        }
  		div.form-group input{
  			width: 500px;
  			height: 40px;
  		}
        div.form-group	label {
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
    </head>
<body>
	<?php 
	include 'header.php'; ?>
	 <main>
        <h3 class="text-center mt-3">Cập nhật sản phẩm : <span class="text-danger font-italic"><?php echo $id ."-". $tentrangsuc ?></span></h3>

        <div class="container">
            <div class="editorCont">
                <form action="update.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">ID: </label>
                        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id ?>" ><?php echo $id ?>
                    </div>
                    <div class="form-group">
                        <label for="tentrangsuc">Tên trang sức: </label>
                        <input type="text" class="form-control" name="tentrangsuc" id="pname" placeholder="Tên sản phẩm" value="<?php echo $tentrangsuc ?>">
                    </div>
                       <div class="form-group">
                        <label for="anh">Ảnh: </label>
                        <img id="image1" width="150px" height="100px" src="<?php echo $anh ?>" alt="anh1">
                        <button id="files" onclick="document.getElementById('fileupload').click();return false;">Đăng ảnh</button>
                        <input type="file" onchange="readURL(this);" accept="image/*" name="fileupload" id="fileupload" style="visibility: hidden;">

                    </div>
                    <div class="form-group">
                        <label for="loaitrangsuc">Loại trang sức: </label>
                        <select class="form-control" name="loaitrangsuc" id="cateId">
                            <?php
                                $browse = "SELECT * FROM loaitrangsuc";
                                $browser = mysqli_query($conn, $browse);
                                while($row = mysqli_fetch_assoc($browser)) {
                                    $selected ="";
                                    if($row['maloaitrangsuc'] == $loaitrangsuc) {
                                        $selected = 'selected';
                                    }
                                    echo '<option value ="'.$row['maloaitrangsuc'].'"'.$selected.'>'.$row['tenloaitrangsuc'].'</option>';
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
                                    $selected ="";
                                    if($row['maloaivang'] == $loaivang) {
                                        $selected = 'selected';
                                    }
                                    echo '<option value ="'.$row['maloaivang'].'"'.$selected.'>'.$row['tenloaivang'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                       <div  class="form-group">
                        <label for="giaban">Đơn giá: </label>
                        <input type="text" class="form-control" name="giaban" id="price" placeholder="Đơn giá" value="<?php echo $giaban ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng: </label>
                        <input type="number" min="0" class="form-control" name="soluong" id="quantity" placeholder="Số lượng" value="<?php echo $soluong ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Thương hiệu: </label>
                        <input type="text"  class="form-control" name="thuonghieu" id="brand" placeholder="Thương hiệu" value="<?php echo $thuonghieu ?>">
                    </div>
                     <div class="form-group">
                        <label for="">Bộ sưu tập: </label>
                        <input type="text"  class="form-control" name="bosuutap"  placeholder="Bộ sưu tập" value="<?php echo $bosuutap ?>">
                    </div>
                     <div class="form-group">
                        <label for="">Loại đá: </label>
                        <input type="text" class="form-control" name="loaida"  placeholder="Loại đá" value="<?php echo $loaida ?>">
                    </div>
                     <div class="form-group">
                        <label for="">Màu đá: </label>
                        <input type="text"  class="form-control" name="mauda"  placeholder="Màu đá" value="<?php echo $mauda ?>">
                    </div>
                     <div class="form-group">
                        <label for="">Hình dáng: </label>
                        <input type="text"  class="form-control" name="hinhdang"  placeholder="Hình dáng" value="<?php echo $hinhdang ?>">
                    </div>
                    <div class="form-group">
                        <div><label for="describe">Dịp tặng: </label></div>
                        <textarea placeholder="Dịp tặng" name="diptang" id="diptang"><?php echo $diptang ?></textarea>
                            <script>
                                CKEDITOR.replace( 'diptang' );
                            </script>
                    </div>
                    <div class="form-group">
                        <label for="">Trọng lượng: </label>
                        <input type="text" min="0" class="form-control" name="trongluong"  placeholder="Trọng lượng" value="<?php echo $trongluong ?>">
                    </div>
                      <div class="form-group">
                        <label for="">Chủng loại: </label>
                        <input type="text" class="form-control" name="chungloai"  placeholder="Chủng loại" value="<?php echo $chungloai ?>">
                    </div>
                      <div class="form-group">
                        <label for="">Tuổi vàng: </label>
                        <input type="text" class="form-control" name="tuoivang"  placeholder="Tuổi vàng" value="<?php echo $tuoivang ?>">
                    </div>
                 
                    <div class="form-group">
                        <input class="btn btn-warning w-100" name="update" type="submit" value="Cập nhật">
                    </div>
                </form>
                <?php
                  }
} 
                 ?>
            </div>
        </div>
    </main>
	<?php include 'footer.php'; ?>
</div>
</body>
</html>