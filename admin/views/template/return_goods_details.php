<?php
session_start();
include_once "../../autoload/loader.php";
Session::adminAccess("admin_username");
// $ctr_sales = new SalesHistoryController();
$ctr = new ReturnGoodsController();
// $ctr_debit = new DebitController();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMMA AUTO MULTI-COMPANY PLC</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
    <div class="row">
            <div class="col-12  text-center">
                <h2 class="page-header">
                <i class="fa-solid fa-motorcycle"></i> EMMMA AUTO AND MULTI-SERVICES COMPANY
                </h2>
                <span class="bg-dark text-white rounded p-1" style="font-weight: bolder;">DRESSING</span>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row">
            <div class="col-12 text-center">
                <address>
                    <b>Motor & Motorcycle Accessories</b><br>
                    <span style="font-weight: bolder;">Such as: </span>All Type of Light, Seat Cover, Horn, MP3, Remote, Lock Keys, Bulbs, Gums etc.<br>
                    <span style="font-weight: bolder;">Address: </span>Opp. Jesus Life Church, Asubiaro Hospital juction, Osogbo<br>
                    <span style="font-weight: bolder;">Tel: </span>07063684266, 08062063060</p><br>
                </address>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <table class="table table-striped table-light table-bordered">
                    <tr class="odd gradeX">
                        <th>NAME: </th>
                        <td><?php echo $ctr->viewReturn("customer_name"); ?></td>
                        <th>ADDRESS:</th>
                        <td><?php echo  $ctr->viewReturn("customer_address"); ?></td>


                    </tr>

                    <tr class="odd gradeA">
                        <th>INVOICE NO:</th>
                        <td><?php echo  $ctr->viewReturn("invoice_no"); ?></td>
                        <th>PAYMENT TYPE:</th>
                        <td><?php echo  $ctr->viewReturn("payment_type"); ?></td>
                    </tr>

                    <tr class="even gradeA">
                        <th>DATE:</th>
                        <td><?php echo  $ctr->viewReturn("date"); ?></td>
                        <td colspan="2"></td>
                    </tr>

                </table>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 fixTableHead">
                <table class="table table-striped table-light table-bordered">
                    <tr>
                        <th>S/N</th>
                        <th>Qty</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Amount</th>

                    </tr>
                    <?php

                    $result = $ctr->viewReturnDetail();
                    while ($row = mysqli_fetch_array($result)) { ?>

                        <tr>
                            <td><?php echo ++$id ?></td>
                            <td><?php echo $row["quantity"] ?></td>
                            <td><?php echo $row["productname"] ?></td>
                            <td><?php echo $row["price"] ?></td>
                            <td><?php echo $row["amount"] ?></td>

                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td colspan="3"></td>
                        <td style="font-weight: bold;">Total Amount:</td>
                        <?php
                        ?>
                        <h3 class="text-white" </h3>
                            <td style="font-weight: bold;"># <?php $total = $ctr->sumReturnTotal(); echo number_format($total['value']) ?></td>
                    </tr>
                </table>

            </div>
        </div>
        <div class="row">
            <div class="col-6">

                <div class="form-inline">
                    <label for="email">Customer Signature:</label>
                    <input type="text" class="form-control">


                </div>
            </div>
            <div class="col-6">

                <div class="form-inline" style="float: right;">
                    <label for="pwd">Manager Signature:</label>
                    <input type="text" class="form-control" value="<?php $ctr->viewReturnDetail("staff_name"); ?>">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <form action="" method="post">
                    <input name="print" type="submit" class="toggle btn btn-primary d-print-none" value="print" onclick="printpage()">

                    <a href="return_each_goods.php" class="btn btn-primary d-print-none">Go Back</a>

                </form>
                <p></p>



            </div>
        </div>
    </div>

    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="../../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../assets/dist/js/adminlte.js"></script>
    <script>
        function printpage() {
            window.print()
        }
    </script>

</body>

</html>

<!--Action boxes-->


<!--end-main-container-part-->
<?php

?>