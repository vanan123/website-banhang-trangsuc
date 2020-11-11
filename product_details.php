<?php
require 'cauhinh.php';
session_start();
$disable = "";
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
   <!--  <script>
		$(document).ready(function() {
			$('#send').click(function() {
				var url_string = window.location.href;
				var url = new URL(url_string);
				var idsp = url.searchParams.get('idtrangsuc');
				var comment = $('#noidung').val();
				// var idthanhvien = $row['mathanhvien'].val();
				$.post('comment.php', {noidung: comment,idtrangsuc : idsp}, function(result) {
				$('.show-comment').append('<hr>'+comment);
				});
			});
		});
	</script> -->
  </head>
<body>
<?php
require("header.php");
?>
<!-- 
Body Section 
-->
	<div class="row">
		<?php  include'sidebar.php';
		 ?>
	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.php">Trang chủ </a> <span class="divider">/</span></li>
    <?php
    $_SESSION['id'] = $_REQUEST['idtrangsuc'];

    $sql = 'SELECT * FROM trangsuc where matrangsuc ='.$_SESSION['id'];
    $kq = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($kq);
    $loaitrangsuc = $row['maloaitrangsuc'];
    $sql1 = 'SELECT * FROM loaitrangsuc where maloaitrangsuc ='. $loaitrangsuc;
    $kq1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_assoc($kq1);
    echo '<li><a href="products.php?loaitrangsuc='.$row1['maloaitrangsuc'].'">'.$row1['tenloaitrangsuc'].'</a> <span class="divider">/</span></li>';
     ?>
    
    <li class="active">Preview</li>
    </ul>	
	<div class="well well-small">
		 <?php
    $id = $_REQUEST['idtrangsuc'];
    $sql = 'SELECT * FROM trangsuc where matrangsuc = '.$id;
    $kq = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($kq);
	echo '<div class="row-fluid">
		<div class="span5">
			<div id="myCarousel" class="carousel slide cntr">
                <div class="carousel-inner">
                  <div class="item active">
                   <a href="#"> <img src="'.$row['hinhanh'].'" alt="" style="width:100%;height: 350px;"></a>
                  </div>
                </div>
            </div>
			</div>
			<div class="span7">
				<hr class="soft"/>
				
				<form class="form-horizontal qtyFrm">
				  <div class="control-group">
					<h3 class="name-product">'.$row['tentrangsuc'].'</h3>
				  </div>
				
				  <div class="control-group">
					<label class="control-label"><span>Số lượng trong kho: '.$row['soluong'].'</span></label>
				  </div>
				    <div class="control-group">
					<h4 class="price-product">'.number_format($row['giaban']).'</h4>
				  </div>
				 
				  <button type="submit" class="shopBtn"><span class=" icon-shopping-cart"></span>
				  <a href="addcart.php?item='.$row['matrangsuc'].'"> Thêm vào giỏ hàng</a></button>
				</form>
			</div>
			</div>

				<hr class="softn clr"/>

