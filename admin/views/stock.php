<?php include_once "../../includes/admin/header.php";
$ctr = new StockController();
$ctr->delete();
?>

<style>
    .border:hover {
        background-color: rgb(73, 41, 231);
    }
</style>
<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <table class="table  table-hover">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Product name</th>
                        <th>Picture</th>
                        <th>Quantity</th>
                        <th>Wholesale Price</th>
                        <th>Retail Price</th>

                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select = $ctr->index();
                    while ($result = mysqli_fetch_array($select)) { ?>
                        <tr>
                            <td><?php echo ++$sn ?></td>
                            <td onblur="editName('<?php echo $result['product_id'] ?>',this.textContent)" onclick="getFileName(this.textContent)" contenteditable><?php echo $result["productname"] ?></td>
                            <td><img src="<?php echo $result["filepath"] ?>" height=50 width="50" alt="item"></td>
                            <td onblur="editQuantity('<?php echo $result['product_id'] ?>',this.textContent)" onclick="selectText()" contenteditable><?php echo $result["quantity"] ?></td>
                            <td onblur="editWprice('<?php echo $result['product_id'] ?>',this.textContent)" onclick="selectText()" contenteditable><?php echo $result["wprice"] ?></td>
                            <td onblur="editRprice('<?php echo $result['product_id'] ?>',this.textContent)" onclick="selectText()" contenteditable><?php echo $result["rprice"] ?></td>

                            <td><a href="show_stock.php?product_id=<?php echo $result["product_id"] ?>"><i class="fa fa-eye"></i></a></td>
                            <td><a href="stock.php?product_id=<?php echo $result["product_id"] ?>&filepath=<?php echo $result["filepath"] ?>" class="text-danger"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>

            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="delete">

    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-danger">Delete Item!</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <p>Are you sure you want to delete this item</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-danger btn-sm" href="stock.php?product_id=<?php echo $result["product_id"] ?>">Delete</a>
            </div>

        </div>
    </div>
</div>

<?php include_once "../../includes/admin/footer.php" ?>
<script src="../../extra/stock/stock.js"></script>