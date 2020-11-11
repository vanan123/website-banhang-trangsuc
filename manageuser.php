<?php
 include 'cauhinh.php';
 session_start();
 if($_SESSION['quyen']!='1'){
       echo '<script language="javascript">alert("Bạn không phải là admin"); 
  window.location="login.php"</script>';
}
  $emptyErr = "";
if($_SERVER['REQUEST_METHOD'] == 'GET') {
       $sql = "DELETE";
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản lý khách hàng</title>
	<link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
     <link rel="shortcut icon" href="assets/ico/favicon.ico">
	   <style>
        body::-webkit-scrollbar {
            width: 0.25em;
        }
        body::-webkit-scrollbar-track {
            background: #1e1e24;
        }
        body::-webkit-scrollbar-thumb {
            background: #f1c40f;
        }
    </style>
</head>
<body>
	<?php
	include 'header.php';  
	 ?>
 <h1 class="text-center mt-2">Quản lý khách hàng</h1>
    <main>
        <div class="container">
            <div class="table-responsive-md">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Mật khẩu</th>
                            <th>SĐT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM thanhvien where quyen = '0' order by mathanhvien asc ";
                            $rs = mysqli_query($conn, $query);
                            
                            while($row = mysqli_fetch_assoc($rs)) {
                                  echo '<tr>
                                        <td>'.$row['mathanhvien'].'</td>
                                        <td>'.$row['hoten'].'</td>
                                        <td>'.$row['email'].'</a></td>
                                        <td>'.$row['matkhau'].'</td>
                                        <td>'.$row['sdt'].'</td>
                                        
                                        <td>
                                            <div class="mb-1">
                                                   <form action ="delete.php" method="GET">
                                                    <input  type="hidden" name="idthanhvien" value="'.$row['mathanhvien'].'">
                                                    <input class="btn btn-danger" type="submit" value="Xóa" name="delete-user">   
                                                </form>
                                            </div>
                                        </td>
                                    </tr>';
                            }
                        ?>
                    <tbody>  
                </table>
            </div>
        </div>
    </main>

    <?php include 'footer.php' ?>
    </div>
</body>
</html>