<?php

if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
else 
{
    $id='';
}
$sql_detail = mysqli_query($mysqli,"SELECT * FROM sanpham  WHERE masp = '$id'");
?>
            <div class="col-12">
                <!-- Main Content -->
                <main class="row">
                <?php

                 while ($row_detail = mysqli_fetch_array($sql_detail))
                                {
                                ?>
            
                    <div class="col-12 bg-white py-3 my-3">
                        <div class="row">
                            
                            <!-- Product Images -->
                            <div class="col-lg-5 col-md-12 mb-3">
                                <div class="col-12 mb-3">
                                    <div class="img-large border" style="background-image: url('images/<?php echo $row_detail['hinh'];?>')"></div>
                                </div>
         
                            </div>
                            <!-- Product Images -->
                                     
                                    
                            <!-- Product Info -->
                       
                            <div class="col-lg-5 col-md-9">
                                <div class="col-12 product-name large">
                                    <?php echo $row_detail['tensp'];?>
                                    <?php ?>

                                    
                                </div>
    
                                <div class="col-12 px-0">
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <ul>
                                        <p><?php echo $row_detail['mota']; ?></p>
                                    </ul>
                                </div>
                            </div>
                            <!-- Product Info -->

                            <!-- Sidebar -->
                            
                            <div class="col-lg-2 col-md-3 text-center">
                                <div class="col-12 border-left border-top sidebar h-100">
                                    <div class="row">
                                        <div class="col-12">
                                        <span class="detail-price">
                                        <?php echo $row_detail['gia'] ?>
                                        </span>
                            
                                        </div>
                                                  <div class="col-12 mt-3">
                                                  <a class="btn btn-primary" href="?quanly=giohang&id=<?php echo $row_detail['masp']; ?>" role="button">Mua</a>

                                                  </div>
                                                                                

                                       
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar -->

                        </div>
                <?php } ?>
                    </div>
            
                

                    
                             </div>
                            </div>
                        </div>
                    </div>
                    <!-- Similar Products -->
                
                </main>
                <!-- Main Content -->
            </div>

