<?php include_once "../../includes/admin/header.php";
?>



<!-- if (isset($_POST["print"])) {

    header("location:search_record.php");
}
?> -->




<script>
    function record(date) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../../extra/sales_history/date.php?date=" + date, true);
        xhttp.send();
    }

    function findInvoice(date, invoice) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../../extra/sales_history/invoice_no.php?date=" + date + "&invoice=" + invoice, true);


        xhttp.send();
    }
</script>


</body>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">


                    <div class="card-body">
                        <form class="sticky-top">
                            <div class="form-inline d-print-none">

                                Date: &nbsp; <input class="form-control" type="text" id="rDate" placeholder="Click to Search Date" />
                                <input type="hidden">
                                <input type="button" class="form-control bg-success" onclick="record(document.getElementById('rDate').value)" value="Search">
                                Invoice No: &nbsp; <input class="form-control" type="text" id="invoice" placeholder="Enter Invoice No" />
                                <input type="hidden">
                                <input type="button" class="form-control bg-success" onclick="findInvoice(document.getElementById('rDate').value,document.getElementById('invoice').value)" value="Search">
                            </div>


                        </form>

                        <div id="table" class="fixTableHead table-responsive">
                      
                        </div>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
        </div>
    </div>

</section>
<?php include_once "../../includes/admin/footer.php" ?>
<script>
    $(document).ready(function() {
        $('input[id$=rDate]').datepicker({
            dateFormat: 'dd-mm-yy'
        });
    });

    $(".timepicker").datetimepicker({
        icons: {
            up: 'fa fa-angle-up',
            down: 'fa fa-angle-down'
        },
        format: 'LT'
    });
</script>
<script>
    function printpage() {
        window.print()
    }
</script>


