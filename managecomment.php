<?php
require 'cauhinh.php';
session_start();
if($_SESSION['quyen']!='1'){
       echo '<script language="javascript">alert("Bạn không phải là admin"); 
  window.location="login.php"</script>';
}
require 'pagination.php'; 
 ?>
    <?php require 'header.php'; ?>
     <h1 class="text-center mt-2">Quản lý bình luận</h1>
    <main>
        <div class="container">
            <div class="table-responsive-md">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên trang sức</th>
                            <th>Tên thành viên</th>
                            <th>Nội dung</th>
                            <th>Thời gian</th>
                        </tr>
                    </thead>
                    <tbody>
                          <?php
                        $sql = "SELECT count(id) as 'total' from binhluan";
                        $kq = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($kq);
                        $total_rc = $row['total']; 
                        $cr_page = isset($_GET['page'])? ($_GET['page']):1;
                        $limit = 8;
                        $total_page = ceil($total_rc/$limit);
                        if($cr_page>$total_page){
                            $cr_page = $total_page;
                        }
                        else if($cr_page<1){
                            $cr_page = 1;
                        }
                        $start = ($cr_page - 1)*$limit; 
                         ?>
                        <?php
                            $query = "SELECT binhluan.id,tentrangsuc,hoten,noidung,thoigian FROM binhluan,trangsuc,thanhvien WHERE idtrangsuc = matrangsuc and idthanhvien = mathanhvien limit $start,$limit ";
                            $rs = mysqli_query($conn, $query);
                            
                            while($row = mysqli_fetch_assoc($rs)) {
                                echo '<tr>
                                        <td>'.$row['id'].'</td>
                                        <td>'.$row['tentrangsuc'].'</td>
                                        <td>'.$row['hoten'].'</td>
                                        <td>'.$row['noidung'].'</td>
                                        <td>'.$row['thoigian'].'</td>
                                        <td>
                                            <div class="mb-1">
                                                <form action ="delete.php" method="GET">
                                                    <input  type="hidden" name="idbinhluan" value="'.$row['id'].'">
                                                    <input class="btn btn-danger" type="submit" name="delete-product" value="Xóa">   
                                                </form>
                                            </div>
                                        </td>
                                    </tr>';
                            }
            
    ?>
         
                    </tbody>  
                </table>
            </div>
            <?php 
                 echo'<hr class="soften"/>
  <div class="center">
    <div class="pagination">';
        if($cr_page > 1 && $total_page > 1){
     echo'<a class="page-link" href="managecomment.php?page='.($cr_page - 1 ).'">Previous</a>';
    }
     for($i = 1; $i <= $total_page;$i++){ 
        if($i == $cr_page){
     echo'<a class="active" href="#">'.$i.'</a>';
     }else{
         echo'<a class="page-link" href="managecomment.php?page='.$i.'">'.$i.'</a>';
     }
    }
    if($cr_page < $total_page && $total_page > 1){
  echo'<a class="page-link" href="managecomment.php?page='.($cr_page + 1).'">Next</a>';
    }
        echo'</div>
        </div>';
             ?>
        </div>
    </main>
    <?php 
    require 'footer.php'; ?>
</div>
</body>
</html>