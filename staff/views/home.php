<?php include_once "../../includes/staff/header.php" ?>
<?php include_once "../../includes/staff/navbar.php";
$ctr_dashboard = new DashboardController();
?>
<style>
    .hover:hover {
        background-color: rgb(244, 239, 239);
    }
</style>
<div class="container">

    <!-- Small boxes (Stat box) -->
    <div class="row pt-2">
        <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php  $customer_count = $ctr_dashboard->countCustomer(); if (!$customer_count['value'] == 0) {
              echo $customer_count['value'];
            } ?></h3>

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
                    <h3><?php $sumSales = $ctr_dashboard->sumSales();
                        echo $sumSales['value'] ?></h3>

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
                    <h3><?php $sumCash = $ctr_dashboard->sumCash();
                        echo $sumCash['value'] ?></h3>

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
                    <h3><?php $sumTransfer = $ctr_dashboard->sumTransfer();
                        echo $sumTransfer['value'] ?></h3>

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
                    <h3><?php $sumPos = $ctr_dashboard->sumPos();
                        echo $sumPos['value'] ?></h3>

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
                    <h3><?php $sumDebit = $ctr_dashboard->sumDebit();
                        echo $sumDebit['value'] ?></h3>

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

    <div class="card card-primary rounded table-responsive p-0 fixTableHead" style="height:83vh">

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
   
</div>
<?php include_once "../../includes/staff/footer.php" ?>