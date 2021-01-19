<?php
session_start();
include 'connect/connect.php'
?>
<?php 
    include 'inc/header.php';
    include 'inc/slider.php';
    if(isset($_GET['quanly'])){
$tam = $_GET['quanly'];
    
    
}else 
{
    $tam ='';
}
if($tam == 'danhmuc')
{
    include 'inc/danhmuc.php' ;

}elseif ($tam == 'chitietsp')
{
    include 'inc/chitietsp.php';
}
elseif ($tam == 'search')
{
    include 'inc/timkiem.php';
}
elseif  ($tam == 'giohang')
{   
    include 'cart.php';
    include 'inc/giohang.php';
    

    
}
elseif($tam =='gia500-1000')
{
    include 'inc/gia500-1000.php';
}
elseif($tam == 'gia100-500')
{
    include 'inc/gia100-500.php';
}
elseif($tam == 'xoa')
{
    include 'xoa.php';
    include 'inc/giohang.php';
}
elseif($tam == 'thanhtoan')
{
    include 'inc/thanhtoan.php';
}

else

{   include 'inc/spbnchay.php';
    include 'inc/sanphammuanhieunhat.php';
    include 'inc/spthang11.php' ;
    
}

?>
    
                                    
                    

<?php
include 'inc/footer.php'
?>
    

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>