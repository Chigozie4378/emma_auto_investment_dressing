<?php include_once "../../includes/staff/header.php" ?>
<?php include_once "../../includes/staff/navbar.php"; 
$ctr = new SalesController();
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sales History</h3>


                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input type="search" name="search" class="form-control float-right" id="customer_address" onkeyup="customerAddress(this.value,getElementById('customer_name').value,getElementById('username').value)" placeholder="Search Address">



                            </div>
                        </div>
                        <div class="card-tools mx-2">
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input type="search" name="search" class="form-control float-right" id="customer_name" onkeyup="customerName(this.value,getElementById('username').value)" placeholder="Search Customer Name">

                                <input type="hidden" class="form-control float-right" id="username" value="<?php echo $_SESSION['staff_username'] ?>">


                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0 fixTableHead">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>S/N </th>
                                    <th>Customer Name</th>
                                    <th>Address</th>
                                    <th>Invoice No</th>
                                    <th>Payment Type</th>
                                    <th>Customer Type</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Balance</th>
                                    <th>Date</th>
                                    <th style="text-align:center">View</th>
                                </tr>
                            </thead>
                            <tbody id="table">
                                <?php
                                $select = $ctr->showHistory();
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
                <!-- /.card -->
            </div>
        </div>
    </div>

</section>
<script>
    function customerName(customer_name, username) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../../extra/sales_history/staff_history_customer_name.php?customer_name=" + customer_name + "&username=" + username, true);
        xhttp.send();
    }

    function customerAddress(customer_address, customer_name, username) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../../extra/sales_history/staff_history_customer_address.php?customer_address=" + customer_address + "&customer_name=" + customer_name + "&username=" + username, true);
        xhttp.send();
    }
</script>

<?php include_once "../../includes/staff/footer.php" ?>