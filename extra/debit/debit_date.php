<?php
include_once "../../autoload/loader.php";
$ctr = new DebitController();
$date = $_GET["date"];
$select = $ctr->searchDebitCustomerDate($date);
while ($row = mysqli_fetch_array($select)) { ?>
    <capital>
        <tr>
            <td>
                <?php echo ++$id ?>
            </td>
            <td>
                <?php echo $row['customer_name'] ?>
            </td>
            <td>
                <?php echo $row['customer_address'] ?>
            </td>
            <td>
                <?php echo $row['total'] ?>
            </td>
            <td>
                <?php echo $row['deposit'] ?>
            </td>
            <td>
                <?php echo $row['balance'] ?>
            </td>
            <td style="text-transform:uppercase">
                <?php echo $row['staff'] ?>
            </td>
            <td style="text-transform:uppercase">
                <?php echo $row['date'] ?>
            </td>
            <td><a href="edit_debit.php?id=<?php echo $row['id'] ?>">Pay</a></td>
            <td><a href="debit_details.php?customer_name=<?php echo $row['customer_name'] ?>&customer_address=<?php echo $row['customer_address'] ?>"><i class="fa fa-eye text-primary"></i></a></td>



        </tr>
    </capital>
<?php
}
?>