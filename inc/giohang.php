<?php 


$tam =isset($_SESSION['cart'])?$_SESSION['cart']:[];


?>
<div class="col-12">

                <!-- Main Content -->
                <div class="row">
                    <div class="col-12 mt-3 text-center text-uppercase">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
                
                <main class="row">
                    <div class="col-12 bg-white py-3 mb-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-sm-10 mx-auto table-responsive">
                                <form class="row">
                                    <div class="col-12">
                                        <table class="table table-striped table-hover table-sm">
                                            <thead>
                                                

                                            
                                            <tr>
                                                
                                                <th>Sản phẩm</th>
                                                <th>Giá bán</th>
                                                <th>Số lượng</th>
                                                <th>Số tiền</th>
                                                <th>Xóa</th>
                                            </tr>
                                            </thead>
                                            
                      
                                            <tbody>
                                      <?php       foreach ($tam as $key => $value) 
{
	$sql= "SELECT * from sanpham where masp='{$key}'";
	
    $data  = mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_array($data);
    


	?> 
                                            <tr>
                                            
                                                
                                                
                                                <td>
                                            <a href="?quanly=chitietsp&id=<?php echo $row['masp']?>">
                                                    <img src="images/<?php echo $row['hinh'];?>" class="img-fluid">
                                                    <?php echo $row['tensp']; ?>
</a>
                                                </td>
                                                <td>
                                                
                                                    <?php echo $row['gia']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value ;?>
                                                </td>
                                                <td>
                                                    <?php echo $row['gia'] ;?>
                                                </td>
                                                <td>
                                                     <a href="?quanly=xoa&id=<?php echo $key;?>" class="btn btn-link text-danger"><i class="fas fa-times"></i></a>
                                                    
                                                </td>
                                            </tr>
<?php } ?>
                                            </tfoot>
                                                
                                        </table>

                                    </div>
                                    <div class="col-12 text-right">
                                        
                                        <a href="?quanly=thanhtoan" class="btn btn-outline-success">Thanh toán</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </main>
                
                <!-- Main Content -->
            </div>
            