<?php include_once "../../includes/staff/header.php";
$ctr = new SalesController();

?>
<style>
    .scroll {
        height: 75vh;
        overflow-y: scroll;
        /* Add the ability to scroll */
    }

    /* Hide scrollbar for Chrome, Safari and Opera */
    .scroll::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .scroll {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }

    .checkout {
        height: 80vh;
        overflow-y: scroll;
        /* Add the ability to scroll */
    }

    /* Hide scrollbar for Chrome, Safari and Opera */
    .checkout::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .checkout {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }

    .cart {
        height: 80vh;
        overflow-y: scroll;
        /* Add the ability to scroll */
    }

    /* Hide scrollbar for Chrome, Safari and Opera */
    .cart::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .cart {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }


    .name {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* 
    .name {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        position: relative;
    } */
</style>
<?php include_once "../../includes/staff/navbar.php" ?>
<div class="container-fluid" style="height:79vh">
    <div class="row mt-2 rounded">
        <div class="col-md-4">
            <div class="row mb-2">
                <div class="col-md-9">
                    <div class="input-group" style="cursor:pointer">
                        <input type="text" class="form-control" placeholder="Search Item" onkeyup="searchStock(this.value)">
                        <span class="input-group-text">Search</span>
                    </div>
                </div>
            </div>
            <div class="scroll p-3">
                <div class="row" id="stock">
                    <?php
                    // Define the starting and ending positions of the results
                    $limit = 10; // Number of results to fetch
                    $select = $ctr->index();
                    for ($i = 0; $i < $limit; $i++) {

                        while ($result = mysqli_fetch_array($select)) { ?>
                            <div class="col-md-4 p-0">
                                <div class="card" style="width:100%">
                                    <img class="card-img-top" src="<?php echo $result['filepath'] ?>" alt="Card image" height="150">
                                    <div class="card-body" style=" height:130px;">
                                        <span class="name"><?php echo $result['productname'] ?></span>
                                        <input type="hidden" name="product_name1" id="prodcut_name<?php echo $result['product_id'] ?>" value="<?php echo $result['productname'] ?>">
                                        <?php 
                                        if ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/staff/views/retail.php'){?>
<span class="price">Price: <b>#<?php echo $result['rprice'] ?></b></span>
                                        <input type="hidden" name="price<?php echo $result['product_id'] ?>" id="price<?php echo $result['product_id'] ?>" value="<?php echo $result['rprice'] ?>">
                                       <?php }elseif($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/staff/views/wholesale.php'){?>
                                        <span class="price">Price: <b>#<?php echo $result['wprice'] ?></b></span>
                                        <input type="hidden" name="price<?php echo $result['product_id'] ?>" id="price<?php echo $result['product_id'] ?>" value="<?php echo $result['wprice'] ?>">
                                       <?php }else{?>
                                        <span class="price">Price: <b>#<?php echo $result['cprice'] ?></b></span>
                                        <input type="hidden" name="price<?php echo $result['product_id'] ?>" id="price<?php echo $result['product_id'] ?>" value="<?php echo $result['cprice'] ?>">
                                       <?php }?>
                                        <div class="input-group">
                                            <input type="text" id="qty<?php echo $result['product_id'] ?>" class="form-control" placeholder="<?php echo $result['quantity'] ?>" style="width:40px">
                                            <input type="hidden" id="qty_db<?php echo $result['product_id'] ?>" class="form-control" value="<?php echo $result['quantity'] ?>" style="width:40px">
                                            <button onclick="addToCart(document.getElementById('prodcut_name<?php echo $result['product_id'] ?>').value,document.getElementById('qty<?php echo $result['product_id'] ?>').value,document.getElementById('price<?php echo $result['product_id'] ?>').value,document.getElementById('qty_db<?php echo $result['product_id'] ?>').value)" class="btn btn-sm btn-primary">Add</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                    <?php }
                    }
                    ?>
                </div>

            </div>
        </div>
        <div class="col-md-5">
            <div class="card cart">
                <div class="card-body">
                    <form action="" method="post">
                        <table class="table table-hover">
                            <thead>
                                <th>S/N</th>
                                <th>Qty</th>
                                <th>Product Name</th>
                                <th>Unit</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="cart">

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card checkout">
                <div class="card-body">

                    <div class="form-inline">
                        <label for="">Customer Name: </label>
                        <div class="row">
                            <div class="col-md-3">
                                <select name="title" id="title" class="form-control" required>
                                    <option value=""></option>
                                    <option value="MR">MR</option>
                                    <option value="MRS">MRS</option>
                                    <option value="MISS">MISS</option>
                                    <option value="ALHAJI">ALHAJI</option>
                                    <option value="ALHAJA">ALHAJA</option>
                                </select>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="customer_name" class="form-control" name="customer_name" required>
                            </div>
                        </div>


                    </div>
                    <div class="form-froup">
                        <label for="">Customer Address: </label>
                        <input type="text" id="customer_address" name="customer_address" class="form-control" required>
                    </div>
                    <div class="form-froup d-none">
                        <label for="">Invoice No: </label>
                        <input type="text" id="invoice_no" name="invoice_no" class="form-control" value="23323234" required readonly>
                    </div>
                    <div class="form-froup">
                        <label for="">Cash: </label>
                        <input class="form-control" style="width:100%;box-sizing:border-box" onkeyup="cashCalc(this.value,document.getElementById('pos').value,document.getElementById('transfer').value,document.getElementById('tot').value,document.getElementById('old_deposit').value,document.getElementById('transport').value)" onclick="this.select()" type="number" name="cash" id="cash" value="0" required>
                        <div class="form-group mt-2">
                        </div>
                        <div class="form-froup">
                            <label for="">Transfer: </label>
                            <input class="form-control" style="width:100%;box-sizing:border-box" onkeyup="transferCalc(this.value,document.getElementById('pos').value,document.getElementById('cash').value,document.getElementById('tot').value,document.getElementById('old_deposit').value,document.getElementById('transport').value)" onclick="this.select()" type="number" name="transfer" id="transfer" value="0" required>
                            <!-- The Modal -->
                            <div class="modal fade" id="banks">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" style="position:absolute; right:300px;">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Select Bank</h4>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <select class="form-control" name="bank" id="">
                                                <option value="" disabled selected>Select Bank</option>
                                                <option value="First Bank">First Bank</option>
                                                <option value="UBA">UBA</option>
                                                <option value="Zenith Bank">Zenith Bank</option>
                                                <option value="Polaris Bank">Polaris Bank</option>
                                                <option value="Sterling Bank">Sterling Bank</option>
                                            </select>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-froup">
                            <label for="">POS: </label>
                            <input class="form-control" style="width:100%;box-sizing:border-box" onkeyup="posCalc(this.value,document.getElementById('transfer').value,document.getElementById('cash').value,document.getElementById('tot').value,document.getElementById('old_deposit').value,document.getElementById('transport').value)" onclick="this.select()" type="number" name="pos" id="pos" value="0" required>
                            <!-- The Modal -->
                            <div class="modal fade" id="select_pos">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" style="position:absolute; right:300px;">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Select Bank</h4>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <select class="form-control" name="pos_type" id="pos_type" required>
                                                <option value="" disabled selected>Select POS</option>
                                                <option value="Opay"> Opay</option>
                                                <option value="Monie Point">Monie Point</option>
                                            </select>
                                            <div class="form-inline">
                                                <label for="">Charges</label>
                                                <input type="radio" name="pos_charges" id="pos_charges" onclick="addCharges(this.value,document.getElementById('transfer').value,document.getElementById('pos').value,document.getElementById('cash').value,document.getElementById('tot').value,document.getElementById('old_deposit').value,document.getElementById('transport').value)" value="50"> <label for="">50</label>
                                                <input type="radio" name="pos_charges" id="pos_charges" onclick="addCharges(this.value,document.getElementById('transfer').value,document.getElementById('pos').value,document.getElementById('cash').value,document.getElementById('tot').value,document.getElementById('old_deposit').value,document.getElementById('transport').value)" value="100"> <label for="">100</label>
                                            </div>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-froup" id="old_deposit">
                            <input style="display: none;" class="form-control" style="width:100%;box-sizing:border-box" name="old_deposit" id="old_deposit" value="0" required>
                        </div>
                        <div class="form-froup" id="transportDiv">
                            <input style="display: none;" class="form-control" style="width:100%;box-sizing:border-box" name="transport" id="transport" value="0" required>
                        </div>
                        <div id="paidBal">
                            <div class="form-froup">
                                <label for="">Paid: </label>
                                <input class="form-control" name="deposit" id="deposit" style="width:100%;box-sizing:border-box" type="number" readonly value="0">
                            </div>
                            <div class="form-froup">
                                <label for="">Balance: </label>
                                <input class="form-control" style="width:100%;box-sizing:border-box;" type="number" name="balance" id="balance" value="<?php echo $total ?>" readonly>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary mt-1" name="checkout" value="Checkout">
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
<?php include_once "../../includes/staff/footer.php" ?>
<script src="../../extra/cart/cart.js"></script>
<script src="../../extra/checkout/checkout.js"></script>
<script src="../../extra/stock/search_stock.js"></script>
<script>
    // Get all elements with the "name" class
    var nameElements = document.querySelectorAll('.name');

    // Loop through each element and add a line break if needed
    nameElements.forEach(function(nameElement) {
        var name_text = nameElement.textContent;
        var name_length = name_text.length;

        if (name_length < 20) {
            nameElement.insertAdjacentHTML('afterend', '<br>');
        }
    });


    var typingTimer;
    var doneTypingInterval = 900;

    function selectBank() {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(showBanks, doneTypingInterval);
    }

    function showBanks() {
        $('#banks').modal('show');
    }

    function selectPos() {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(showPos, doneTypingInterval);
    }

    function showPos() {
        $('#select_pos').modal('show');
    }
</script>