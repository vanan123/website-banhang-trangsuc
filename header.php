<?php 
include 'cauhinh.php';
session_start();
ob_start();

if (isset($_POST['dangnhap'])){
    $email=$_POST['email'];
    $pass =md5($_POST['pass']);
$sql = "SELECT * From thanhvien WHERE email='$email' and matkhau='$pass'";
$kq = mysqli_query($conn,$sql);
if(mysqli_num_rows($kq)>0){
$row = mysqli_fetch_assoc($kq);
$_SESSION['name'] = $row['hoten'];
$_SESSION['idthanhvien'] = $row['mathanhvien'];
$_SESSION['quyen'] = $row['quyen'];
if($_SESSION['name']){
echo '<script language="javascript">alert("Đăng nhập thành công"); 
window.location="index.php";</script>';
}

 else{
 	 echo '<script language="javascript">alert("Email hoặc mật khẩu sai"); 
  window.location="index.php";</script>';
 }
}else{
	 echo '<script language="javascript">alert("Email hoặc mật khẩu sai"); 
  window.location="index.php";</script>';
}
}
elseif(isset($_POST['dangxuat'])){
 	echo '<script language="javascript">alert("Đăng xuất thành công"); 
window.location="index.php";</script>';
    session_unset();
 
}
if (isset($_POST['dangnhap1'])){
    $email=$_POST['email'];
    $pass =md5($_POST['pass']);
$sql = "SELECT * From thanhvien WHERE email='$email' and matkhau='$pass'";
$kq = mysqli_query($conn,$sql);
if(mysqli_num_rows($kq)>0){
$row = mysqli_fetch_assoc($kq);
$_SESSION['name'] = $row['hoten'];
$_SESSION['idthanhvien'] = $row['mathanhvien'];
$_SESSION['quyen'] = $row['quyen'];
if($_SESSION['name']){
echo '<script language="javascript">alert("Đăng nhập thành công"); 
window.location="cart.php";</script>';
}

 else{
 	 echo '<script language="javascript">alert("Email hoặc mật khẩu sai"); 
  window.location="login.php";</script>';
 }
}else{
	 echo '<script language="javascript">alert("Email hoặc mật khẩu sai"); 
  window.location="login.php";</script>';
}
}
elseif(isset($_POST['dangxuat'])){
 	echo '<script language="javascript">alert("Đăng xuất thành công"); 
window.location="index.php";</script>';
    session_unset();
 
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
  	
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
       <script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script src="assets/js/shop.js"></script>
    <script src="assets/js/ajax.js"></script>

  </head>
<body>
<!-- 
	Upper Header Section 
--><?php 
if(isset($_SESSION['soluong']) && isset($_SESSION['thanhtien'])){
echo '<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				<div class="pull-left socialNw">
					<a href="#"><span class="icon-twitter"></span></a>
					<a href="#"><span class="icon-facebook"></span></a>
					<a href="#"><span class="icon-youtube"></span></a>
					<a href="#"><span class="icon-tumblr"></span></a>
				</div>
				<a class="active" href="index.php"> <span class="icon-home"></span> Trang chủ</a> 
				<a href="login.php"><span class="icon-lock"></span> Đăng nhập</a> 
				<a href="register.php"><span class="icon-edit"></span> Đăng ký</a> 
				<a href="contact.php"><span class="icon-envelope"></span> Liên hệ</a>
				<a href="cart.php"><span class="icon-shopping-cart"></span> '.$_SESSION['soluong'].' món - <span class="badge badge-warning">'.number_format($_SESSION['thanhtien']).  '  VNĐ</span></a>
			</div>
		</div>
	</div>
</div>';
}
else{
	echo '<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				<div class="pull-left socialNw">
					<a href="#"><span class="icon-twitter"></span></a>
					<a href="#"><span class="icon-facebook"></span></a>
					<a href="#"><span class="icon-youtube"></span></a>
					<a href="#"><span class="icon-tumblr"></span></a>
				</div>
				<a class="active" href="index.php"> <span class="icon-home"></span> Trang chủ</a> 
				<a href="login.php"><span class="icon-lock"></span> Đăng nhập</a> 
				<a href="register.php"><span class="icon-edit"></span> Đăng ký</a> 
				<a href="contact.php"><span class="icon-envelope"></span> Liên hệ</a>
				<a href="cart.php"><span class="icon-shopping-cart"></span> 0 món - <span class="badge badge-warning">0 VNĐ</span></a>
			</div>
		</div>
	</div>
</div>';
}

?>
<!--
Lower Header Section 
-->
<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
	<div class="span4">
	<h1>
	<a class="logo" href="index.php"><span></span> 
		<img src="assets/img/logo-bootstrap-shoping-cart.png" alt="Shop cart">
	</a>
	</h1>
	</div>
	<div class="span4">
	</div>
	<div class="span4 alignR">
	<p><br> <strong> Hỗ trợ (24/7) :  0375 3231 537 </strong><br><br></p>
	</div>
</div>
</header>

<!--
Navigation Bar Section 
-->
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
		  	<?php 
		  	if( isset($_SESSION['quyen']) && ($_SESSION['quyen'] == '1')){
			echo '<ul class="nav">
			  <li class="active"><a href="index.php">Trang chủ</a></li>
			  <li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">Quản lý <b class="caret"></b></a>
			 <div class="dropdown-menu">
				 <form class="form-horizontal loginFrm" action="header.php" method="post">
				   <div class="control-group">
				 		<a href="manageproduct.php"> Quản lý sản phẩm</a> 
				   </div>
				   <div class="control-group">
				 		<a href="managecategory.php"> Quản lý danh mục</a> 
				   </div>
				   <div class="control-group">
				 		<a href="manageuser.php"> Quản lý khách hàng</a> 
				   </div>
				 </form>
				 </div>
				</li>
			</ul>';
		}
		else {
			echo '<ul class="nav">
			  <li class="active"><a href="index.php">Trang chủ</a></li>
			</ul>';
		}
			 ?>
			<form action="index.php" method="GET" class="navbar-search pull-left">
			  <input type="text" placeholder="Search" class="search-query span2" name="search">
				<button type="submit" class="btn btn-light " name="btn-search" style="margin:0;"><span class="icon-search"></span></button>
			</form>

			<?php 
			if(isset($_SESSION['name'])){
				// echo $_SESSION['name'];
				  // echo '<p class="text-white">'.$_SESSION['name'].'
      //               <a href="login.php">Đăng xuất</a></p>';
				echo '<ul class="nav pull-right">
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-user"><i class="fas fa-user"></i> '.$_SESSION['name'].' </span><b class="caret"></b></a>
				 <div class="dropdown-menu">
				 <form class="form-horizontal loginFrm" action="header.php" method="post">
				   <div class="control-group">
				 		<a href="#"><span class="icon-user"></span> Quản lí tài khoản</a> 
				   </div>
				   <div class="control-group">
				 	<button type="submit" class="shopBtn btn-block" name="dangxuat">Đăng xuất</button>
				   </div>
				 </form>
				 </div>
			</li>
			</ul>';	

			}else{
			echo '<ul class="nav pull-right">
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> Đăng nhập <b class="caret"></b></a>
				<div class="dropdown-menu">
				<form class="form-horizontal loginFrm" action="header.php" method="post">
				  <div class="control-group">
					<input type="email" class="span2" id="inputEmail" name="email" placeholder="Email" required>
				  </div>
				  <div class="control-group">
					<input type="password" class="span2" id="inputPassword" name="pass" placeholder="Password">
				  </div>
				  <div class="control-group">
					<label class="checkbox">
					<input type="checkbox"> Ghi nhớ
					</label>
					<button type="submit" class="shopBtn btn-block" name="dangnhap">Đăng nhập</button>
				  </div>
				</form>
				</div>
			</li>
			</ul>'	;
		}		
			?>
		  </div>
		</div>
	  </div>
	</div>

<!-- 
Body Section 
-->
<?php
ob_end_flush(); 
 ?>