<?php include_once "../../includes/admin/header.php";
$ctr = new DebitController();

?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
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
                        </div>


                        
                    </div>

                    <div class="card-body">
                        <div class="table-responsive fixTableHead">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Customer Name</th>
                                        <th>Address</th>
                                        <th>Balance</th>
                                        <th>Date</th>
                                        <th>View</th>

                                    </tr>
                                </thead>
                                <tbody id="table">
                                    <?php

                                    $select = $ctr->displayDebitHistory();
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
                                                <td><?php if ($row['balance'] == 0) {
                                                        echo "SETTLED";
                                                    } else {
                                                        echo $row['balance'];
                                                    }   ?></td>
                                                <td><?php echo $row['date'] ?></td>
                                                <td><a href="debit_history_details.php?customer_name=<?php echo $row['customer_name'] ?>&address=<?php echo $row['address'] ?>"><i class="fa fa-eye text-primary"></i></a></td>




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
        xhttp.open("GET", "../../extra/debit/debit_hitory_customer_name.php?customer_name=" + customer_name, true);
        xhttp.send();
    }

    function availableAddress(customer_address, customer_name) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../../extra/debit/debit_hitory_customer_address.php?customer_address=" + customer_address + "&customer_name=" + customer_name, true);
        xhttp.send();
    }
</script>

<?php include_once "../../includes/admin/footer.php" ?>