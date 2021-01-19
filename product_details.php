<?php
require 'cauhinh.php';
session_start();
$disable = "";
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
                  ';
                  if($row['soluong'] > 0){
                    echo'
					<label class="control-label"><span>Số lượng trong kho: '.$row['soluong'].'</span></label>
				  </div>
				    <div class="control-group">
					<h4 class="price-product">'.number_format($row['giaban']).'</h4>
				  </div>
				 
				  <button type="submit" class="shopBtn"><span class=" icon-shopping-cart"></span>
				  <a href="addcart.php?item='.$row['matrangsuc'].'"> Thêm vào giỏ hàng</a></button>
				</form>
			</div>
			</div>';
}else
{
    echo'
                    <label class="control-label"><span>Số lượng trong kho: '.$row['soluong'].'</span></label>
                  </div>
                    <div class="control-group">
                    <h4 class="price-product">'.number_format($row['giaban']).'</h4>
                  </div>
                 
                  <h4 class="shopBtn btn btn-danger"><span class=" icon-shopping-cart"></span>
                   HẾT HÀNG</h4>
                </form>
            </div>
            </div>';
}   
			echo '<hr class="softn clr"/>

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
			</div>
			<hr>

                    <div class="comment-section">
                    <div class="comments" id="comments">
                            <?php   
                                if(isset($_SESSION['id']) && isset($_SESSION['idthanhvien'])) {
                                	 $userid = $_SESSION['idthanhvien'];
                                	 $productID = $_SESSION['id'];
                                    $sql = "SELECT * FROM binhluan where idtrangsuc =".$productID;
                                    $query = mysqli_query($conn, $sql);
                                    $i=0;
                                    while($cmt = mysqli_fetch_assoc($query)) {
                                    $idname = "reply-form".$i;
                                    $i++;
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
                                              <button onclick='replyToggle".$i."();' style='border:none; background-color: transparent; outline:none; color: #0abde3;' class='toggle-reply'>Trả lời</button>
                                            <script>
                                                function replyToggle".$i."() {
                                                    let id = '".$idname."';
                                                    let editor = document.getElementById(id);
                                                    if(editor.classList.contains('hide')) {
                                                        editor.classList.remove('hide');
                                                    } else {
                                                        editor.classList.add('hide');
                                                    }
                                                }
                                            </script>
                                            <div class='reply-cont' id='rc-".$i."'>
                                             <b>Reply</b>
                                            ";                                    
                                       $sql3 = "SELECT * FROM traloibinhluan where idBinhluan =".$cmt['id'];
                                            $getrl = mysqli_query($conn, $sql3);
                                             while($rs = mysqli_fetch_assoc($getrl)){
                                              $comment1 = $rs['Noidung'];
                                    $date1 = $rs['ngay'];
                                    $sql4 = "SELECT mathanhvien,hoten FROM thanhvien WHERE mathanhvien = ".$rs['idThanhvien'];
                                    $query4 = mysqli_query($conn, $sql4);
                                    $userinfo1 = mysqli_fetch_row($query4);
                                    $user1 = $userinfo1[1];
                                           
                                                echo " <div class='comment'>
                                            <p class='cmt-user'><span class='icon-user'></span> ".$user1."<span class='text-muted small'> --- Ngày đăng: ".$date1."</span></p>
                                            <div class='cmt-commment'>
                                                ".$comment1."
                                            </div>
                                             </div>
                                               ";
                                            }
                        echo"
                        </div>
                        </div>
                         <div id='".$idname."' class='reply-form hide'>
                                                <textarea id='post-".$idname."' name='reply' class='reply-section' rows='1'></textarea>
                                        <?php
                                            if(isset({$_SESSION['idthanhvien']})) {
                                                ?>
                                                <button class='btn btn-primary' onclick='loadreply".$i."();' <?php echo $disable ?>Đăng</button>
                                                <?php
                                            }
                                        ?>
                                        <script>
                                            function loadreply".$i."() {
                                                let cmt = document.getElementById('post-".$idname."').value;
                                                let url = 'comment.php?userid=$userid&productid=$productID&parentid={$cmt['id']}&cmt='+cmt;
                                                loadDoc(url, loadR".$i." = (xhttp) => {
                                                    let id = 'rc-".$i."';
                                                    document.getElementById(id).innerHTML =
                                                    document.getElementById(id).innerHTML + xhttp.responseText;
                                                });
                                                document.getElementById('post-".$idname."').value = '';
                                            }
                                        </script>
                                    </div>
                                            ";
                                }
                                echo '<div class="comment-form">
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
                                  </div>';
                                }
                       else if(isset($_SESSION['id'])){
                         $productID = $_SESSION['id'];
                                    $sql = "SELECT * FROM binhluan where idtrangsuc =".$productID;
                                    $query = mysqli_query($conn, $sql);
                                    $i=0;
                                    while($cmt = mysqli_fetch_assoc($query)) {
                                    $idname = "reply-form".$i;
                                    $i++;
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
                                            <div class='reply-cont' id='rc-".$i."'>
                                             <b>Reply</b>
                                            ";
                                              $sql3 = "SELECT * FROM traloibinhluan where idBinhluan =".$cmt['id'];
                                            $getrl = mysqli_query($conn, $sql3);
                                             while($rs = mysqli_fetch_assoc($getrl)){
                                              $comment1 = $rs['Noidung'];
                                    $date1 = $rs['ngay'];
                                    $sql4 = "SELECT mathanhvien,hoten FROM thanhvien WHERE mathanhvien = ".$rs['idThanhvien'];
                                    $query4 = mysqli_query($conn, $sql4);
                                    $userinfo1 = mysqli_fetch_row($query4);
                                    $user1 = $userinfo1[1];
                                           
                                                echo " <div class='comment'>
                                            <p class='cmt-user'><span class='icon-user'></span> ".$user1."<span class='text-muted small'> --- Ngày đăng: ".$date1."</span></p>
                                            <div class='cmt-commment'>
                                                ".$comment1."
                                            </div>
                                             </div>
                                               ";
                                            }
                                             echo"
                        </div>
                        </div>
                                            ";
                                }     
                                }
                                echo ' </div>';
                                 ?>
                            </div>
                </div>
<script>
</script>  
<?php
require 'footer.php'; 
 ?>
  </body>
</html>