<!-- 
             <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
              <li class=""><a href="#profile" data-toggle="tab">Related Products </a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Acceseries <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#cat1" data-toggle="tab">Category one</a></li>
                  <li><a href="#cat2" data-toggle="tab">Category two</a></li>
                </ul>
              </li>
            </ul> -->
            <div id="myTabContent" class="tab-content tabWrapper">
            <div class="tab-pane fade active in" id="home">
			  <h4>Thông tin chi tiết</h4>
                <table class="table table-striped">
				<tbody>
				<tr class="techSpecRow"><td class="techSpecTD1">Thương hiệu:</td>
				<td class="techSpecTD2">'.$row['Thuonghieu'].'</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Bộ sưu tập:</td>
				<td class="techSpecTD2">'.$row['Bosuutap'].'</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Loại đá:</td>
				<td class="techSpecTD2">'.$row['Loaida'].'</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Màu đá:</td>
				<td class="techSpecTD2">'.$row['Mauda'].'</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Hình dáng:</td>
				<td class="techSpecTD2">'.$row['Hinhdang'].'</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Dịp tặng:</td>
				<td class="techSpecTD2">'.$row['Diptang'].'</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Trọng lượng:</td>
				<td class="techSpecTD2">'.$row['Trongluong'].'</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Chủng loại:</td>
				<td class="techSpecTD2">'.$row['Chungloai'].'</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Tuổi vàng:</td>
				<td class="techSpecTD2">'.$row['Tuoivang'].'</td></tr>
				</tbody>
				</table>';
				?>
		

			</div>
			
				
		<!-- 	<div class="tab-pane fade" id="profile">
			<div class="row-fluid">	  
			<div class="span2">
				<img src="assets/img/d.jpg" alt="">
			</div>
			<div class="span6">
				<h5>Product Name </h5>
				<p>
				Nowadays the lingerie industry is one of the most successful business spheres.
				We always stay in touch with the latest fashion tendencies - 
				that is why our goods are so popular..
				</p>
			</div>
			<div class="span4 alignR">
			<form class="form-horizontal qtyFrm">
			<h3> $140.00</h3>
			<label class="checkbox">
				<input type="checkbox">  Adds product to compair
			</label><br>
			<div class="btn-group">
			  <a href="product_details.php" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
			  <a href="product_details.php" class="shopBtn">VIEW</a>
			 </div>
				</form>
			</div>
		</div>
			<hr class="soft">
			<div class="row-fluid">	  
			<div class="span2">
				<img src="assets/img/d.jpg" alt="">
			</div>
			<div class="span6">
				<h5>Product Name </h5>
				<p>
				Nowadays the lingerie industry is one of the most successful business spheres.
				We always stay in touch with the latest fashion tendencies - 
				that is why our goods are so popular..
				</p>
			</div>
			<div class="span4 alignR">
			<form class="form-horizontal qtyFrm">
			<h3> $140.00</h3>
			<label class="checkbox">
				<input type="checkbox">  Adds product to compair
			</label><br>
			<div class="btn-group">
			  <a href="product_details.php" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
			  <a href="product_details.php" class="shopBtn">VIEW</a>
			 </div>
				</form>
			</div>
	</div>
			<hr class="soft"/>
			<div class="row-fluid">	  
			<div class="span2">
				<img src="assets/img/d.jpg" alt="">
			</div>
			<div class="span6">
				<h5>Product Name </h5>
				<p>
				Nowadays the lingerie industry is one of the most successful business spheres.
				We always stay in touch with the latest fashion tendencies - 
				that is why our goods are so popular..
				</p>
			</div>
			<div class="span4 alignR">
			<form class="form-horizontal qtyFrm">
			<h3> $140.00</h3>
			<label class="checkbox">
				<input type="checkbox">  Adds product to compair
			</label><br>
			<div class="btn-group">
			  <a href="product_details.php" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
			  <a href="product_details.php" class="shopBtn">VIEW</a>
			 </div>
				</form>
			</div>
	</div>
			<hr class="soft"/>
			<div class="row-fluid">	  
					<div class="span2">
						<img src="assets/img/d.jpg" alt="">
					</div>
					<div class="span6">
						<h5>Product Name </h5>
						<p>
						Nowadays the lingerie industry is one of the most successful business spheres.
						We always stay in touch with the latest fashion tendencies - 
						that is why our goods are so popular..
						</p>
					</div>
					<div class="span4 alignR">
					<form class="form-horizontal qtyFrm">
					<h3> $140.00</h3>
					<label class="checkbox">
						<input type="checkbox">  Adds product to compair
					</label><br>
					<div class="btn-group">
					  <a href="product_details.php" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
					  <a href="product_details.php" class="shopBtn">VIEW</a>
					 </div>
						</form>
					</div>
			</div>
			<hr class="soften"/>
			<div class="row-fluid">	  
					<div class="span2">
						<img src="assets/img/d.jpg" alt="">
					</div>
					<div class="span6">
						<h5>Product Name </h5>
						<p>
						Nowadays the lingerie industry is one of the most successful business spheres.
						We always stay in touch with the latest fashion tendencies - 
						that is why our goods are so popular..
						</p>
					</div>
					<div class="span4 alignR">
					<form class="form-horizontal qtyFrm">
					<h3> $140.00</h3>
					<label class="checkbox">
						<input type="checkbox">  Adds product to compair
					</label><br>
					<div class="btn-group">
					  <a href="product_details.php" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
					  <a href="product_details.php" class="shopBtn">VIEW</a>
					 </div>
						</form>
					</div>
			</div>
			</div> -->
       <!--        <div class="tab-pane fade" id="cat1">
                <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
              <br>
              <br>
			  <div class="row-fluid">	  
					<div class="span2">
						<img src="assets/img/b.jpg" alt="">
					</div>
					<div class="span6">
						<h5>Product Name </h5>
						<p>
						Nowadays the lingerie industry is one of the most successful business spheres.
						We always stay in touch with the latest fashion tendencies - 
						that is why our goods are so popular..
						</p>
					</div>
					<div class="span4 alignR">
					<form class="form-horizontal qtyFrm">
					<h3> $140.00</h3>
					<label class="checkbox">
						<input type="checkbox">  Adds product to compair
					</label><br>
					<div class="btn-group">
					  <a href="product_details.php" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
					  <a href="product_details.php" class="shopBtn">VIEW</a>
					 </div>
						</form>
					</div>
			</div>
			<hr class="soften"/>
			<div class="row-fluid">	  
					<div class="span2">
						<img src="assets/img/a.jpg" alt="">
					</div>
					<div class="span6">
						<h5>Product Name </h5>
						<p>
						Nowadays the lingerie industry is one of the most successful business spheres.
						We always stay in touch with the latest fashion tendencies - 
						that is why our goods are so popular..
						</p>
					</div>
					<div class="span4 alignR">
					<form class="form-horizontal qtyFrm">
					<h3> $140.00</h3>
					<label class="checkbox">
						<input type="checkbox">  Adds product to compair
					</label><br>
					<div class="btn-group">
					  <a href="product_details.php" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
					  <a href="product_details.php" class="shopBtn">VIEW</a>
					 </div>
						</form>
					</div>
			</div>
			<hr class="soften"/>
			  </div> -->
          <!--     <div class="tab-pane fade" id="cat2">
                
				<div class="row-fluid">	  
					<div class="span2">
						<img src="assets/img/d.jpg" alt="">
					</div>
					<div class="span6">
						<h5>Product Name </h5>
						<p>
						Nowadays the lingerie industry is one of the most successful business spheres.
						We always stay in touch with the latest fashion tendencies - 
						that is why our goods are so popular..
						</p>
					</div>
					<div class="span4 alignR">
					<form class="form-horizontal qtyFrm">
					<h3> $140.00</h3>
					<label class="checkbox">
						<input type="checkbox">  Adds product to compair
					</label><br>
					<div class="btn-group">
					  <a href="product_details.php" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
					  <a href="product_details.php" class="shopBtn">VIEW</a>
					 </div>
						</form>
					</div>
			</div>
			<hr class="soften"/>
			<div class="row-fluid">	  
					<div class="span2">
						<img src="assets/img/d.jpg" alt="">
					</div>
					<div class="span6">
						<h5>Product Name </h5>
						<p>
						Nowadays the lingerie industry is one of the most successful business spheres.
						We always stay in touch with the latest fashion tendencies - 
						that is why our goods are so popular..
						</p>
					</div>
					<div class="span4 alignR">
					<form class="form-horizontal qtyFrm">
					<h3> $140.00</h3>
					<label class="checkbox">
						<input type="checkbox">  Adds product to compair
					</label><br>
					<div class="btn-group">
					  <a href="product_details.php" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
					  <a href="product_details.php" class="shopBtn">VIEW</a>
					 </div>
						</form>
					</div>
			</div>
			<hr class="soften"/>
			<div class="row-fluid">	  
					<div class="span2">
						<img src="assets/img/d.jpg" alt="">
					</div>
					<div class="span6">
						<h5>Product Name </h5>
						<p>
						Nowadays the lingerie industry is one of the most successful business spheres.
						We always stay in touch with the latest fashion tendencies - 
						that is why our goods are so popular..
						</p>
					</div>
					<div class="span4 alignR">
					<form class="form-horizontal qtyFrm">
					<h3> $140.00</h3>
					<label class="checkbox">
						<input type="checkbox">  Adds product to compair
					</label><br>
					<div class="btn-group">
					  <a href="product_details.php" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
					  <a href="product_details.php" class="shopBtn">VIEW</a>
					 </div>
						</form>
					</div>
			</div>
			<hr class="soften"/>
			<div class="row-fluid">	  
					<div class="span2">
						<img src="assets/img/d.jpg" alt="">
					</div>
					<div class="span6">
						<h5>Product Name </h5>
						<p>
						Nowadays the lingerie industry is one of the most successful business spheres.
						We always stay in touch with the latest fashion tendencies - 
						that is why our goods are so popular..
						</p>
					</div>
					<div class="span4 alignR">
					<form class="form-horizontal qtyFrm">
					<h3> $140.00</h3>
					<label class="checkbox">
						<input type="checkbox">  Adds product to compair
					</label><br>
					<div class="btn-group">
					  <a href="product_details.php" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
					  <a href="product_details.php" class="shopBtn">VIEW</a>
					 </div>
						</form>
					</div>
			</div>
			<hr class="soften"/>
			
				</div> -->
			</div>
			<hr>

                    <div class="comment-section">
                       
                       
                            <?php   
                            echo'<div class="comments" id="comments">';
                                if(isset($_SESSION['id']) && isset($_SESSION['idthanhvien'])) {
                                	 $userid = $_SESSION['idthanhvien'];
                                	 $productID = $_SESSION['id'];
                                    $sql = "SELECT * FROM binhluan where idtrangsuc =".$_SESSION['id'];

                                    $query = mysqli_query($conn, $sql);
                                   

                                    while($cmt = mysqli_fetch_assoc($query)) {
                                    $comment = $cmt['noidung'];
                                    $date = $cmt['thoigian'];
                                    $sql2 = "SELECT mathanhvien,hoten FROM thanhvien WHERE mathanhvien = ".$cmt['idthanhvien'];
                                    $query2 = mysqli_query($conn, $sql2);
                                    $userinfo = mysqli_fetch_row($query2);
                                    $user = $userinfo[1];
                                    echo "
                                        <div class='comment'>
                                            <p class='cmt-user'><span class='icon-user'></span> ".$user."<span class='text-muted small'> --- Ngày đăng: ".$date."</span></p>
                                            <div class='cmt-commment'>
                                                ".$comment."
                                            </div>                                         
                                        </div>
                                        <br>
                                    ";   }
                                    echo '</div>';
                        echo'
                        <div class="comment-form">
                                <h3>Viết bình luận <span class="icon-pencil"></span></h3>
                                <textarea name="post" id="post" rows="5"></textarea>
                                <button class="btn btn-primary" onclick="load();" <?php echo $disable ?> Đăng </button>
                                <script>
                                    function load() {
                                        let cmt = document.getElementById("post").value;
                                        console.log(cmt);
                                        let url = "comment.php?userid=<?php echo $userid ?>&productid=<?php echo $productID ?>&cmt=" + cmt;
                                        loadDoc(url, loadCmt);
                                        document.getElementById("post").value = "";
                                    }
                                </script>
                            </div>
                            ';
                             
                                }
                                	 // 
                                else if(isset($_SESSION['id'])) {
                                    $sql = "SELECT * FROM binhluan where idtrangsuc =".$id;

                                    $query = mysqli_query($conn, $sql);
                                    while($cmt = mysqli_fetch_assoc($query)) {
                                    $comment = $cmt['noidung'];
                                    $date = $cmt['thoigian'];
                                    $sql2 = "SELECT mathanhvien,hoten FROM thanhvien WHERE mathanhvien = ".$cmt['idthanhvien'];
                                    $query2 = mysqli_query($conn, $sql2);
                                    $userinfo = mysqli_fetch_row($query2);
                                    $user = $userinfo[1];

                                   echo'<div class="comments" id="comments">';
                                    echo "
                                        <div class='comment'>
                                            <p class='cmt-user'><span class='icon-user'></span> ".$user."<span class='text-muted small'> --- Ngày đăng: ".$date."</span></p>
                                            <div class='cmt-commment'>
                                                ".$comment."
                                            </div>                                         
                                        </div>
                                        <br>
                                    ";   }
                                    }
                                    echo '
                        </div>';
                                
                            ?>
                </div>

</div>
</div>

<!-- 
Clients 
-->


<!--
Footer
-->
<?php
require 'footer.php'; 
 ?>
  </body>
</html>