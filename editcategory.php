<?php
include 'cauhinh.php'; 
session_start();
if($_SESSION['quyen']!='1'){
       echo '<script language="javascript">alert("Bạn không phải là admin"); 
  window.location="login.php"</script>';
}
    if(isset($_GET['idloaitrangsuc'])){
    $id = $_GET['idloaitrangsuc'];
    $query1 = "SELECT * FROM loaitrangsuc WHERE maloaitrangsuc = '$id'";
    $sql1 = mysqli_query($conn, $query1);
    while($row = mysqli_fetch_array($sql1)){
    $tenloaitrangsuc = $row['tenloaitrangsuc'];
   

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
</head>
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
<body>
	<?php 
	include 'header.php'; ?>
	 <main>
        <h3 class="text-center mt-3">Cập nhật danh mục : <span class="text-danger font-italic"><?php echo $id ."-". $tenloaitrangsuc ?></span></h3>

        <div class="container">
            <div class="editorCont">
                <form action="update.php" method="POST">
                    <div class="form-group">
                        <label for="name">ID: </label>
                        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id ?>" ><?php echo $id ?>
                    </div>
                    <div class="form-group">
                        <label for="tentrangsuc">Tên loại trang sức: </label>
                        <input type="text" class="form-control" name="tenloaitrangsuc" id="pname" placeholder="Tên sản phẩm" value="<?php echo $tenloaitrangsuc ?>">
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