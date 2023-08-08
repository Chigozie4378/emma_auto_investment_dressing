<?php
include_once "../../autoload/loader.php";
$ctr = new StockController();

$search_stock = $_POST["search"];
$select = $ctr->searchStock($search_stock);

while ($result = mysqli_fetch_array($select)) { ?>
    <tr>
        <td><?php echo ++$sn ?></td>
        <td onblur="editName('<?php echo $result['product_id'] ?>',this.textContent)" onclick="getFileName(this.textContent)" contenteditable><?php echo $result["productname"] ?></td>
        <td><img src="<?php echo $result["filepath"] ?>" onclick="showImageModal(event, '<?= $result['filepath'] ?>')" height=50 width="50" alt="item"></td>
        <td onblur="editQuantity('<?php echo $result['product_id'] ?>',this.textContent)" onclick="selectText()" contenteditable><?php echo $result["quantity"] ?></td>
        <td onblur="editWprice('<?php echo $result['product_id'] ?>',this.textContent)" onclick="selectText()" contenteditable><?php echo $result["wprice"] ?></td>
        <td onblur="editRprice('<?php echo $result['product_id'] ?>',this.textContent)" onclick="selectText()" contenteditable><?php echo $result["rprice"] ?></td>


        <td><a href="stock.php?product_id=<?php echo $result["product_id"] ?>&filepath=<?php echo $result["filepath"] ?>" class="text-danger"><i class="fa fa-trash"></i></a></td>
    </tr>
<?php }
?>