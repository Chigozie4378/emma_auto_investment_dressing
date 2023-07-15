<?php
include_once "../../autoload/loader.php";
$ctr = new SalesHistoryController();
$staff_name = $_GET["staff_name"];
?>
<table class="table table-hover">
    <div class="row d-print-none" style="font-weight:bolder">
        <div class="col-3">Total Sales:&nbsp; <input class="form-control" style="font-weight:bolder" type="text" value="<?php $staff_total = $ctr->sumStaffTotal($staff_name);

                                                                                                                        echo $staff_total['value'] ?>"></div>
        <div class="col-3">Total Cash:&nbsp; <input class="form-control" style="font-weight:bolder" type="text" value="<?php $staff_cash = $ctr->sumStaffCash($staff_name);

                                                                                                                        echo $staff_cash['value']  ?>"></div>
        <div class="col-3">Total Transfer:&nbsp; <input class="form-control" style="font-weight:bolder" type="text" value="Transfer: <?php $staff_transfer = $ctr->sumStaffTransfer($staff_name);

                                                                                                                                        echo $staff_transfer['value'] ?> || Pos: <?php $staff_pos = $ctr->sumStaffPos($staff_name);

                                            echo $staff_pos['value'] ?>"></div>
        <div class="col-3">Total Debit:&nbsp; <input class="form-control" style="font-weight:bolder" type="text" value="<?php $staff_debit = $ctr->sumStaffDebit($staff_name);

                                                                                                                        echo $staff_debit['value'] ?>"></div>

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
        $select = $ctr->searchSalesStaffName($staff_name);
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
                        <?php echo $row['payment_type'] ?>
                    </td>
                    <td style="text-transform:uppercase">
                        <?php echo $row['customer_type'] ?>
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
                    <td class="text-center"><a href="sales_history_details.php?invoice_no=<?php echo $row['invoice_no'] ?>"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
            </capital>
        <?php }
        ?>
    </tbody>
</table>
<div class="row mb-4" style="font-weight:bolder">
    <div class="col-3">Total Sales:&nbsp; <input class="form-control" style="font-weight:bolder" type="text" value="<?php echo $staff_total['value'] ?>"></div>
    <div class="col-3">Total Cash:&nbsp; <input class="form-control" style="font-weight:bolder" type="text" value="<?php echo $staff_cash['value'] ?>"></div>
    <div class="col-3">Total Transfer:&nbsp; <input class="form-control" style="font-weight:bolder" type="text" value="Transfer: <?php echo $staff_transfer['value'] ?> || Pos: <?php echo $staff_pos['value'] ?>"></div>
    <div class="col-3">Total Debit:&nbsp; <input class="form-control" style="font-weight:bolder" type="text" value="<?php echo $staff_debit['value'] ?>"></div>

</div>