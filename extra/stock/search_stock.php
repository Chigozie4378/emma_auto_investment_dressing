<?php
include_once "../../autoload/loader.php";
$ctr = new StockController();
$data = $_POST["search"];
$select = $ctr->show($data);
    if (mysqli_num_rows($select) >0){
    while ($result = mysqli_fetch_array($select)) { ?>
        <div class="col-md-4 p-0">
            <div class="card" style="width:100%">
                <img class="card-img-top" src="<?php echo $result['filepath'] ?>" alt="Card image" height="150">
                <div class="card-body" style=" height:130px;">
                    <span class="name"><?php echo $result['productname'] ?></span>
                    <input type="hidden" name="product_name1" id="prodcut_name<?php echo $result['product_id'] ?>" value="<?php echo $result['productname'] ?>">

                    <span class="price">Price: <b>#<?php echo $result['rprice'] ?></b></span>
                    <input type="hidden" name="price<?php echo $result['product_id'] ?>" id="price<?php echo $result['product_id'] ?>" value="<?php echo $result['rprice'] ?>">
                    <div class="input-group">
                        <input type="text" id="qty<?php echo $result['product_id'] ?>" class="form-control" placeholder="<?php echo $result['quantity'] ?>" style="width:40px">
                        <input type="hidden" id="qty_db<?php echo $result['product_id'] ?>" class="form-control" value="<?php echo $result['quantity'] ?>" style="width:40px">
                        <button onclick="addToCart(document.getElementById('prodcut_name<?php echo $result['product_id'] ?>').value,document.getElementById('qty<?php echo $result['product_id'] ?>').value,document.getElementById('price<?php echo $result['product_id'] ?>').value,document.getElementById('qty_db<?php echo $result['product_id'] ?>').value)" class="btn btn-sm btn-primary">Add</span>
                    </div>
                </div>
            </div>

        </div>
<?php }
}else{
   echo "<p class='text-primary'>No Result Found!</p>"; 
}
?>
