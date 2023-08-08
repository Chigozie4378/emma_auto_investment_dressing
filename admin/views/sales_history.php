<?php include_once "../../includes/admin/header.php";
$ctr = new SalesHistoryController();

?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 d-print-none">
                            <div class="form-inline">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="staff_name" onkeyup="staffName(this.value)" placeholder="Staff Name">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                                    </div>
                                </div>&nbsp;&nbsp;&nbsp;
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="customer_name" onkeyup="customerName(this.value)" placeholder="Customer Name">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                                    </div>
                                </div>&nbsp;&nbsp;&nbsp;
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="customer_address" onkeyup="customerAddress(this.value,getElementById('customer_name').value)" placeholder="Customer Address">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" table-responsive fixTableHead" id="staff">
                        <table class="table table-hover">
                            <div class="row d-print-none" style="font-weight:bolder">
                                <div class="col-3">Total Sales:&nbsp; <input class="form-control" style="font-weight:bolder" type="text" value="<?php $total = $ctr->sumTotal();

                                                                                                                                                echo $total['value'] ?>"></div>
                                <div class="col-3">Total Cash:&nbsp; <input class="form-control" style="font-weight:bolder" type="text" value="<?php $cash = $ctr->sumCash();

                                                                                                                                                echo $cash['value'] ?>"></div>
                                <div class="col-3">Total Transfer:&nbsp; <input class="form-control" style="font-weight:bolder" type="text" value="Transfer: <?php $transfer = $ctr->sumTransfer();

                                                                                                                                                                echo $transfer['value'] ?> || Pos: <?php $pos = $ctr->sumPos();

                                    echo $pos['value'] ?>"></div>
                                <div class="col-3">Total Debit:&nbsp; <input class="form-control" style="font-weight:bolder" type="text" value="<?php $debit = $ctr->sumDebit();

                                                                                                                                                echo $debit['value'] ?>"></div>

                            </div>
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
                                                <?php echo $row['total_payment'] ?>
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
                        <div class="row mb-4" style="font-weight:bolder">
                            <div class="col-3">Total Sales:&nbsp; <input class="form-control" style="font-weight:bolder" type="text" value="<?php echo $total['value'] ?>"></div>
                            <div class="col-3">Total Cash:&nbsp; <input class="form-control" style="font-weight:bolder" type="text" value="<?php echo $cash['value'] ?>"></div>
                            <div class="col-3">Total Transfer:&nbsp; <input class="form-control" style="font-weight:bolder" type="text" value="Transfer: <?php echo $transfer['value'] ?> || Pos: <?php echo $pos['value'] ?>"></div>
                            <div class="col-3">Total Debit:&nbsp; <input class="form-control" style="font-weight:bolder" type="text" value="<?php echo $debit['value'] ?>"></div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
<?php include_once "../../includes/admin/footer.php" ?>
<script>
    function customerName(customer_name) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../../extra/sales_history/customer_name.php?customer_name=" + customer_name, true);
        xhttp.send();
    }

    function customerAddress(customer_address, customer_name) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../../extra/sales_history/customer_address.php?customer_address=" + customer_address + "&customer_name=" + customer_name, true);
        xhttp.send();
    }

    function staffName(staff_name) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("staff").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../../extra/sales_history/staff_name.php?staff_name=" + staff_name, true);
        xhttp.send();
    }
</script>