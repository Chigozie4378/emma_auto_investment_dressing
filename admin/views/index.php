<?php
include_once "../../includes/admin/header.php";
$ctr = new SalesHistoryController();
$ctr_dashboard = new DashboardController();
?>
<style>
  .name {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
  }


  .carousel-control-prev-icon,
  .carousel-control-next-icon {
    position: absolute;
    top: 50%;
    width: 30px;
    height: 30px;
    transform: translateY(-50%);
    background-color: rgba(188, 145, 145, 0.5);
  }

  .carousel-control-prev-icon {
    left: 10px;
  }

  .carousel-control-next-icon {
    right: 10px;
  }
</style>
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3><?php $customer_count = $ctr_dashboard->countCustomer();
            if (!$customer_count['value'] == 0) {
              echo $customer_count['value'];
            } ?>
        </h3>

        <p>Total Customers</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="sales_history.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?php $sumSales = $ctr_dashboard->sumSales();
            echo $sumSales['value'] ?></h3>

        <p>Total sales</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="sales_history.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3><?php $sumCash = $ctr_dashboard->sumCash();
            echo $sumCash['value'] ?></h3>

        <p>Total Cash</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="sales_history.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?php $sumTransfer = $ctr_dashboard->sumTransfer();
            echo $sumTransfer['value'] ?></h3>

        <p>Total Transfer</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="sales_history.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?php $sumPos = $ctr_dashboard->sumPos();
            echo $sumPos['value'] ?></h3>

        <p>Total POS</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="sales_history.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-2 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3><?php $sumDebit = $ctr_dashboard->sumDebit();
            echo $sumDebit['value'] ?></h3>

        <p>Total Debit</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="debit.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
<?php
$cards = $ctr_dashboard->carouselDispplay();

?>


<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <section class="col-lg-12 connectedSortable">
    <!-- Custom tabs (Charts with tabs)-->
    <div class="card">


      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-chart-pie mr-1"></i>
          Products
        </h3>

      </div><!-- /.card-header -->

      <div class="card-body">
        <div class="tab-content p-0">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
            
            <ol class="carousel-indicators">
              <?php
              if (!is_array($cards)) {
                $cards = [];
              }

              for ($i = 0; $i < count($cards); $i += 6) :
              ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i / 6 ?>" class="<?= $i === 0 ? 'active' : '' ?>"></li>
              <?php endfor; ?>
            </ol>

            <div class="carousel-inner">
              <?php for ($i = 0; $i < count($cards); $i += 6) : ?>
                <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                  <div class="row">
                    <?php for ($j = $i; $j < $i + 6 && $j < count($cards); $j++) : ?>
                      <div class="col-md-2">
                        <div class="card" style="width:100%;" onclick="showImageModal(event, '<?= $cards[$j]['filepath'] ?>')">
                          <img class="card-img-top" src="<?= $cards[$j]['filepath'] ?>" alt="Card image" height="150">
                          <div class="card-body" style=" height:150px;">
                            <span class="name"><?= $cards[$j]['productname'] ?> </span>
                            <span class="price">Retail Price: <b><?= $cards[$j]['rprice'] ?></b></span><br>
                            <span class="price">WS Price: <b><?= $cards[$j]['wprice'] ?></b></span><br>
                            <span class="price">Qty: <b><?= $cards[$j]['quantity'] ?></b></span><br>
                          </div>
                        </div>
                      </div>
                    <?php endfor; ?>
                  </div>
                </div>
              <?php endfor; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" id="carouselPrev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" id="carouselNext">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>

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
            $select_sales = $ctr_dashboard->last50SalesHistory();
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
    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img id="modalImage" src="" alt="Card image" style="width: 100%;">
          </div>
        </div>
      </div>
    </div>

  </section>
</div>

<?php
include_once "../../includes/admin/footer.php";
?>
<script>
  function showImageModal(event, imagePath) {
    // Set the source of the image in the modal
    document.getElementById('modalImage').src = imagePath;

    // Show the modal
    $('#imageModal').modal('show');

    // Disable the carousel controls
    document.getElementById('carouselPrev').style.pointerEvents = 'none';
    document.getElementById('carouselNext').style.pointerEvents = 'none';
  }

  // Listen for the hidden.bs.modal event to re-enable the carousel controls
  $('#imageModal').on('hidden.bs.modal', function() {
    document.getElementById('carouselPrev').style.pointerEvents = 'auto';
    document.getElementById('carouselNext').style.pointerEvents = 'auto';
  });
</script>