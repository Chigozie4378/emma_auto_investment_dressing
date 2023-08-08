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
            <div class="row">
                <div class="col-md-12 d-print-none">
                    <div class="form-inline">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="search_stock" onkeyup="searchStock(this.value)" placeholder="Search Product">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <table class="table  table-hover">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Product name</th>
                        <th>Picture</th>
                        <th>Quantity</th>
                        <th>Wholesale Price</th>
                        <th>Retail Price</th>

                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody id = "stock">
                    <?php
                    $select = $ctr->index();
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
                </tbody>

            </table>
        </div>
    </div>
</div>
<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" alt="Card image" style="width: 100%;">
            </div>
        </div>
    </div>
</div>

<?php include_once "../../includes/admin/footer.php" ?>
<script src="../../extra/stock/stock.js"></script>

<script>
    function showImageModal(event, imagePath) {
        // Set the source of the image in the modal
        document.getElementById('modalImage').src = imagePath;

        // Show the modal
        $('#imageModal').modal('show');

        // Disable the carousel controls
        document.getElementById('carouselPrev').style.pointerEvents = 'none';
        document.getElementById('carouselNext').style.pointerEvents = 'none';
    }

    // Listen for the hidden.bs.modal event to re-enable the carousel controls
    $('#imageModal').on('hidden.bs.modal', function() {
        document.getElementById('carouselPrev').style.pointerEvents = 'auto';
        document.getElementById('carouselNext').style.pointerEvents = 'auto';
    });

    function searchStock(value) {
        $(document).ready(function() {
            var search = value;
            $.ajax({
                url: "../../extra/stock/search_stock2.php",
                method: "POST",
                data: {
                    search: search
                },
                success: function(data) {
                    $("#stock").html(data);
                }
            });

        });

    }
</script>