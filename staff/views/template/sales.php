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
<div class="container-fluid mb-2" style="height:89vh">
    <form action="" method="post">
        <div class="row mt-2 rounded">
            <div class="col-md-4 col-sm-12">
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
                                            if ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/staff/views/retail.php') { ?>
                                                <span class="price">Price: <b>#<?php echo $result['rprice'] ?></b></span>
                                                <input type="hidden" name="price<?php echo $result['product_id'] ?>" id="price<?php echo $result['product_id'] ?>" value="<?php echo $result['rprice'] ?>">
                                            <?php } elseif ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/staff/views/wholesale.php') { ?>
                                                <span class="price">Price: <b>#<?php echo $result['wprice'] ?></b></span>
                                                <input type="hidden" name="price<?php echo $result['product_id'] ?>" id="price<?php echo $result['product_id'] ?>" value="<?php echo $result['wprice'] ?>">
                                            <?php } else { ?>
                                                <span class="price">Price: <b>#<?php echo $result['cprice'] ?></b></span>
                                                <input type="hidden" name="price<?php echo $result['product_id'] ?>" id="price<?php echo $result['product_id'] ?>" value="<?php echo $result['cprice'] ?>">
                                            <?php } ?>
                                            <div class="input-group">
                                                <input type="text" id="qty<?php echo $result['product_id'] ?>" class="form-control" placeholder="<?php echo $result['quantity'] ?>" style="width:40px">
                                                <input type="hidden" id="qty_db<?php echo $result['product_id'] ?>" class="form-control" value="<?php echo $result['quantity'] ?>" style="width:40px">
                                                <span onclick="addToCart(document.getElementById('prodcut_name<?php echo $result['product_id'] ?>').value,document.getElementById('qty<?php echo $result['product_id'] ?>').value,document.getElementById('price<?php echo $result['product_id'] ?>').value,document.getElementById('qty_db<?php echo $result['product_id'] ?>').value)" class="btn btn-sm btn-primary">Add</span>
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

            <div class="col-md-5 col-sm-12">
                <div class="card cart">
                    <div class="card-body">

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
            <div class="col-md-3 col-sm-12">
                <div class="card checkout">

                    <div class="card-body">

                        <?php if ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/staff/views/retail.php') { ?>
                            <input name="customer_type" type="hidden" value="retail">
                        <?php } elseif ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/staff/views/wholesale.php') { ?>
                            <input name="customer_type" type="hidden" value="wholesales">
                        <?php } elseif ($_SERVER['PHP_SELF'] == '/emma_auto_investment_dressing/staff/views/carton.php') { ?>
                            <input name="customer_type" type="hidden" value="carton">
                        <?php } ?>


                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Title: </label>
                                    <select name="title" id="title" class="form-control" required>
                                        <option value=""></option>
                                        <option value="MR">MR</option>
                                        <option value="MRS">MRS</option>
                                        <option value="MISS">MISS</option>
                                        <option value="ALHAJI">ALHAJI</option>
                                        <option value="ALHAJA">ALHAJA</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="">Customer Name: </label>
                                    <input type="text" id="customer_name" class="form-control" name="customer_name" required>
                                </div>
                            </div>
                        </div>



                        <div class="form-froup">
                            <label for="">Customer Address: </label>
                            <input type="text" id="customer_address" name="customer_address" class="form-control" required>
                        </div>

                        <input type="hidden" id="invoice_no" name="invoice_no" class="form-control" value="<?php $ctr->invoiceNo() ?>" required readonly>

                        <div class="form-froup">
                            <label for="">Cash: </label>
                            <input class="form-control" style="width:100%;box-sizing:border-box" onkeyup="cashCalc(this.value,document.getElementById('pos').value,document.getElementById('transfer').value,document.getElementById('tot').value,document.getElementById('old_deposit').value,document.getElementById('transport').value)" onclick="this.select()" type="number" name="cash" id="cash" value="0" required>

                        </div>
                        <div class="form-froup">
                            <label for="">Transfer: </label>
                            <input class="form-control" style="width:100%;box-sizing:border-box" onkeyup="transferCalc(this.value,document.getElementById('pos').value,document.getElementById('cash').value,document.getElementById('tot').value,document.getElementById('old_deposit').value,document.getElementById('transport').value)" onclick="this.select()" onkeydown="selectBank()" type="number" name="transfer" id="transfer" value="0" required>
                            <div style="margin-top: 10px;" id="select_bank"></div>
                        </div>
                        <div class="form-group">
                            <label for="">POS: </label>
                            <input class="form-control" style="width:100%;box-sizing:border-box" onkeyup="posCalc(this.value,document.getElementById('transfer').value,document.getElementById('cash').value,document.getElementById('tot').value,document.getElementById('old_deposit').value,document.getElementById('transport').value)" onclick="this.select()" onkeydown="selectPos()" type="number" name="pos" id="pos" value="0" required>
                            <div style="margin-top: 10px;" id="select_pos"></div>
                        </div>
                        <div class="form-froup" id="old_deposit">
                            <input style="display: none;" class="form-control" style="width:100%;box-sizing:border-box" name="old_deposit" id="old_deposit" value="0" required>
                        </div>
                        <div class="form-froup" id="transportDiv">
                            <input style="display: none;" class="form-control" style="width:100%;box-sizing:border-box" name="transport" id="transport" value="0" required>
                        </div>
                        <div id="paidBal">
                            <div class="form-group">
                                <label for="">Paid: </label>
                                <input class="form-control" name="deposit" id="deposit" style="width:100%;box-sizing:border-box" type="number" readonly value="0">
                            </div>
                            <div class="form-group">
                                <label for="">Balance: </label>
                                <input class="form-control" style="width:100%;box-sizing:border-box;" type="number" name="balance" id="balance" readonly>


                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary mt-1  mb-2" name="checkout" value="Checkout">

                    </div>

                </div>
            </div>

        </div>
    </form>
</div>

</div>
<?php
$ctr->sales();
?>
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




    function selectPos() {
        const xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("select_pos").innerHTML =
                    this.responseText;
            }
        };
        xhttp.open("GET", "../../extra/checkout/select_pos.php", true);
        xhttp.send();
    }

    function selectBank() {
        const xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("select_bank").innerHTML =
                    this.responseText;
            }
        };
        xhttp.open("GET", "../../extra/checkout/select_bank.php", true);
        xhttp.send();
    }
</script>

<?php include_once "../../includes/staff/footer-links.php" ?>