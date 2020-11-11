<?php
	
require 'cauhinh.php';
require 'pagination.php';
if(isset($_GET['limit'])){
	$limit = $_GET['limit'];
	$sql = "SELECT count(maloaitrangsuc) as 'total' from trangsuc ";
$kq = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($kq);
$total_rc = $row['total']; 
$cr_page = isset($_GET['page'])? ($_GET['page']):1;
$total_page = ceil($total_rc/$limit);
if($cr_page>$total_page){
	$cr_page = $total_page;
}
else if($cr_page<1){
	$cr_page = 1;
}
$start = ($cr_page - 1)*$limit;
}

// 	if(isset($_GET['btn-search']) && $_GET['search'] != ''){
// $search = $_GET['search'];
// $sql = "SELECT count(matrangsuc) as 'total' from trangsuc where (tentrangsuc like '%$search%' ) OR (Bosuutap like '%$search%') OR (Tuoivang like '%$search%') ";

// $kq = mysqli_query($conn,$sql);
// $num1 = mysqli_num_rows($kq);
// $_SESSION['search'] = $num1;
// $row = mysqli_fetch_assoc($kq);
// $total_rc1 = $row['total']; 
// $cr_page1 = isset($_GET['page'])? ($_GET['page']):1;
// $limit = 10;
// $total_page1 = ceil($total_rc1/$limit);
// if($cr_page1>$total_page1){
// 	$cr_page1 = $total_page1;
// }
// else if($cr_page1<1){
// 	$cr_page1 = 1;
// }
// $start1 = ($cr_page1 - 1)*$limit;
//}
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
  </head>
<body>
<?php
	include("header.php");
?>
<!-- 
Body Section 
-->
	<div class="row">
		<?php include'sidebar.php' ?>
	<div class="span9">
	<div class="well np">
		<div id="myCarousel" class="carousel slide homCar">
            <div class="carousel-inner">
			  <div class="item">
                <img style="width:100%" src="assets/img/bootstrap_free-ecommerce.png" alt="bootstrap ecommerce templates">
                <div class="carousel-caption">
                      <h4>Chào mừng bạn đến với cửa hàng chúng tôi</h4>
                </div>
              </div>
			  <div class="item">
                <img style="width:100%" src="assets/img/carousel1.png" alt="bootstrap ecommerce templates">
                <div class="carousel-caption">
                      <h4>Nơi mang đến những sản phẩm chất lượng</h4>
                </div>
              </div>
			  <div class="item active">
                <img style="width:100%" src="assets/img/carousel3.png" alt="bootstrap ecommerce templates">
                <div class="carousel-caption">
                      <h4>Mong muốn đem đến hạnh phúc</h4>
                </div>
              </div>
              <div class="item">
                <img style="width:100%" src="assets/img/bootstrap-templates.png" alt="bootstrap templates">
                <div class="carousel-caption">
                      <h4>Dịch vụ chăm sóc khách hàng tuyệt vời</h4>
                </div>
              </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
          </div>
        </div>
