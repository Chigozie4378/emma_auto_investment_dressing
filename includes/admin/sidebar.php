  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-white-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../assets/images/light.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["admin_firstname"]?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if (($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/index.php')) {
                                                  echo "active";
                                                } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="sales_history.php" class="nav-link <?php if ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/sales_history.php') {
                                                          echo "active";
                                                        } ?>">
              <i class="nav-icon fa fa-history"></i>
              <p>
                Today Sales History
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="stock.php" class="nav-link <?php if (($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/stock.php')) {
                                                  echo "active";
                                                } ?>">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>
                Product
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="sales_record.php" class="nav-link <?php if (($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/sales_record.php')) {
                                                          echo "active";
                                                        } ?>">
              <i class="nav-icon fa-solid fa-people-roof"></i>
              <p>
                Sales Record
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link <?php if (($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/debit.php') or ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/debit_history.php') or ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/debit_book.php')) {
                                          echo "active";
                                        } ?>">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>
                Manage Debit
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./debit.php" class="nav-link <?php if ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/debit.php') {
                                                        echo "active";
                                                      } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Debit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./debit_history.php" class="nav-link  <?php if ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/debit_history.php') {
                                                                  echo "active";
                                                                } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Debit History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./debit_book.php" class="nav-link <?php if ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/debit_book.php') {
                                                              echo "active";
                                                            } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Debit Book</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link <?php if (($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/return_all_goods.php') or ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/return_each_goods.php')) {
                                          echo "active";
                                        } ?>">
              <i class="nav-icon fa fa-undo"></i>
              <p>
                Manage Return Goods
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./return_all_goods.php" class="nav-link <?php if ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/return_all_goods.php') {
                                                        echo "active";
                                                      } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Return All Goods</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./return_each_goods.php" class="nav-link  <?php if ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/return_each_goods.php') {
                                                                  echo "active";
                                                                } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Return Individual Goods</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="manage_user.php" class="nav-link <?php if (($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/manage_user.php')) {
                                                        echo "active";
                                                      } ?>">
              <i class="nav-icon fa-solid fa-people-roof"></i>
              <p>
                Manage User
              </p>
            </a>
          </li>

          <!-- <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li> -->

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>