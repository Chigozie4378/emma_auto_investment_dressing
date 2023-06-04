<?php include_once "../../includes/admin/header.php";
$ctr = new DebitController();
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        
                        <div class="form-inline">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control"  id="customer_name" onkeyup="availableName(this.value)" placeholder="Search Customer Name">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="customer_address" onkeyup="availableAddress(this.value,getElementById('customer_name').value)" placeholder="Search Customer Address">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="date" onkeyup="availableDate(this.value)" placeholder="Search Date">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class=" table-responsive p-0 fixTableHead">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr class='sticky'>
                                        <th>S/N</th>
                                        <th>Customer Name</th>
                                        <th>Address</th>
                                        <th>Total</th>
                                        <th>Deposit</th>

                                        <th>Balance</th>
                                        <th>Staff</th>
                                        <th>Date</th>
                                        <th class="text-center">Pay</th>
                                        <th class="text-center">View</th>

                                    </tr>
                                </thead>
                                <tbody id="table">
                                    <?php
                                    $id = 0;

                                    $select = $ctr->displayDebit();
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
                                                <td class="text-center"><a href="edit_debit.php?id=<?php echo $row['id'] ?>">Pay</a></td>
                                                <td class=" text-center"><a href="debit_details.php?customer_name=<?php echo $row['customer_name'] ?>&customer_address=<?php echo $row['customer_address'] ?>"><i class="fa fa-eye text-primary"></i></a></td>

                                            </tr>
                                        </capital>
                                    <?php }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

</section>
<script>
    function availableName(customer_name) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../../extra/debit/debit_customer_name.php?customer_name=" + customer_name, true);
        xhttp.send();
    }

    function availableAddress(customer_address, customer_name) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../../extra/debit/debit_customer_address.php?customer_address=" + customer_address + "&customer_name=" + customer_name, true);
        xhttp.send();
    }

    function availableDate(date) {

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../../extra/debit/debit_date.php?date=" + date, true);
        xhttp.send();
    }
</script>


<?php include_once "../../includes/admin/footer.php" ?>