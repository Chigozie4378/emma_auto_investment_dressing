<?php
 include_once "../../autoload/loader.php";
 $ctr = new SalesHistoryController();
$date  = $_GET["date"];
$invoice  = $_GET["invoice"];


?>
 <table class="table table-hover">

    <thead>

        <tr>
            <th>S/N</th>
            <th>Customer Name</th>
            <th>Address</th>
            <th>Payment Type</th>
            <th>Customer Type</th>
            <th>Total</th>
            <th>Paid</th>
            <th>Balance</th>
            <th>Staff</th>
            <th style="width:10%">Date</th>
            <th class="d-print-none" style="text-align:center">View</th>
        </tr>
    </thead>
    <tbody>
        <?php 
    $select = $ctr->searchRecordInvoice($date,$invoice);
    while ($row = mysqli_fetch_array($select)){?>
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
                    <?php echo $row['staff_name'] ?>
            </td>
            <td style="text-transform:uppercase">
                <?php echo $row['date'] ?>
            </td>
            <td class="d-print-none text-center"><a href="sales_history_details.php?invoice=<?php echo $row['invoice_no'] ?>&customer_name=<?php echo $row['customer_name'] ?>&customer_address=<?php echo $row['customer_address'] ?>"><i class="fa fa-eye"></i></a>
                                                </td>        </tr>
        </capital>
        <?php }
    ?>
    </tbody>
</table>

    <p></p>
<div class="text-center">
    <form action="" method="post">
    <input name="print" type="submit" class="toggle btn btn-success d-print-none" value="print" onclick="printpage()">

    </form>
</div>
