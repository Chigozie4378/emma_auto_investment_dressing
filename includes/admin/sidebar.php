  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-white-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">MR Sunny</a>
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
            <a href="manage_user.php" class="nav-link <?php if (($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/manage_user.php')) {
                                                  echo "active";
                                                } ?>">
              <i class="nav-icon fa-solid fa-people-roof"></i>
              <p>
                Manage User
              </p>
            </a>
          </li>
          <!-- <li class="nav-item menu-open">
            <a href="#" class="nav-link <?php if (($_SERVER['PHP_SELF'] == '/emma_auto_investment/director/wholesale.php') or ($_SERVER['PHP_SELF'] == '/emma_auto_investment/director/retail.php') or ($_SERVER['PHP_SELF'] == '/emma_auto_investment/director/cartoon.php')) {
                                          echo "active";
                                        } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>

            </ul>
          </li> -->

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