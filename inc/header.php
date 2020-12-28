<?php
include 'connect/connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đồ Gia Dụng</title>

    <link href="//fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-fluid">

        <div class="row min-vh-100">
            <div class="col-12">
                <header class="row">
                    <!-- Top Nav -->
                    <div class="col-12 bg-dark py-2 d-md-block d-none">
                        <div class="row">
                            <div class="col-auto mr-auto">
                                <ul class="top-nav">
                                    <li>
                                        <a href="tel:0378892360"><i class="fa fa-phone-square mr-2"></i>0378892360</a>
                                    </li>
                                    <li>
                                        <a href="mailto:phison.vps.19@gmail.com"><i class="fa fa-envelope mr-2"></i>phison.vps.19@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <ul class="top-nav">
                                    <li>
                                        <a href="register.php"><i class="fas fa-user-edit mr-2"></i>Đăng ký</a>
                                    </li>
                                    <li>
                                        <a href="login.php"><i class="fas fa-sign-in-alt mr-2"></i>Đăng nhập</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Top Nav -->

                    <!-- Header -->
                    <div class="col-12 bg-white pt-4">
                        <div class="row">
                            <div class="col-lg-auto">
                                <div class="site-logo text-center text-lg-left">
                                    <a href="index.php">Sơn Lợi Shop</a>
                                </div>
                            </div>
                            <div class="col-lg-5 mx-auto mt-4 mt-lg-0">
                                <form action="index.php?quanly=search" method="POST">
                                    <div class="form-group">
                                        <div class="input-group">
                                        
                                            <input type="search" class="form-control border-dark" name="search_button" placeholder="Tìm kiếm" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-dark" name="search_submit" type="submit"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-auto text-center text-lg-left header-item-holder">
                                <a href="#" class="header-item">
                                    <i class="fas fa-heart mr-2"></i><span id="header-favorite">0</span>
                                </a>
                                <a href="?quanly=giohang" class="header-item">
                                   <i class="fas fa-shopping-bag mr-2"></i><span id="header-qty" class="mr-3"></span> 
                                 <i class="fas fa-money-bill-wave mr-2"></i><span id="header-price">$4,000</span> 
                                </a>
                            </div>
                        </div>
        <?php
    $sql_category =mysqli_query($mysqli,'SELECT * FROM loaisanpham ORDER BY maloai DESC'); 
        ?>
                        <!-- Nav -->
                        <div class="row">
                            <nav class="navbar navbar-expand-lg navbar-light bg-white col-12">
                                <button class="navbar-toggler d-lg-none border-0" type="button" data-toggle="collapse" data-target="#mainNav">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="mainNav">
                                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="index.php">Trang Chủ <span class="sr-only">(current)</span></a>
                                        </li>
                                        <?php
    $sql_category_danhmuc =mysqli_query($mysqli,'SELECT * FROM loaisanpham ORDER BY maloai DESC'); 
    while($row_category_danhmuc = mysqli_fetch_array($sql_category_danhmuc)){
        ?>
                                        <li class="nav-item active">
                                            <a class="nav-link" href="index.php?quanly=danhmuc&id=<?php echo $row_category_danhmuc['maloai']?>"><?php echo $row_category_danhmuc['tenloai']?> </a>
                                        </li>
                                        </li>
    <?php }

    ?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="fashion" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Loại</a>
                                            <div class="dropdown-menu" aria-labelledby="fashion" value="">
                                               <?php
                                               while($row_category= mysqli_fetch_array($sql_category))
                                               {?>
                                                <option class= "dropdown-item" href="category.php" ><?php echo $row_category['tenloai']?></option>
                                                <?php
                                               } 
                                               ?>
                                            </div>
                                        </li>
                                        <!--
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="books" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Books</a>
                                            <div class="dropdown-menu" aria-labelledby="books">
                                                <a class="dropdown-item" href="category.php">Adventure</a>
                                                <a class="dropdown-item" href="category.php">Horror</a>
                                                <a class="dropdown-item" href="category.php">Romantic</a>
                                                <a class="dropdown-item" href="category.php">Children's</a>
                                                <a class="dropdown-item" href="category.php">Non-Fiction</a>
                                            </div>
                                        </li>
                                    -->
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <!-- Nav -->

                    </div>
                    <!-- Header -->

                </header>
            </div>
