<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-dashboard"></i> <span>3COLTHING</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Xin Chào,</span>
                <h2><?php if (isset( $_SESSION['admin_name']) ) {
							if( $_SESSION['admin_name'])  echo $_SESSION['admin_name']; }?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Tổng Quan</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Trang Chủ <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?manage=orders">Quản Lý Đơn Hàng</a></li>
                      <li><a href="index.php?manage=import">Quản Lý Nhập Hàng</a></li>
                      <li><a href="index.php?manage=products">Quản Lý Sản Phẩm</a></li>
                      <li><a href="index.php?manage=accounts">Quản Lý Tài Khoản</a></li>
                      <li><a href="index.php?manage=user">Quản Lý Khách Hàng</a></li>
                      <li><a href="index.php?manage=sale">Quản Lý Giảm Giá</a></li>
                      <li><a href="index.php?manage=permission">Quản Lý Phân Quyền</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Thống Kê <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>