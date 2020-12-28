 <?php

if(isset($_POST['search_submit']))
{$key =addslashes($_POST['search_button']);


$sql_category = mysqli_query($mysqli,"SELECT * FROM sanpham  WHERE CONCAT(tensp,gia) LIKE '%$key%' ORDER BY masp DESC");


 $tittle = $key;

}
?>
            
        <div class="col-12">
            <!-- Main Content -->
            <main class="row">


                <!-- Category Products -->
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 py-3">
                            <div class="row">
                                <div class="col-12 text-center text-uppercase">
                                    <h2>Từ khóa tìm kiếm:<?php echo $tittle  ?></h2>
                                </div>
                            </div>
                            
                            <div class="row">
                                    
                           <?php     
                                    
                            while($row_sp =mysqli_fetch_array($sql_category))
                            {
                              ?>      
                                
                                    <!-- Product -->
                                    <div class="col-lg-3 col-sm-6 my-3">
                                
                                        <div class="col-12 bg-white text-center h-100 product-item">
                                            <div class="row h-100">
                                                <div class="col-12 p-0 mb-3">
                                                    <a href="?quanly=chitietsp&id=<?php echo $row_sp['masp']?>">
                                                        <img src="images/<?php echo $row_sp['hinh'] ?>" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <a href="?quanly=chitietsp&id=<?php echo $row_sp['masp']?>" class="product-name"><?php  echo $row_sp['tensp']?></a>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <span class="product-price-old">
                                                        <?php echo number_format($row_sp['gia']). 'VND';?>
                                                    </span>
                                                    <br>
                                                    <span class="product-price">
                                                    <?php echo number_format($row_sp['gia']). 'VND';?>
                                                    </span>
                                                </div>
                                                <div class="col-12 mb-3 align-self-end">
                                                    <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus mr-2"></i>Thêm vào giỏ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php } 
                            ?>
                                <!-- Product -->
                            
                                

                            </div>
                        
                        </div>
                    </div>
                </div>

    
                <!-- Category Products -->

                <div class="col-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-long-arrow-alt-left"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </main>
            <!-- Main Content -->
        </div>


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>