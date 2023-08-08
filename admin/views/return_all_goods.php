<?php include_once "../../includes/admin/header.php";
$ctr = new ReturnGoodsController();
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Return Goods</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="search" name="search" class="form-control float-right" id="invoice_no" onkeyup="availableInvoiceNo(this.value)" placeholder="Search Invoice No">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="search" name="search" class="form-control float-right" id="customer_address" onkeyup="availableAddress(this.value,getElementById('customer_name').value)" placeholder="Search Address">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="search" name="search" class="form-control float-right" id="customer_name" onkeyup="availableName(this.value)" placeholder="Search Name">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0 fixTableHead">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Invoice No</th>
                                <th>Payment Type</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Balance</th>
                                <th>Staff</th>
                                <th>Date</th>
                                <th style="text-align:center">View</th>
                            </tr>
                        </thead>
                        <tbody id="table">
                            <?php
                            $select = $ctr->displayAllReturnGoods();
                            while ($row = mysqli_fetch_array($select)) { ?>
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
                                            <?php echo $row['invoice_no'] ?>
                                        </td>
                                        <td style="text-transform:uppercase">
                                            <?php echo $row['payment_type'] ?>
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
                                        <td class="text-center"><a href="return_all_goods_details.php?invoice=<?php echo $row['invoice_no'] ?>"><i class="fa fa-eye"></i></a></td>
                                    </tr>
                                </capital>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<script>
    function availableName(customer_name) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../../extra/return_goods/all_return_customer_name.php?customer_name=" + customer_name, true);
        xhttp.send();
    }

    function availableAddress(customer_address, customer_name) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../../extra/return_goods/all_return_customer_address.php?customer_address=" + customer_address + "&customer_name=" + customer_name, true);
        xhttp.send();
    }

    function availableInvoiceNo(invoice_no) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../../extra/return_goods/all_return_invoice.php?invoice_no=" + invoice_no, true);
        xhttp.send();
    }
</script>
<?php
include "includes/footer.php";
?>

<?php include_once "../../includes/admin/footer.php" ?>