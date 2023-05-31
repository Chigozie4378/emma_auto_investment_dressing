<?php
session_start();
?>


<?php
$id = 1;
$qty_found = 0;
$max = 0;
$quantity_session = 0;
$total = 0;

if (isset($_SESSION["cart"])) {
    $max = sizeof($_SESSION['cart']);
}

for ($i = 0; $i < $max; $i++) {
    $productname_session = "";

    if (isset($_SESSION['cart'][$i])) {
        foreach ($_SESSION["cart"][$i] as $key => $val) {
            if ($key == "productname") {
                $productname_session = $val;
            } elseif ($key == "quantity") {
                $quantity_session = $val;
            } elseif ($key == "price") {
                $price_session = $val;
            }
        }

        $total = $total + (int)$quantity_session * (int)$price_session;
        $amount = (int)$quantity_session * (int)$price_session;
        if (!empty($productname_session)) {
?>
            <tr>
                <td><?php echo $id++ ?></td>
                <td> <input style="width:80px" type="number" class="form-control" id="qty<?php echo $i ?>" value="<?php echo $quantity_session ?>" onchange="updateQty(document.getElementById('qty<?php echo $i ?>').value,'<?php echo $productname_session ?>','<?php echo $price_session ?>')" autofocus></td>
                <td><?php echo $productname_session ?></td>
                <td><?php echo $price_session ?></td>
                <td><?php echo $amount ?></td>
                <td><i style="cursor:pointer; color:red;" onclick="deleteItem('<?php echo $i ?>')" class="fas fa-trash"></i>
                </td>
            </tr>

<?php
        }
    }
}
?>




<tr>
    <td colspan="4">
        <p style="float:right;font-weight:bold">Total Amount: # </p>
    </td>
    <td>
        <p style="font-weight:bold"><span id="total"><?php echo  number_format($total, 2); ?></span></p>
    </td>


    <input type="hidden" name="tot" id="tot" value="<?php echo $total ?>">

    <td></td>

</tr>
<tr>
    <td colspan="2"><label for="check">Check Deposit </label> <input type="checkbox" name="" id="check" onpointerout="cashCalc(this.value,document.getElementById('pos').value,document.getElementById('transfer').value,document.getElementById('tot').value,document.getElementById('old_deposit').value)" onclick="checkDeposit(document.getElementById('title').value,document.getElementById('customer_name').value,document.getElementById('address').value)"></td>
    <td colspan="3"><label for="check">Add Transport </label> <input type="checkbox" name="" id="add_transport" onclick="addTransport()"></td>
    <td colspan="3"></td>
</tr>