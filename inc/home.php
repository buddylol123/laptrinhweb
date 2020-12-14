

                        <div class="row">
                            <div class="col-12 py-3">
                              <div class="row">
                                    <?php  $sql_cate = mysqli_query($mysqli,'SELECT * FROM loaisanpham ORDER BY maloai DESC');
                                    while($row_cate =mysqli_fetch_array($sql_cate)) {
                                        $id_cat =$row_cate['maloai'];
                                    
                                        ?>
                                        
                                    <div class="col-12 text-center text-uppercase">
                                        <h2><?php echo $row_cate['tenloai']?></h2>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                  <?php
                                  $sql_product = mysqli_query($mysqli,"SELECT * FROM sanpham ORDER BY masp DESC");
                                  while ($row_sp = mysqli_fetch_array($sql_product))
                                   {
                                        if($row_sp['maloai']==$id_cat){
                                   

                                    
                                  
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
                                                    <a href="?quanly=giohang&id=<?php echo $row_sp['masp']?>" class="btn btn-warning" type="button"><i class="fas fa-cart-plus mr-2"></i>Thêm vào giỏ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   <?php }
                                } ?>
                                    <!-- Product -->
                                    </div>
                                    <!-- Product -->
<!-- Product -->
                                    
                                </div>
                                   
                            </div>
                                    <?php }?>
                        </div>
                                    
                    </div>
                    <!-- Featured Products -->