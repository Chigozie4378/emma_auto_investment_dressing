<?php
session_start();
include_once "../../autoload/loader.php";
Session::adminAccess("admin_username");
$ctr_sales = new SalesHistoryController();
$ctr_return = new ReturnGoodsController();
$ctr_debit = new DebitController();
$ctr_return->returnAllGoods();

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
    <div class="container-fluid" style="padding-right:30px;padding-left:30px;padding-bottom:160px;margin: bottom 120px;">
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
        <div class=" row" style="font-size: 18px;">
            <div class="col-md-8">
                <table class="table table-striped table-light table-bordered" style="width: 100%;">
                    <tr style="width: 50%;">
                        <th>NAME: </th>
                        <td><?php echo $ctr_sales->viewSales("customer_name"); ?></td>
                        <th>ADDRESS:</th>
                        <td><?php echo $ctr_sales->viewSales("customer_address"); ?></td>


                    </tr>

                    <tr>
                        <th>INVOICE NO:</th>
                        <td><?php echo $ctr_sales->viewSales("invoice_no"); ?></td>
                        <th>PAYMENT TYPE:</th>
                        <td><?php echo $ctr_sales->viewSales("payment_type"); ?></td>
                    </tr>

                    <tr">
                        <th>DATE:</th>
                        <td><?php echo $ctr_sales->viewSales("date"); ?></td>
                        <th>SOLD BY:</th>
                        <td>Mr/Miss <?php $staff = explode(" ", $ctr_sales->viewSales("staff"));
                                    echo $staff[1]; ?></td>
                        </tr>

                </table>

            </div>
        </div>
        <div class="row" style="font-size: 18px;">
            <div class="col-sm-12">
                <h1 id='returnQty'></h1>
                <p id="new_cash"></p>
                <table class="table table-striped table-light table-bordered">
                    <tr>
                        <th>S/N</th>
                        <th>Qty</th>
                        <th colspan="3" class="text-center">Description of Goods</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th class="d-print-none">Return good</th>
                    </tr>
                    <?php
                    $result = $ctr_sales->viewSalesHistories();
                    while ($row = mysqli_fetch_array($result)) { ?>

                        <tr>
                            <td><?php echo ++$id ?></td>
                            <td style="font-weight:bold;"><?php echo $row["quantity"] ?></td>
                            <td colspan="3"><?php echo $row["productname"] ?></td>
                            <td><?php echo $row["price"] ?></td>
                            <td><?php echo $row["amount"] ?></td>
                            <td class="d-print-none">
                                <input name="rQty" id="rQty<?php echo $row['id'] ?>" style="width:40px" type="text" placeholder="<?php echo $row["quantity"] ?>">&nbsp;&nbsp;&nbsp;&nbsp;
                                <i type="submit" class="fa fa-undo text-danger" onclick="returnEachGoods('<?php echo $row['quantity'] ?>','<?php echo $row['productname'] ?>','<?php echo $row['price'] ?>','<?php echo $row['amount'] ?>','<?php echo $ctr_sales->viewSales('invoice_no'); ?>','<?php echo $ctr_sales->viewSales('total'); ?>',document.getElementById('rQty<?php echo $row['id'] ?>').value,'<?php echo $ctr_sales->viewSales('customer_name'); ?>','<?php echo $ctr_sales->viewSales('customer_address'); ?>','<?php echo $ctr_sales->viewSales('payment_type'); ?>','<?php echo $ctr_sales->viewSales('cash'); ?>','<?php echo $ctr_sales->viewSales('transfer'); ?>','<?php echo $ctr_sales->viewSales('total_payment'); ?>','<?php echo $ctr_sales->viewSales('balance'); ?>','<?php echo date('d-m-Y') ?>','<?php echo $_SESSION['admin_firstname'] . ' ' . $_SESSION['admin_lastname']; ?>')"></i>

                        </tr>
                    <?php
                    }
                    ?>
                    <tr>

                        <td colspan="5"></td>
                        <td style="font-weight: bold;">Total Amount:</td>
                        <td style="font-weight: bold;"><?php echo $ctr_sales->viewSales("total"); ?></td>
                    </tr>
                    <tr>
                        <form action="" method="post">
                            <td class="d-print-none" style="font-weight: bold;">Cash: <input onclick="this.select()" style="width:90px" type="text" id="cash1" required></td>
                            <td class="d-print-none" style="font-weight: bold;">Transfer: <input onclick="this.select()" onkeyup="selectBank()" style="width:90px" type="text" id="transfer1" required>
                                <span id="select_bank"></span>
                            </td>
                            <td class="d-print-none" style="font-weight: bold;">POS: <input onclick="this.select()" onkeyup="selectPos()"  style="width:90px" type="text" id="pos1" required>
                            <span id="select_pos"></span>
                        </td>
                            <td> <button type="submit" onclick="updatePayment('<?php echo $ctr_sales->viewSales('invoice_no'); ?>',getElementById('transfer1').value,getElementById('bank').value,'<?php echo $ctr_sales->viewSales('total_payment') ?>','<?php echo $ctr_sales->viewSales('total') ?>','<?php echo $ctr_sales->viewSales('customer_name'); ?>','<?php echo $ctr_sales->viewSales('customer_address'); ?>','<?php echo date('d-m-Y') ?>','<?php echo $_SESSION['admin_firstname'] . ' ' . $_SESSION['admin_lastname']; ?>',getElementById('cash1').value,'<?php echo $ctr_sales->viewSales('customer_type'); ?>',getElementById('pos1').value)" type="submit" class=" btn btn-sm btn-info d-print-none">Change Payment</button></td>
                        </form>
                        <?php
                        if ($ctr_sales->viewSales("old_deposit") != 0) { ?>
                            <td style="font-weight: bold;">Old Deposit: # <?php echo $ctr_sales->viewSales("old_deposit"); ?></td>
                        <?php }
                        ?>
                        <?php
                        if ($ctr_sales->viewSales("total_payment") > $ctr_sales->viewSales("total")) { ?>
                            <td style="font-weight: bold;">Transport Charges: # <?php echo $ctr_sales->viewSales("transport") ?></td>

                        <?php }
                        ?>

                        <td style="font-weight: bold;">Cash: # <?php echo $ctr_sales->viewSales("cash"); ?></td>
                        <td style="font-weight: bold;">POS:# <?php echo $ctr_sales->viewSales("pos");
                                                                if ($ctr_sales->viewSales("pos") != 0) {
                                                                    echo " (" . $ctr_sales->viewPosType("pos_type") . ")"; ?></td>
                        <td style="font-weight: bold;">POS Charges :# <?php echo $ctr_sales->viewPosType("pos_charges");
                                                                    }  ?>
                        </td>
                        <td style="font-weight: bold;">Transfer:# <?php echo $ctr_sales->viewSales("transfer"); ?></td>
                        <td style="font-weight: bold;">Total Paid: # <?php $deposit = $ctr_sales->viewSales("total_payment");
                                                                        $pos_charges =  $ctr_sales->viewPosType("pos_charges");
                                                                        $total_paid = intval($deposit) + intval($pos_charges);
                                                                        echo ($total_paid); ?></td>
                        <td class="d-print-none"></td>
                    </tr>
                    <?php
                    $select_debit = $ctr_debit->checkDebit();
                    $result_debit = mysqli_fetch_array($select_debit);
                    if (mysqli_num_rows($select_debit) > 0) { ?>
                        <tr>
                            <td colspan="2"></td>
                            <td style="font-weight: bold;">Transport Charges: # <?php echo $ctr_sales->viewSales("transport"); ?></td>
                            <td style="font-weight: bold;">Old Balance: </td>
                            <td style="font-weight: bold;"># <?php $old_bal = $result_debit["balance"] - $ctr_sales->viewSales("balance");
                                                                echo number_format($old_bal, 2); ?></td>
                            <td style="font-weight: bold;">Total Balance:</td>
                            <td style="font-weight: bold;"># <?php echo number_format($result_debit["balance"], 2); ?></td>

                        </tr>
                    <?php }
                    ?>
                    <!-- <tr>
                    <td colspan="5"></td>
                    <td style="font-weight: bold;">Balance:</td>
                    <td style="font-weight: bold;"><?php echo $ctr_sales->viewSales("balance"); ?></td>
                </tr> -->
                </table>

            </div>
        </div>
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

                <div class="form-inline" style="float: right;">
                    <label for="pwd">Supplied By:</label>
                    <input type="text" class="form-control" id="pwd" value="" readonly>

                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="offset-md-6 col-md-6">

                <div class="form-inline" style="float: right;">
                    <label for="pwd">Checked By:</label>
                    <input type="text" class="form-control" id="pwd" value="" readonly>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <form action="" method="post">
                    <input name="print" type="submit" class="btn btn-primary d-print-none" value="print" onclick="printpage()">
                    <a href="../../print/staff/index_s.php?invoice_no=<?php echo $ctr_sales->viewSales("invoice_no"); ?>" class="btn btn-success d-print-none">Print Retail</a>
                    <a href="sales_history_details.php?invoice_no1=<?php echo $ctr_sales->viewSales("invoice_no") ?>" class="btn btn-danger d-print-none">Return All Goods</a>
                    <a href="sales_history.php" class="btn btn-info d-print-none">Go Back</a>

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
    <script>
        function returnEachGoods(value1, value2, value3, value4, value5, value6, value7, value8, value9, value10, value11, value12, value13, value14, value15, value16) {
            $(document).ready(function() {
                var quantity = value1;
                var productname = value2;
                var price = value3;
                var amount = value4;
                var invoice_no = value5;
                var total_amount = value6;
                var returnQty = value7;
                var customer_name = value8;
                var customer_address = value9;
                var payment_type = value10;
                var cash = value11;
                var transfer = value12;
                var total_payment = value13;
                var balance = value14;
                var date = value15;
                var staff = value16;

                if (returnQty != "") {
                    $.ajax({
                        url: "../../extra/return_goods/return_goods.php",
                        method: 'POST',
                        data: {
                            quantity: quantity,
                            productname: productname,
                            price: price,
                            amount: amount,
                            invoice_no: invoice_no,
                            total_amount: total_amount,
                            returnQty: returnQty,
                            customer_name: customer_name,
                            customer_address: customer_address,
                            payment_type: payment_type,
                            cash: cash,
                            transfer: transfer,
                            total_payment: total_payment,
                            balance: balance,
                            date: date,
                            staff: staff

                        },
                        success: function(data) {
                            $('#returnQty').html(data);
                        }
                    });
                } else {
                    $('#qty').css('display', 'none');
                }
            });

        }


        function updatePayment(value1, value2, value3, value4, value5, value6, value7, value8, value9, value10, value11, value12) {
            $(document).ready(function() {
                var invoice_no = value1;
                var new_transfer = value2;
                var bank = value3;
                var total_payment = value4;
                var total = value5;
                var customer_name = value6;
                var customer_address = value7;
                var date = value8;
                var staff = value9;
                var new_cash = value10;
                var customer_type = value11;
                var pos = value12;
                if (new_transfer != "" && new_cash != "") {
                    $.ajax({
                        url: "../../extra/update_payment/update_payment.php",
                        method: 'POST',
                        data: {
                            invoice_no: invoice_no,
                            total_payment: total_payment,
                            bank: bank,
                            new_transfer: new_transfer,
                            total: total,
                            customer_name: customer_name,
                            customer_address: customer_address,
                            date: date,
                            staff: staff,
                            new_cash: new_cash,
                            customer_type: customer_type,
                            new_pos: pos
                        },
                        success: function(data) {
                            $('#new_cash').html(data);
                        }
                    });
                }


            });

        }

        function selectBank() {

            const xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("select_bank").innerHTML =
                        this.responseText;
                }
            };
            xhttp.open("GET", "../../extra/checkout/select_bank.php", true);
            xhttp.send();
        }

        function selectPos() {

            const xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("select_pos").innerHTML =
                        this.responseText;
                }
            };
            xhttp.open("GET", "../../extra/checkout/select_pos.php", true);
            xhttp.send();
        }
    </script>


</body>

</html>

<!--Action boxes-->


<!--end-main-container-part-->
<?php

?>