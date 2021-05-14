        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Quản lý sản phẩm</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
            

              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Table design <small>Custom design</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>
                    <p>
                      <a href = "action_update_manage_product.php" class="btn btn-success">Thêm mới</a>
                    </p>
                    <!-- <div class="table-responsive"> -->
                    <?php 
                      $query1="SELECT * FROM sanpham";
                      $products = mysqli_query($connect,$query1);
                    ?>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope = "col">#
                                  <a href="index.php?manage=products&sort=up&stt=MA_SP">^</a>
                                  <a href="index.php?manage=products&sort=down&stt=MA_SP">v</a>
                                </th>
                                <th scope = "col">Tên Sản Phẩm
                                  <a href="index.php?manage=products&sort=up&stt=TEN_SP">^</a>
                                  <a href="index.php?manage=products&sort=down&stt=TEN_SP">v</a>
                                </th>
                                <th scope = "col">Số Lượng
                                  <a href="index.php?manage=products&sort=up&stt=SO_LUONG">^</a>
                                  <a href="index.php?manage=products&sort=down&stt=SO_LUONG">v</a>
                                </th>
                                <th scope = "col">Đơn Giá
                                  <a href="index.php?manage=products&sort=up&stt=DON_GIA">^</a>
                                  <a href="index.php?manage=products&sort=down&stt=DON_GIA">v</a>
                                </th>
                                <th scope = "col">Loại
                                  <a href="index.php?manage=products&sort=up&stt=LOAI_SP">^</a>
                                  <a href="index.php?manage=products&sort=down&stt=LOAI_SP">v</a>
                                </th>
                                <th scope = "col">Kích Thước
                                  <a href="index.php?manage=products&sort=up&stt=KICH_THUOC">^</a>
                                  <a href="index.php?manage=products&sort=down&stt=KICH_THUOC">v</a>
                                </th>
                                <th scope = "col">Mô tả
                                  <a href="index.php?manage=products&sort=up&stt=MO_TA">^</a>
                                  <a href="index.php?manage=products&sort=down&stt=MO_TA">v</a>
                                </th>
                                <th scope = "col">Hình ảnh
                                  <a href="index.php?manage=products&sort=up&stt=HINH_ANH_URL">^</a>
                                  <a href="index.php?manage=products&sort=down&stt=HINH_ANH_URL">v</a>
                                </th>
                                <th scope = "col">Thao Tác</th>
                            </tr>
                        </thead>
                        <?php
                            if (isset($_GET['sort']) && isset($_GET['stt'])) {
                              $Up = $_GET['sort'];
                              $Stt = $_GET['stt'];
                              if ($Up == 'up') {
                                $query1 = "SELECT * FROM sanpham ORDER BY $Stt ASC";
                              } else if ($Up == 'down') {
                                $query1 = "SELECT * FROM sanpham ORDER BY $Stt DESC";
                              }
                              $products = mysqli_query($connect, $query1);
                            }
                        ?>
                        <tbody>
                          <?php foreach ($products as $product): ?>
                            <tr>
                              <td><?php echo $product['MA_SP']?></td>
                              <td><?php echo $product['TEN_SP']?></td>
                              <td><?php echo $product['SO_LUONG']?></td>
                              <td><?php echo $product['DON_GIA']?></td>
                              <td><?php echo $product['LOAI_SP']?></td>
                              <td><?php echo $product['KICH_THUOC']?></td>
                              <td style="width:30%"> <?php echo $product['MO_TA'] ?> </td>
                              <td style="width:10%"><?php echo $product['HINH_ANH_URL']?></td>
                              <td>
                                  <a href="./action_update_manage_product.php?id=<?php echo $product['MA_SP'] ?>" class="btn btn-primary">Edit</a>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>

                        </table>
                    <!-- </div> -->
							
						
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->