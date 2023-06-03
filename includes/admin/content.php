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
                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
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
                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                <li class='breadcrumb-item active'><a href='add_stock.php'>Add Product</a></li>
              </ol>
            </div><!-- /.col -->
            "; 
          }  
          elseif($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/manage_user.php'){
            echo "<h1 class='m-0'>Users</h1>
            </div><!-- /.col -->
            <div class='col-sm-6'>
              <ol class='breadcrumb float-sm-right'>
                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                <li class='breadcrumb-item active'><a href='manage_user.php'>Manage User</a></li>
              </ol>
            </div><!-- /.col -->
            "; 
          }  
          elseif($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/edit_user.php'){
            echo "<h1 class='m-0'>Users</h1>
            </div><!-- /.col -->
            <div class='col-sm-6'>
              <ol class='breadcrumb float-sm-right'>
                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                <li class='breadcrumb-item active'><a href='manage_user.php'>Manage User</a></li>
              </ol>
            </div><!-- /.col -->
            "; 
          }  
          elseif($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/sales_history.php'){
            echo "<h1 class='m-0'>Today Sales History ("; echo date('d-m-Y');echo ")</h1> 
            </div><!-- /.col -->
            <div class='col-sm-6'>
              <ol class='breadcrumb float-sm-right'>
                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                <li class='breadcrumb-item active'><a href='sales_history.php'>Today Sales</a></li>
              </ol>
            </div><!-- /.col -->
            "; 
          }  
          elseif($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/sales_record.php'){
            echo "<h1 class='m-0'>Sales Record ("; echo date('d-m-Y');echo ")</h1> 
            </div><!-- /.col -->
            <div class='col-sm-6'>
              <ol class='breadcrumb float-sm-right'>
                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                <li class='breadcrumb-item active'><a href='sales_record.php'>Sales Record</a></li>
              </ol>
            </div><!-- /.col -->
            "; 
          }  
          elseif($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/debit.php'){
            echo "<h1 class='m-0'>Debit List</h1> 
            </div><!-- /.col -->
            <div class='col-sm-6'>
              <ol class='breadcrumb float-sm-right'>
                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                <li class='breadcrumb-item active'><a href='debit.php'>Debit List</a></li>
              </ol>
            </div><!-- /.col -->
            "; 
          }
          elseif($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/debit_history.php'){
            echo "<h1 class='m-0'>Debit Histories</h1> 
            </div><!-- /.col -->
            <div class='col-sm-6'>
              <ol class='breadcrumb float-sm-right'>
                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                <li class='breadcrumb-item active'><a href='debit_history.php'>Debit Histories</a></li>
              </ol>
            </div><!-- /.col -->
            "; 
          }
          elseif($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/admin/views/debit_book.php'){
            echo "<h1 class='m-0'>Record Debit Book</h1> 
            </div><!-- /.col -->
            <div class='col-sm-6'>
              <ol class='breadcrumb float-sm-right'>
                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                <li class='breadcrumb-item active'><a href='debit_book.php'>Debit Book</a></li>
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