<?php
class StockController extends Controller
{
    public function index()
    {
        return $this->fetchAll('stocks');
    }

    public function store()
    {
        if (isset($_POST["upload"])) {
            ini_set('max_execution_time', 5000);
            ini_set('max_file_uploads',600);
            ini_set('max_input_time', 5000);
            ini_set('upload_max_filesize', '1000M');
            ini_set('post_max_size', '1000M');
            ini_set('memory_limit', '3560M');
            $quantity = 0;
            $rprice = 0;
            $wprice = 0;
            $cprice = 0;
            $target_dir = "../../stocks/"; // directory to store the uploaded files
            $allowed_types = array("image/jpeg", "image/png", "image/gif");

            foreach ($_FILES['files']['name'] as $i => $name) {
                $type = $_FILES['files']['type'][$i];

                if (empty($name)) {
                    echo "You must select a file";
                    continue; // skip if no file was selected
                }

                if (!in_array($type, $allowed_types)) {
                    echo "Sorry, only JPG, PNG, and GIF files are allowed for file " . htmlspecialchars($name) . "<br>";
                    continue;
                }

                $target_file = $target_dir . basename($name);
                if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)) {
                    // Generate a unique ID
                    do {
                        $unique_id = uniqid();
                        $hash = md5($unique_id);
                        $product_id = substr($hash, 0, 15);

                        // Check if the ID already exists in the database
                        $row = $this->fetchWhereAnd("stocks", "product_id = $product_id");
                    } while (mysqli_num_rows($row) > 0);
                   
                    $this->insert('stocks', $product_id, pathinfo($_FILES['files']['name'][$i], PATHINFO_FILENAME) , $target_file, $quantity, $rprice, $wprice, $cprice);
                    header("location:stock.php");
                } else {
                    echo "Sorry, there was an error uploading " . htmlspecialchars($name) . "<br>";
                }
            }
        }
    }

    public function show($data){
        return $this->fetchWhereLikeOr("stocks", "productname = $data");
    }
    public function delete()
    {
        if (isset($_GET["product_id"])) {
            $product_id = $_GET["product_id"];
            $filepath = $_GET["filepath"];
            unlink($filepath);
            return $this->trashWhere("stocks", "product_id = $product_id");
        }
    }
    public function updateQty($quantity, $product_id)
    {

        $this->updates(
            "stocks",
            U::col("quantity = $quantity"),
            U::where("product_id = $product_id")
        );
    }
    public function updateRprice($rprice, $product_id)
    {

        $this->updates(
            "stocks",
            U::col("rprice = $rprice"),
            U::where("product_id = $product_id")
        );
    }
    public function updatewprice($wprice, $product_id)
    {

        $this->updates(
            "stocks",
            U::col("wprice = $wprice"),
            U::where("product_id = $product_id")
        );
    }
    public function updateName($new_name, $product_id)
    {

        $this->updates(
            "stocks",
            U::col("productname = $new_name"),
            U::where("product_id = $product_id")
        );
    }
    public function searchStock($search_stock)
    {

        return $this->fetchWhereLikeAnd("stocks", "productname = $search_stock");
    }
}
