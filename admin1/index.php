<?php
 include ('../connect/connect.php');
?>
<?php 
 if(isset($_POST['them']))
   
 {  
     $masp = $_POST['ma']; 
     $tensp = $_POST['ten'];
     $hinh = $_FILES['hinh']['name'];
    $giasp = $_POST['giasp'];
     $mota =$_POST['des'];
     $danhmuc = $_POST['danhmuc'];
     $path = '../images/';
     $date =$_POST['trip-start'];
     $hinh_tmp = $_FILES['hinh']['tmp_name'];
     
     $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
     $ext = pathinfo($hinh, PATHINFO_EXTENSION);
     if(!array_key_exists($ext,$allowed))
     {
        
         echo'ko thanh cong';
     }
     else
     {
        $sql_insert = mysqli_query($mysqli,"INSERT INTO sanpham(masp,tensp,gia,hinh,mota,maloai,ngaynhap) VALUES('$masp','$tensp','$giasp','$hinh','$mota','$danhmuc','$date')");

     move_uploaded_file($hinh_tmp,$path .$hinh);
     echo "thanh cong";
     }
    
 }
?>
<?php 

if(isset($_GET['xoa']))
{

    $id=$_GET['xoa'];


    $sql_xoa = mysqli_query($mysqli,"DELETE  FROM sanpham WHERE masp='$id'");

  ?>

    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Thông báo:</strong>Cập nhật thành công!
</div> 
<?php
}

?>



<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.0
* Author: Alexis Luna
* Copyright 2020 Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | Trang Admin</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="assets/vendor/chartsjs/Chart.min.css" rel="stylesheet">
    <link href="assets/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <img src="assets/img/logo.png" alt="bootraper logo" class="app-logo">
            </div>
            <ul class="list-unstyled components text-secondary">
                <li>
                    <a href="dashboard.html"><i class="fas fa-home"></i> Dashboard</a>
                </li>
       
               
               
               
            </ul>
        </nav>
        <div id="body" class="active">
            <nav class="navbar navbar-expand-lg navbar-white bg-white">
                <button type="button" id="sidebarCollapse" class="btn btn-light"><i class="fas fa-bars"></i><span></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="" class="nav-item nav-link dropdown-toggle text-secondary" data-toggle="dropdown"><i class="fas fa-link"></i> <span>Quick Access</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i></a>
                                <div class="dropdown-menu dropdown-menu-right nav-link-menu">
                                    <ul class="nav-list">
                                        <li><a href="" class="dropdown-item"><i class="fas fa-list"></i> Access Logs</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-database"></i> Back ups</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-cloud-download-alt"></i> Updates</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-user-shield"></i> Roles</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="" class="nav-item nav-link dropdown-toggle text-secondary" data-toggle="dropdown"><i class="fas fa-user"></i> <span>John Doe</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i></a>
                                <div class="dropdown-menu dropdown-menu-right nav-link-menu">
                                    <ul class="nav-list">
                                        <li><a href="" class="dropdown-item"><i class="fas fa-address-card"></i> Profile</a></li>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-envelope"></i> Messages</a></li>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 page-header">
                            <div class="page-pretitle">POS</div>
                            <h2 class="page-title">Bảng quản lý sản phẩm</h2>
                        </div>
                    </div>
                <?php
                
                $sql_hienthi =mysqli_query($mysqli,"SELECT * FROM sanpham ORDER BY masp DESC");
                ?>
                <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th scope="col">Thứ tự</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Danh mục</th>
                                             
                                            <th scope="col">Chức năng</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          $i=0;
                                          while ($row = mysqli_fetch_array($sql_hienthi))
                                          {
                                            $i++; 
                                          ?>
                                          <tr>
                                            
                                            <th scope="row"><?php echo $i; ?></th>
                                            <td><?php echo $row['tensp']?></td>
                                            <td><?php echo $row['gia']?></td>
                                            <td><img src="../images/<?php echo $row['hinh']?>" height="30" width="30"></td>
                                            <td><?php echo $row['maloai'];?></td>
                                            <td>
                                            <a href="?xoa=<?php echo $row['masp']?>" class="btn btn-primary">Xóa</a>
                                            <a href="index.php?quanly=capnhat&capnhat=<?php echo $row['masp']?>" class="btn btn-danger">Cập nhật</a>
                
                                            </td>
                                            
                                          
                                          </tr>
                                          <tr>
                                            <?php 
                                          }
                                            ?>
                                            
                                        </tbody>
                                      </table>
                                      
                                             
                
                <div class="col-12 ">
                    <br>
                    <h4>Thêm sản phẩm</h4>
                    <br>
                    <form action="" method="post" enctype="multipart/form-data">
                        <label>Mã sản phẩm</label>
                        <input type="text" class="form-control" name="ma" placeholder="Mã sản phẩm"><br>
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="ten" placeholder="Tên sản phẩm"><br>
                        <label>Hình</label>
                        <input type="file" class="form-control btn btn-warning" name="hinh">
                        <label>Giá</label>
                        <input type="text" class="form-control" name="giasp" placeholder="Giá"><br>
                        <label>Mô tả</label>
                        <textarea type="text" class="form-control" name="des" placeholder="Mô tả"></textarea><br>
                        <label for="start">Start date:</label>

<input type="date" id="start" name="trip-start" value="<?php $time= time(); echo(date("Y-m-d",$time)); ?>" min="2020-1-1" max="2022-1-1"><br>
                        
                        <label>Danh mục</label>
                        <?php 
                        $sql_danhmuc = mysqli_query($mysqli,"SELECT * FROM loaisanpham ORDER BY maloai DESC");

                        ?>
                        <select name="danhmuc" class="form-control">
                        <option>--Chọn--</option>

                            <?php 

                            while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc))
                            {
                            ?>
                                <option value="<?php echo $row_danhmuc['maloai']; ?>"><?php echo $row_danhmuc['tenloai']; ?></option>
                            <?php } ?>
                        </select>

                        <br>
                        <div class="text-center">
                      <input type="submit" name="them" value="Submit" class="btn btn-primary">
</div>

                    

                    
                    </form>

                </div>

                       
                      
                                   
                                       
                           
                
                       
                                            
                       
                    
                          
            </div>
        </div>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/js/dashboard-charts.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>