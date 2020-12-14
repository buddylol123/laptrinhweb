

<?php 
    include('connect.php');
    session_start();

    if(isset($_POST['sm']))
    {
        $password = isset($_POST['password'])?$_POST['password']:'';
        $tenkh = isset($_POST['tenkh'])?$_POST['tenkh']:'';
        $email = isset($_POST['email'])?$_POST['email']:'';
        $diachi = isset($_POST['diachi'])?$_POST['diachi']:'';
        $sodienthoai = isset($_POST['sodienthoai'])?$_POST['sodienthoai']:'';
        $nhaplai = isset($_POST['nhaplai'])?$_POST['nhaplai']:'';
       
        if($password != $nhaplai){
            $_SESSION['error'] = $password."cc".$nhaplai. "Mật khẩu nhập lại không đúng.";
            header('location:register.php');
            exit;
        }
        else{
            $sql = "SELECT *,COUNT(*) AS rowdata FROM `khachhang` WHERE `sodienthoai`=? OR `email` =? limit 1";
            $querychecksdt= $pdo->prepare($sql);
            $querychecksdt->execute([$sodienthoai,$email]);
            $datacheck = $querychecksdt->fetch();
            if($datacheck[0]['rowdata']>0){
                $_SESSION['error'] = " tài khoản hoặc số điện thoại đã có. " ;
                header('location:register.php');
                exit();
            }
            else{
                $newUser = array
                (
                    
                    $password,
                    $tenkh,
                    $email,
                    $diachi,
                    $sodienthoai 
                );
                $sqlAdd = "INSERT INTO `khachhang`(`password`,`tenkh`,`email`,`diachi`,`sodienthoai`) VALUES (?,?,?,?,?)";
                $queryAdd = $pdo->prepare($sqlAdd);
                $queryAdd->execute($newUser);
                if($queryAdd->rowCount()>0){
                    $_SESSION['error'] = " Đăng ký thành công " ;
                    header('location:login.php');
                    exit;
                }         
                else{
                    $_SESSION['error'] = " Đăng ký không thành công " ;
                    header('location:register.php');
                    exit;
                }
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
                   <!-- <?php include_once('include/header.php'); ?> -->
                    <!-- Header -->

                </header>
            </div>

            <div class="col-12">
                <!-- Main Content -->
                <div class="row">
                    <div class="col-12 mt-3 text-center text-uppercase">
                        <h2>Đăng Ký</h2>
                    </div>
                </div>
                
                <?php
                         if(isset($_SESSION['error'])) 
                         	{
                         	 ?>
                            <div class="alert alert-danger" role="alert">
                        
                            <?php echo($_SESSION['error']);
                                    unset($_SESSION['error']);  
                                ?>
                            </div>
                          <?php 
                      } 
                          ?>

                <main class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
                        <div class="row">
                            <div class="col-12">
                                <form action="register" method="post">


                                    <div class="form-group">
                                        <label for="name">Họ Tên</label>
                                        <input type="text" name="tenkh" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="diachi">diachi</label>
                                        <input type="text" name="diachi" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="sodienthoai">SDT</label>
                                        <input type="text" name="sodienthoai" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="password-confirm">Confirm Password</label>
                                        <input type="password" name="nhaplai" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" id="agree" class="form-check-input" required>
                                            <label for="agree" class="form-check-label ml-2">Tôi đồng ý với các điều khoảng.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    
                                        <button type="submit" name="sm" class="btn btn-outline-dark">Đăng ký</button>

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
                <?php include_once('include/footer.php') ?>
                <!-- Footer -->
            </div>

        </div>
    </div>

    
</body>
</html>