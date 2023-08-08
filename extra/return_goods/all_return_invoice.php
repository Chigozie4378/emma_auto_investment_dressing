<?php
include_once "../../autoload/loader.php";
$ctr = new ReturnGoodsController();

$invoice_no = $_GET["invoice_no"];
$select = $ctr->viewReturnInvoiceNo($invoice_no);
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
            <td class="text-center"><a href="return_all_goods_details.php?invoice_no=<?php echo $row['invoice_no'] ?>"><i class="fa fa-eye"></i></a></td>
        </tr>
    </capital>
<?php }
?>