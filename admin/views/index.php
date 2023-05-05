<?php
include_once "../../includes/admin/header.php";
$ctr = new StockController();
$ctr->delete();
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
              <th>S/N</th>
              <th>Product name</th>
              <th>Picture</th>
              <th>Quantity</th>
              <th>Wholesale Price</th>
              <th>Retail Price</th>

              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $select = $ctr->index();
            while ($result = mysqli_fetch_array($select)) { ?>
              <tr>
                <td><?php echo ++$sn ?></td>
                <td onblur="editName('<?php echo $result['product_id'] ?>',this.textContent)" onclick="getFileName(this.textContent)" contenteditable><?php echo $result["productname"] ?></td>
                <td><img src="<?php echo $result["filepath"] ?>" height=50 width="50" alt="item"></td>
                <td onblur="editQuantity('<?php echo $result['product_id'] ?>',this.textContent)" onclick="selectText()" contenteditable><?php echo $result["quantity"] ?></td>
                <td onblur="editWprice('<?php echo $result['product_id'] ?>',this.textContent)" onclick="selectText()" contenteditable><?php echo $result["wprice"] ?></td>
                <td onblur="editRprice('<?php echo $result['product_id'] ?>',this.textContent)" onclick="selectText()" contenteditable><?php echo $result["rprice"] ?></td>

                <td><a href="show_stock.php?product_id=<?php echo $result["product_id"] ?>"><i class="fa fa-eye"></i></a></td>
              </tr>
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