<?php 
	include('connect.php');
    if(isset($_POST['sm'])){
        $email = isset($_POST['email'])?$_POST['email']:'';
        $password = isset($_POST['password'])?$_POST['password']:'';
        if(strlen($email)< 10) {
            $_SESSION['error']=" email không hợp lệ. " ;
            header('location:login.php');
            exit;
        }
        if(strlen($password) < 6 ){
            $_SESSION['error'] = " Mật khẩu ít nhất 6 ký tự " ;
            header('location:login');
            exit;
        }
        else{
                $newUser = array(
                    $email,
                    $password
                );
                $sqlAdd = " SELECT `password`, `tenkh`, `email`, `diachi`, `sodienthoai` FROM `khachhang` WHERE `email`=? AND `password` =?";
                $queryAdd = $pdo->prepare($sqlAdd);
                $queryAdd->execute($newUser);
                $datauser = $queryAdd->fetchAll();
                if($queryAdd->rowCount()>0){
                    $_SESSION['user'] = $datauser;
                    header('location:index.php');
                    exit;
                }         
                else{
                    $_SESSION['error'] = " Đăng nhập không thành công " ;
                    header('location:login.php');
                    exit;
                }
            }
           
    }

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
                                <form action="#">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="search" class="form-control border-dark" placeholder="Tìm kiếm" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-auto text-center text-lg-left header-item-holder">
                                <a href="#" class="header-item">
                                    <i class="fas fa-heart mr-2"></i><span id="header-favorite">0</span>
                                </a>
                                <a href="cart.php" class="header-item">
                                    <i class="fas fa-shopping-bag mr-2"></i><span id="header-qty" class="mr-3">2</span>
                                    <i class="fas fa-money-bill-wave mr-2"></i><span id="header-price">$4,000</span>
                                </a>
                            </div>
                        </div>

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
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="electronics" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dụng cụ bếp</a>
                                            <div class="dropdown-menu" aria-labelledby="electronics">
                                                <a class="dropdown-item" href="category.php">Nồi cơm điện</a>
                                                <a class="dropdown-item" href="category.php">Bộ nồi, chảo</a>
                                                <a class="dropdown-item" href="category.php">Bình đun</a>
                                                <a class="dropdown-item" href="category.php">Bếp gas</a>
                                                <a class="dropdown-item" href="category.php">Bếp điện từ</a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="fashion" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hãng</a>
                                            <div class="dropdown-menu" aria-labelledby="fashion">
                                                <a class="dropdown-item" href="category.php">Sharp</a>
                                                <a class="dropdown-item" href="category.php">Panasonic</a>
                                                <a class="dropdown-item" href="category.php">Toshiba</a>
                                                <a class="dropdown-item" href="category.php">Kangaroo</a>
                                                <a class="dropdown-item" href="category.php">Hitachi</a>
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

            <div class="col-12">
                <!-- Main Content -->
                <div class="row">
                    <div class="col-12 mt-3 text-center text-uppercase">
                        <h2>Đăng nhập</h2>
                    </div>
                </div>

                <?php
                         if(isset($_SESSION['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                        
                            <?php echo($_SESSION['error']);
                                    unset($_SESSION['error']);  
                                ?>
                            </div>
                          <?php } ?>

                <main class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
                        <div class="row">
                            <div class="col-12">
                                <form action='login' method='post'>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" id="remember" class="form-check-input">
                                            <label for="remember" class="form-check-label ml-2">Quên mật khẩu</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="sm" class="btn btn-outline-dark">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </main>
                <!-- Main Content -->
            </div>

            <div class="col-12 align-self-end">
                <!-- Footer -->
                <footer class="row">
                    <div class="col-12 bg-dark text-white pb-3 pt-5">
                        <div class="row">
                            <div class="col-lg-2 col-sm-4 text-center text-sm-left mb-sm-0 mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="footer-logo">
                                            <a href="index.php">Sơn Lợi Shop</a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <address>
                                            429/37A, Hoàng Văn Thụ, P2, Q.Tân Bình<br>
                                            TP Hồ Chí Minh
                                        </address>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-8 text-center text-sm-left mb-sm-0 mb-3">
                                <div class="row">
                                    <div class="col-12 text-uppercase">
                                        <h4></h4>
                                    </div>
                                    <div class="col-12 text-justify">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-3 col-5 ml-lg-auto ml-sm-0 ml-auto mb-sm-0 mb-3">
                                <div class="row">
                                    <div class="col-12 text-uppercase">
                                        <h4>ĐƯỜNG DẪN NHANH</h4>
                                    </div>
                                    <div class="col-12">
                                        <ul class="footer-nav">
                                            <li>
                                                <a href="#">Trang chủ</a>
                                            </li>
                                            <li>
                                                <a href="#">Liên hệ chúng tôi</a>
                                            </li>
                                            <li>
                                                <a href="#">Về chúng tôi</a>
                                            </li>
                                            <li>
                                                <a href="#">Chính sách bảo mật</a>
                                            </li>
                                            <li>
                                                <a href="#">Điều khoản và điều kiện</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-2 col-4 mr-auto mb-sm-0 mb-3">
                                <div class="row">
                                    <div class="col-12 text-uppercase text-underline">
                                        <h4>Hỗ trợ</h4>
                                    </div>
                                    <div class="col-12">
                                        <ul class="footer-nav">
                                            <li>
                                                <a href="#">Câu hỏi thường gặp</a>
                                            </li>
                                            <li>
                                                <a href="#">Đang chuyển hàng</a>
                                            </li>
                                            <li>
                                                <a href="#">Lợi nhuận</a>
                                            </li>
                                            <li>
                                                <a href="#">Theo dõi thứ tự</a>
                                            </li>
                                            <li>
                                                <a href="#">Báo cáo</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 text-center text-sm-left">
                                <div class="row">
                                    <div class="col-12 text-uppercase">
                                        <h4>BẢN TIN</h4>
                                    </div>
                                    <div class="col-12">
                                        <form action="#">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter your email..." required>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-outline-light text-uppercase">Đăng ký</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- Footer -->
            </div>

    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>