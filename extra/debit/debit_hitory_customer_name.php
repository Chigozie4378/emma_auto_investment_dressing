<?php
include_once "../../autoload/loader.php";
$ctr = new DebitController();
$customer_name = $_GET["customer_name"];
$select = $ctr->searchDebitHistoryCustomerName($customer_name);
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
            <td><?php if ($row['total_balance'] == 0) {
                    echo "SETTLED";
                } else {
                    echo $row['total_balance'];
                }   ?></td>
            <td><?php echo $row['date'] ?></td>
            <td><a href="debit_history_details.php?customer_name=<?php echo $row['customer_name'] ?>&address=<?php echo $row['address'] ?>"><i class="fa fa-eye text-primary"></i></a></td>

        </tr>
    </capital>
<?php
}
?>