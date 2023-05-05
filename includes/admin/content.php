  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <?php 
          if ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/index.php')
          { 
            echo "<h1 class='m-0'>Dashboard</h1>
            </div><!-- /.col -->
            <div class='col-sm-6'>
              <ol class='breadcrumb float-sm-right'>
                <li class='breadcrumb-item'><a href='#'>Home</a></li>
                <li class='breadcrumb-item active'>Dashboard</li>
              </ol>
            </div><!-- /.col -->
            ";
          }elseif($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/stock.php'){
            echo "<h1 class='m-0'>Product</h1>
            </div><!-- /.col -->
            <div class='col-sm-6'>
              <ol class='breadcrumb float-sm-right'>
                <li class='breadcrumb-item'><a href='#'>Home</a></li>
                <li class='breadcrumb-item active'><a href='add_stock.php'>Add Product</a></li>
              </ol>
            </div><!-- /.col -->
            "; 
          }
          elseif($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/add_stock.php'){
            echo "<h1 class='m-0'>Add Product</h1>
            </div><!-- /.col -->
            <div class='col-sm-6'>
              <ol class='breadcrumb float-sm-right'>
                <li class='breadcrumb-item'><a href='#'>Home</a></li>
                <li class='breadcrumb-item active'><a href='add_stock.php'>Add Product</a></li>
              </ol>
            </div><!-- /.col -->
            "; 
          }
          elseif($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/show_stock.php'){
            echo "<h1 class='m-0'>View Product</h1>
            </div><!-- /.col -->
            <div class='col-sm-6'>
              <ol class='breadcrumb float-sm-right'>
                <li class='breadcrumb-item'><a href='#'>Home</a></li>
                <li class='breadcrumb-item active'><a href='show_stock.php'>View Product</a></li>
              </ol>
            </div><!-- /.col -->
            "; 
          }   
          ?>
            
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">