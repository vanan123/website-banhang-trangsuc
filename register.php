<?php
include 'cauhinh.php';
session_start();
if(isset($_POST['dangky'])){
$email = mysqli_escape_string($conn,$_POST['email']);
$password = md5($_POST['pass']);
$password1 = md5($_POST['repass']);
$name =  mysqli_escape_string($conn,$_POST['hoten']) ;
$phone = mysqli_escape_string($conn,$_POST['sodienthoai']);
// $phone1 = str_replace(array('-', '.', ' '), '', $phone1);
if(empty($email)||empty($name)||empty($phone)||empty($password)||empty($password1)){
	echo '<script language="javascript">alert("Không được để trống các trường bắt buộc"); 
window.location="register.php";</script>';
}
else if($password!=$password1){
	echo '<script language="javascript">alert("Mật khẩu nhập lại không trùng khớp"); 
window.location="register.php";</script>';
}
// else if(!preg_match('/^0[0-9]{8}$/', $phone1)){
// 	echo '<script language="javascript">alert("Số điện thoại không hợp lệ"); 
// window.location="register.php";</script>';
// }
else{
$sql = "SELECT * FROM thanhvien WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
echo '<script language="javascript">alert("Email đã tồn tại"); 
window.location="register.php";</script>';
die ();
}
else {
$sql = "INSERT INTO thanhvien (hoten, email, matkhau, sdt,quyen) VALUES ('$name','$email','$password','$phone','0')";
$kq = mysqli_query($conn,$sql);
if($kq){
  echo '<script language="javascript">alert("Đăng ký thành công"); 
window.location="register.php";</script>';
}
else{
	echo '<script language="javascript">alert("Lỗi"); 
window.location="register.php";</script>';;
}
// if (mysqli_query($conn, $sql)){
// echo "Tên đăng nhập: ".$_POST['email']."<br/>";
// echo "Mật khẩu: " .$_POST['pass']."<br/>";
// echo "Email đăng nhập: ".$_POST['hoten']."<br/>";
// echo "Số điện thoại: ".$_POST['sodienthoai']."<br/>";
// }
// else {
// echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';
// }
}
}
	}
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Đăng ký</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
	
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
  </head>
<body>
	<?php include 'header.php'; ?>

	<div class="row">
		<?php require 'sidebar.php'; ?>

	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Trang chủ</a> <span class="divider">/</span></li>
		<li class="active">Đăng ký</li>
    </ul>
	<h3>Đăng ký</h3>	
	<hr class="soft"/>
	<div class="well">
	<form class="form-horizontal" action="register.php" method="post">
		<h3>Tạo tài khoản</h3>
		<div class="control-group">
			<label class="control-label" for="hoten">Họ và tên<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="hoten" name="hoten">
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="Email" required>Email <sup>*</sup></label>
		<div class="controls">
		  <input type="email" id="email" name="email" placeholder="Email" >
		</div>
	  </div>	  
		<div class="control-group">
		<label class="control-label">Mật khẩu <sup>*</sup></label>
		<div class="controls">
		  <input type="password" name="pass" id="pass" placeholder="Mật khẩu">
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label">Nhập lại mật khẩu <sup>*</sup></label>
		<div class="controls">
		  <input type="password" name="repass" id="repass" placeholder="Nhập lại mật khẩu">
		</div>
	  </div>
	  <div class="control-group">
			<label class="control-label" for="sodienthoai">Số điện thoại<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="SĐT" name="sodienthoai" >
			</div>
		 </div>

	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="dangky" value="Đăng ký" class="exclusive shopBtn">
		</div>
	</div>
	</form>
</div>




</div>
</div>
<?php require 'footer.php'; ?>
  </body>
</html>