<!--
New Products
-->
	<div class="well well-small">
	<h3>Sản phẩm mới</h3>
	<hr class="soften"/>
		<div class="row-fluid">
		<div id="newProductCar" class="carousel slide">
            <div class="carousel-inner">
			<div class="item active">
			  <ul class="thumbnails">
				<li class="span3">
				<div class="thumbnail">
					<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
					<a href="#" class="tag"></a>
					<a href="product_details.php"><img src="assets/img/bootstrap-ring.png" alt="bootstrap-ring"></a>
				</div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
					<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
					<a href="#" class="tag"></a>
					<a  href="product_details.php"><img src="assets/img/i.jpg" alt=""></a>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
					<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
					<a href="#" class="tag"></a>
					<a  href="product_details.php"><img src="assets/img/g.jpg" alt=""></a>
				  </div>
				</li>
				<li class="span3">
				  <div class="thumbnail">
					<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
					<a  href="product_details.php"><img src="assets/img/s.png" alt=""></a>
				  </div>
				</li>
			  </ul>
			  </div>
		   <div class="item">
		  <ul class="thumbnails">
			<li class="span3">
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a  href="product_details.php"><img src="assets/img/i.jpg" alt=""></a>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a  href="product_details.php"><img src="assets/img/f.jpg" alt=""></a>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a  href="product_details.php"><img src="assets/img/h.jpg" alt=""></a>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a  href="product_details.php"><img src="assets/img/j.jpg" alt=""></a>
			  </div>
			</li>
		  </ul>
		  </div>
		   </div>
		  <a class="left carousel-control" href="#newProductCar" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#newProductCar" data-slide="next">&rsaquo;</a>
		  </div>
		  </div>
		<div class="well well-small">
			<div class="row-fluid">
				 <div class="col-md-2 text-right">
          <label class="control-label label-arrange-category" for="input-limit">Hiển thị:</label>
        </div>
		  <div class="col-md-2 text-right">
          <select id="input-limit" class="form-control" onchange="location = this.value;">
               <option value="index.php?limit=10" selected="selected">10</option>
                 <option value="index.php?limit=20">20</option>
               <option value="index.php?limit=30" >30</option>
               <option value="index.php?limit=40">40</option>
               <option value="index.php?limit=50">50</option>
         </select>
        </div>
		  <ul class="thumbnails">
		  	<h3><a class="btn btn-mini pull-right" href="products.php" title="View more">Xem thêm<span class="icon-plus"></span></a> Sản phẩm của chúng tôi </h3>
		  <hr class="soften"/>
			<?php
			if(isset($_GET['btn-search']) && $_GET['search'] != ''){
				 $search = $_GET['search'];
				$sql = "SELECT * FROM trangsuc where giaban < $search  ";
			$kq = mysqli_query($conn,$sql);
			$num = mysqli_num_rows($kq);
            if ($num > 0) {
                echo "<h4> Kết quả tìm kiếm cho '<b>".$search."</b>':".$num."</h4>";
                echo'<hr class="soften"/>';	
			while($row=mysqli_fetch_assoc($kq)){
				 	 echo'  
			<li class="span4">
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php?idtrangsuc='.$row['matrangsuc'].'" title="Xem chi tiết"><span class="icon-search"></span> Xem chi tiết </a>
				<a  href="product_details.php"><img src="'.$row['hinhanh'].'" alt=""></a>
				<div class="caption">
				  <h5>'.$row['tentrangsuc'].'</h5>
				  <h4>
					  <a class="defaultBtn" href="product_details.php?idtrangsuc='.$row['matrangsuc'].'" title="Click to view"><span class="icon-zoom-in"></span></a>
					  <a class="shopBtn" href="addcart.php?item='.$row['matrangsuc'].'" title="add to cart"><span class="icon-plus"></span></a>
					  <span class="pull-right">'.number_format($row['giaban']).'</span>
				  </h4>
				</div>
			  </div>
			</li>';
				 } 
			
	// 				 echo '<hr class="soften"/>
 //  <div class="center">
 //  	<div class="pagination">';
 //  	// echo $_SESSION['search'];
	// 	if($cr_page1 > 1 && $total_page1 > 1){
	//  echo'<a class="page-link" href="index.php?page='.($cr_page1 - 1 ).'$">Previous</a>';
	// }
	//  for($i = 1; $i <= $total_page1;$i++){ 
	//  	if($i == $cr_page1){
 // 	 echo'<a class="active" href="#">'.$i.'</a>';
 // 	 }else{
 // 	 	 echo'<a class="page-link" href="index.php?page='.$i.'$">'.$i.'</a>';
 // 	 }
 // 	}
 // 	if($cr_page1 < $total_page1 && $total_page1 > 1){
 //  echo'<a class="page-link" href="index.php?page='.($cr_page1 + 1).'">Next</a>';
 //  	}
	// echo'</div>
	// 	</div>';
	 }
			else{
				 echo "<h4> Kết quả tìm kiếm cho '<b>".$search."</b>': 0</h4>";
                echo'<hr class="soften"/>';	
			}
		}
		else{
			$sql = "SELECT * FROM trangsuc limit $start,$limit ";
			$kq = mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($kq)){
		  echo'
			<li class="span4">
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php?idtrangsuc='.$row['matrangsuc'].'" title="Xem chi tiết"><span class="icon-search"></span> Xem chi tiết </a>
				<a  href="product_details.php"><img src="'.$row['hinhanh'].'" alt=""></a>
				<div class="caption">
				  <h5>'.$row['tentrangsuc'].'</h5>
				  <h4>
					  <a class="defaultBtn" href="product_details.php?idtrangsuc='.$row['matrangsuc'].'" title="Click to view"><span class="icon-zoom-in"></span></a>
					  <a class="shopBtn" href="addcart.php?item='.$row['matrangsuc'].'" title="add to cart"><span class="icon-plus"></span></a>
					  <span class="pull-right">'.number_format($row['giaban']).'</span>
				  </h4>
				</div>
			  </div>
			</li>
			 ';
			}
			echo'</ul>	
			  </div>
		  <hr class="soften"/>
  <div class="center">
  	<div class="pagination">';
		if($cr_page > 1 && $total_page > 1){
	 echo'<a class="page-link" href="index.php?page='.($cr_page - 1 ).'">Previous</a>';
	}
	 for($i = 1; $i <= $total_page;$i++){ 
	 	if($i == $cr_page){
 	 echo'<a class="active" href="#">'.$i.'</a>';
 	 }else{
 	 	 echo'<a class="page-link" href="index.php?page='.$i.'">'.$i.'</a>';
 	 }
 	}
 	if($cr_page < $total_page && $total_page > 1){
  echo'<a class="page-link" href="index.php?page='.($cr_page + 1).'">Next</a>';
  	}
		echo'</div>
		</div>';
			}
			
	 ?>
	
	</div>
	

	</div> 
	</div>
	</div>
<!-- 
Clients 
--><?php include 'footer.php'; ?>
</div>
  </body>
</html>