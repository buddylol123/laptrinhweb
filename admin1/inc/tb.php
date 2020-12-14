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
                            <a href="#" class="btn btn-danger">Cập nhật</a>

                            </td>
                            
                          
                          </tr>
                          <tr>
                            <?php 
                          }
                            ?>
                            
                        </tbody>
                      </table>
                      
                             