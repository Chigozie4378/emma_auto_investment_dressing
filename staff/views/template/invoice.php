<?php include_once "../../includes/staff/header.php";
$ctr = new SalesController();

$result_sales = mysqli_fetch_array($ctr->showSales($_SESSION["customer_name"], $_SESSION["customer_address"], $_SESSION["invoice_no"]));
$result_debit = mysqli_fetch_array($ctr->showDebit($_SESSION["customer_name"], $_SESSION["customer_address"]));
?>
<div class="container">
    <section class="invoice p-4">
        <!-- title row -->
        <div class="row">
            <div class="col-12  text-center">
                <h2 class="page-header">
                    <i class="fas fa-globe"></i> Emma Auto Multi-Company

                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row">
            <div class="col-12 text-center">
                <address>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                </address>
            </div>
        </div>
        <div class="row invoice-info">
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Customer Name: <?php echo $result_sales['customer_name'] ?></b><br>
                <b>Customer Address:</b> <?php echo $result_sales['customer_address'] ?><br>
                <b>Invoice No:</b> <?php echo $result_sales['invoice_no'] ?><br>
                <b>Date:</b> <?php echo $result_sales['date'] ?><br>
                <b>Sold By:</b> <?php echo $result_sales['staff'] ?>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th><b>Qty</b></th>
                            <th>Product Name</th>
                            <th>Unit</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select_sales_details = $ctr->showSalesDetails($_SESSION["invoice_no"]);
                        while ($result_sales_histories = mysqli_fetch_array($select_sales_details)) { ?>
                            <tr>
                                <td><?php echo ++$id ?></td>
                                <td><b><?php echo $result_sales_histories["quantity"] ?></b></td>
                                <td><?php echo $result_sales_histories["productname"] ?></td>
                                <td><?php echo $result_sales_histories["price"] ?></td>
                                <td><?php echo $result_sales_histories["amount"] ?></td>
                            </tr>
                        <?php  }
                        ?>

                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-12">

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td colspan="4"></td>
                                <th>Total Amount:</th>
                                <td>#<?php echo $result_sales['total'] ?></td>
                            </tr>
                            <tr>
                                <th>Cash</th>
                                <td>#<?php echo $result_sales['cash'] ?></td>
                                <th>Transfer:</th>
                                <td>#<?php echo  $result_sales['transfer'] ?> <?php $result_transfer = mysqli_fetch_array($ctr->showTransfer($_SESSION["invoice_no"]));
                                                                                echo $result_transfer['bank'] ?></td>
                                <th>POS:</th>
                                <td>#<?php echo $result_sales['pos'] ?> <?php $result_pos = mysqli_fetch_array($ctr->showPos($_SESSION["invoice_no"]));
                                                                        echo $result_pos['pos_type'] ?></td>

                            </tr>
                            <tr>

                                <th>POS Charges:</th>
                                <td>#<?php echo $result_pos['pos_charges'] ?></td>
                                <th>Transport:</th>
                                <td>#<?php echo $result_sales['transport'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <th>Total Paid:</th>
                                <td>#<?php echo (int)$result_sales['total_payment'] + (int)$result_pos['pos_charges'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <th>Balance:</th>
                                <td>#<?php echo $result_sales['balance'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-6">

                <div class="form-inline">
                    <label for="email">Customer Signature:</label>
                    <input type="text" class="form-control" id="email">


                </div>
            </div>
            <div class="col-md-6">

                <div class="form-inline" style="float: right;">
                    <label for="pwd">Manager Signature:</label>
                    <input type="text" class="form-control" id="pwd">

                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="offset-md-6 col-md-6">
                <form action="" method="post">
                    <div class="form-inline" style="float: right;">
                        <label for="pwd">Supplied By:</label>
                        <select class="form-control" name="supplied_by" style="width:210px">
                            <option value=""></option>
                            <?php
                            $ctr1 = new UserController();
                            while ($row = mysqli_fetch_array($ctr1->showUsers())) { ?>
                                <option value="<?php echo $row['lastname'] ?>">
                                    <?php echo  $row['lastname'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="offset-md-6 col-md-6">

                <div class="form-inline" style="float: right;">
                    <label for="pwd">Checked By:</label>
                    <input type="text" name="checked_by" class="form-control" id="pwd">

                </div>
            </div>
        </div>

        <div class="text-center">
            <b><i>You Must be Born Again!</i></b>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <input onclick="window.print()" name="print" type="submit" class="toggle btn btn-primary d-print-none" value="print">
                </form>


            </div>
        </div>
    </section>
</div>
<?php
$ctr->printInvoice($result_sales["customer_name"], $result_sales["customer_address"], $result_sales["invoice_no"], $_POST["supplied_by"], $_POST["checked_by"]);
?>
<script>
    function printpage() {
        window.print()
    }
</script>