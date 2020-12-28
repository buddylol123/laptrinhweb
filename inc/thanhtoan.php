<?php 
    if(isset($_POST['submit_ok']))
    {
        $name =$_POST['name'];
        $diachi =$_POST['diachi'];
        $date =$_POST['date'];
        $note =$_POST['note'];
        $name =$_POST['name'];
        $hinhthuc =$_POST['hinhthuc'];
        $sql_donhang =mysqli_query($mysqli,"INSERT INTO donhang(tenkh,diachi,ghichu,ngaygiao,giaohang)values ('$name','$diachi','$note',$date,$hinhthuc) ");
        

    }



?>
 
                              
                       
                                    
                              

            <div class="col-12">
                <!-- Main Content -->
                <div class="row">
                    <div class="col-12 mt-3 text-center text-uppercase ">
                        <h4 >Vui lòng xác nhận thông tin mua hàng:</h4>
                    </div>
                </div>

                <main class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
                        <div class="row">
                            <div class="col-12">
                                <di>
                                    <form action="" method="Post">
                                    <div class="form-group">
                                        <label for="name">Nhập Họ Tên</label>
                                        <input name="name" type="text" id="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="diachi">Địa chỉ giao hàng</label>
                                        <input name="diachi" type="text" id="" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="start">Ngày giao hàng:</label>
                                        <input type="date" name="date" id="start" class="form-control" value="2020-12-17" min="2020-12-17" max="2020-1-1">
                                    </div>
                                    <div class="form-group "  style="height:100px">
                                        <label for="" >Ghi chú</label>
                                        <textarea type="text" id="" name="note" class="h-100 form-control " row="3" required>
                                            </textarea>
                                    </div>
                                    <div class="form-group mt-5" >
                                        <label>Chọn hình thức thanh toán</label>
                                        <select class="custom-select" required name="hinhthuc">
                                          
                                          <option value="1">Thanh toán khi nhận hàng</option>
                                          <option value="2">Thanh toán qua thẻ ATM</option>
                                          <option value="3">Thanh toán qua thẻ tín dụng</option>
                                        </select>
                                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                                      
                                    </div>
                                            
                                 <!--   <div class="form-group ">
                                        <input type='checkbox' data-toggle='collapse' data-target='#collapsediv1'> 
                                        <label for="agree" class="form-check-label ">Xuất hóa đơn đỏ .</label>

                                      
                                      <div id='collapsediv1' class='collapse div1'>
                                        <div>
                                            <label for="name">Nhập mã số thuế</label>
                                            <input type="text" id="name" class="form-control" required>
                                        </div>
                                        <div>
                                            <label for="name">Nhập tên công ty</label>
                                            <input type="text" id="name" class="form-control" required>
                                        </div>
                                              
                                      <div>
                                        <label for="name">Nhập địa chỉ công ty</label>
                                        <input type="text" id="name" class="form-control" required>
                                      </div>
                                      <div>
                                        <label for="name">Người đại diện công ty</label>
                                        <input type="text" id="name" class="form-control" required>
                                      </div>
                                     </div>
                                     </div>
                                    </div>  -->
                                                                            
                                           
                                    </div>
                            
                                        
                                    
                                
                                    
                                    <div class="form-group text-center col-12" >
                                        <input type="submit" class="btn btn-outline-danger" name="submit_ok" value="Thanh toan"></input>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                                          
                   