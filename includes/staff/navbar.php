<nav class="navbar navbar-expand-sm bg-primary navbar-dark sticky-top">
  <div class="container-fluid d-flex justify-content-between">
    <div class="flex-grow-1">
      <a class="navbar-brand" href="#">Logo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse flex-grow-0" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item <?php if (($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/staff/views/home.php') or ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/home.php')) {
                              echo "active";
                            } ?>">
          <a class="nav-link" href="home.php"><i class="fa fa-home nav-icon"></i> Home</a>
        </li>
        <li class="nav-item <?php if (($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/staff/views/retail.php') or ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/retail.php')) {
                              echo "active";
                            } ?>">
          <a class="nav-link " href="retail.php"><i class="fa fa-building"></i> Retail</a>
        </li>
        <li class="nav-item <?php if (($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/staff/views/wholesale.php') or ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/wholesale.php')) {
                              echo "active";
                            } ?>">
          <a class="nav-link" href="wholesale.php"><i class="fas fa-warehouse"></i> Wholesales</a>
        </li>
        <li class="nav-item <?php if (($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/staff/views/sales_history.php') or ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/sales_history.php')) {
                              echo "active";
                            } ?>">
          <a class="nav-link" href="sales_history.php"><i class="fas fa-file"></i> Sales History</a>
        </li>
        <!-- <li class="nav-item <?php if (($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/staff/views/home.php') or ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/home.php')) {
                              echo "active";
                            } ?>">
          <a class="nav-link text-white" href="#">Store</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">Store</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Link</a></li>
            <li><a class="dropdown-item" href="#">Another link</a></li>
            <li><a class="dropdown-item" href="#">A third link</a></li>
          </ul>
        </li> -->
      </ul>
    </div>

    <div class="flex-grow-1">
      <marquee class="text-white" behavior="" direction="">Good Morning Mr Admin</marquee>
    </div>

    <div class="flex-grow ">
      <a class="nav-link text-white w-auto" href="logout.php"><i class="fa fa-sign-out nav-icon"></i> Logout</a>
    </div>

  </div>
</nav>