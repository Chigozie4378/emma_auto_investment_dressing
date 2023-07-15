<?php
include_once "../../includes/admin/header.php";
$ctr = new SalesHistoryController();
?>
<style>
  .name {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>150</h3>

        <p>Total Customers</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>53<sup style="font-size: 20px">%</sup></h3>

        <p>Total sales</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>44</h3>

        <p>Total Cash</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>53<sup style="font-size: 20px">%</sup></h3>

        <p>Total Transfer</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>53<sup style="font-size: 20px">%</sup></h3>

        <p>Total POS</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>65</h3>

        <p>Total Debit</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->

<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <section class="col-lg-12 connectedSortable">
    <!-- Custom tabs (Charts with tabs)-->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-chart-pie mr-1"></i>
          Sales
        </h3>
        <div class="card-tools">
          <ul class="nav nav-pills ml-auto">
            <li class="nav-item">
              <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
            </li>
          </ul>
        </div>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content p-0">
          <div class="row">
            <div class="col-md-2">
              <div class="card" style="width:100%;">
                <img class="card-img-top" src="../../assets/images/1679649093109.jpg" alt="Card image" height="150">
                <div class="card-body" style=" height:150px;">
                  <span class="name">16 Bulb ligh </span>

                  <span class="price">Price: <b>#2000</b></span><br>
                  <span class="price">Qty: <b>200</b></span><br>
                  <a href="#" class="nav-link">More-></a>

                </div>
              </div>

            </div>
            <div class="col-md-2">
              <div class="card" style="width:100%;">
                <img class="card-img-top" src="../../assets/images/apple-iphone-14-pro-max-128gb--nbspdeep-purple.jpg" alt="Card image" height="150">
                <div class="card-body" style=" height:150px;">
                  <span class="name">16 Bulb light 1Bulb light 1 Bulb light 1 Bulb light 1 </span>

                  <span class="price">Price: <b>#2000</b></span><br>
                  <span class="price">Qty: <b>200</b></span><br>
                  <a href="#" class="nav-link">More-></a>

                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card" style="width:100%;">
                <img class="card-img-top" src="../../assets/images/photo-1601784551446-20c9e07cdbdb.jpeg" alt="Card image" height="150">
                <div class="card-body" style=" height:150px;">
                  <span class="name">16 Bulb light 1Bulb light 1 Bulb light 1 Bulb light 1 </span>

                  <span class="price">Price: <b>#2000</b></span><br>
                  <span class="price">Qty: <b>200</b></span><br>
                  <a href="#" class="nav-link">More-></a>

                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card" style="width:100%;">
                <img class="card-img-top" src="../../assets/images/s-l1600.jpg" alt="Card image" height="150">
                <div class="card-body" style=" height:150px;">
                  <span class="name">16 Bulb light 1Bulb light 1 Bulb light 1 Bulb light 1 </span>

                  <span class="price">Price: <b>#2000</b></span><br>
                  <span class="price">Qty: <b>200</b></span><br>
                  <a href="#" class="nav-link">More-></a>

                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card" style="width:100%;">
                <img class="card-img-top" src="../../assets/images/1679649540868.jpg" alt="Card image" height="150">
                <div class="card-body" style=" height:150px;">
                  <span class="name">16 Bulb light 1Bulb light 1 Bulb light 1 Bulb light 1 </span>

                  <span class="price">Price: <b>#2000</b></span><br>
                  <span class="price">Qty: <b>200</b></span><br>
                  <a href="#" class="nav-link">More-></a>

                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card" style="width:100%;">
                <img class="card-img-top" src="../../assets/images/1679649540854.jpg" alt="Card image" height="150">
                <div class="card-body" style=" height:150px;">
                  <span class="name">16 Bulb light 1Bulb light 1 Bulb light 1 Bulb light 1 </span>

                  <span class="price">Price: <b>#2000</b></span><br>
                  <span class="price">Qty: <b>200</b></span><br>
                  <a href="#" class="nav-link">More-></a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- DIRECT CHAT -->
    <div class="card card-primary">

      <div class="card-header">
        <h3 class="card-title">Last 50 Sales History</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table  table-hover">
          <thead>
            <tr>
              <th>S/N </th>
              <th>Customer Name</th>
              <th>Address</th>
              <th>Payment Type</th>
              <th>Customer Type</th>
              <th>Total</th>
              <th>Paid</th>
              <th>Balance</th>
              <th>Staff</th>
              <th style="width: 10%;">Date</th>
              <th style="text-align:center">View</th>
            </tr>
          </thead>
          <tbody id="table">
            <?php
            $id = 0;
            $select_sales = $ctr->showDesc();
            while ($row = mysqli_fetch_array($select_sales)) { ?>
              <capital>
                <tr>
                  <td style="text-transform:uppercase">
                    <?php echo ++$id ?>
                  </td>
                  <td style="text-transform:uppercase">
                    <?php echo $row['customer_name'] ?>
                  </td>
                  <td style="text-transform:uppercase">
                    <?php echo $row['customer_address'] ?>
                  </td>
                  <td style="text-transform:uppercase">
                    <?php echo $row['payment_type'] ?>
                  </td>
                  <td style="text-transform:uppercase">
                    <?php echo $row['customer_type'] ?>
                  </td>
                  <td style="text-transform:uppercase">
                    <?php echo $row['total'] ?>
                  </td>
                  <td style="text-transform:uppercase">
                    <?php echo $row['deposit'] ?>
                  </td>
                  <td style="text-transform:uppercase">
                    <?php echo $row['balance'] ?>
                  </td>
                  <td style="text-transform:uppercase">
                    <?php echo $row['staff'] ?>
                  </td>
                  <td style="text-transform:uppercase">
                    <?php echo $row['date'] ?>
                  </td>
                  <td class="text-center"><a href="sales_history_details.php?invoice_no=<?php echo $row['invoice_no'] ?>&customer_name=<?php echo $row['customer_name'] ?>&customer_address=<?php echo $row['customer_address'] ?>"><i class="fa fa-eye"></i></a>
                  </td>
                </tr>
              </capital>
            <?php }
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->

    </div>
    <!--/.direct-chat -->
  </section>
</div>

<?php
include_once "../../includes/admin/footer.php";
?>