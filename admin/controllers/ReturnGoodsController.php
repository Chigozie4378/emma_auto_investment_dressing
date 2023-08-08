

<?php
class ReturnGoodsController extends Controller
{

    public function displayAllReturnGoods()
    {
        return $this->fetchAll('return_goods');
    }
    public function displayEachReturnGoods()
    {
        return $this->fetchAll('return_each_goods');
    }


    public function index()
    {
        return $this->fetchAll('sales');
    }
    public function showDesc()
    {
        $date = date("d-m-Y");
        return $this->fetchWhereAndDesc('sales', "date=$date");
    }
    public function searchRecord($date)
    {

        return $this->fetchWhereLikeAnd("sales", "date=$date");
    }
    public function searchRecordInvoice($date, $invoice_no)
    {

        return $this->fetchWhereLikeAnd("sales", "date=$date", "invoice_no = $invoice_no");
    }
    public function searchSalesCustomerName($customer_name)
    {
        $date = date("d-m-Y");

        return $this->fetchWhereLikeAnd("sales", "customer_name = $customer_name", "date=$date");
    }

    public function searchSalesCustomerAddress($customer_name, $customer_address)
    {
        $date = date("d-m-Y");
        return $this->fetchWhereLikeAnd("sales", "customer_name = $customer_name", "customer_address = $customer_address", "date=$date");
    }

    public function updateSalesDetails($rem_qty, $new_amount, $productname, $invoice_no)
    {

        $this->updates(
            "sales_details",
            U::col("quantity = $rem_qty", "amount= $new_amount"),
            U::where("productname = $productname",  "invoice_no = $invoice_no")
        );
    }

    public function updateStockAfterEachReturn($return_qty, $productname)
    {
        $select_product = $this->fetchWhereAnd("stocks", "productname=$productname");
        $fetch_product = mysqli_fetch_array($select_product);
        $quantity = $fetch_product['quantity'] + $return_qty;
        $this->updates(
            "stocks",
            U::col("quantity = $quantity"),
            U::where("productname = $productname")
        );
    }

    public function updateSales($new_total, $new_balance, $invoice_no)
    {

        $this->updates(
            "sales",
            U::col("total = $new_total", "balance= $new_balance"),
            U::where("invoice_no = $invoice_no")
        );
    }

    public function deleteSalesDetailsReturn($invoice_no)
    {

        return $this->trashWhere("sales_details", "invoice_no = $invoice_no", "quantity = 0");
    }

    public function deleteSalesReturn($invoice_no)
    {

        return $this->trashWhere("sales", "invoice_no = $invoice_no", "total =0");
    }

    public function showDebit($customer_name, $customer_address)
    {
        return $this->fetchWhereAnd("debit", "customer_name = $customer_name", "customer_address = $customer_address");
    }

    public function updateDebits($total_deposit, $total_bal1, $customer_name, $customer_address)
    {

        $this->updates(
            "debit",
            U::col("deposit = $total_deposit", "balance= $total_bal1"),
            U::where("customer_name = $customer_name", "customer_address = $customer_address")
        );
    }

    public function insertDebitsDetailsReturn($customer_name, $customer_address, $debit_total, $return_amount, $total_bal1, $staff_name, $date, $comment)
    {
        $this->insert('debit_histories', $customer_name, $customer_address, "", $debit_total, $return_amount,  $total_bal1, $comment,  $staff_name, $date);
    }


    public function showReturnEach($invoice_no)
    {
        return $this->fetchWhereAnd("return_each_goods", "invoice_no = $invoice_no");
    }

    public function updateEachReturn($invoice_no, $total_return, $staff_name, $date)
    {

        $this->updates(
            "return_each_goods",
            U::col("total = $total_return", "staff= $staff_name", "date = $date"),
            U::where("invoice_no = $invoice_no")
        );
    }

    public function insertEachReturn($customer_name, $customer_address, $invoice_no, $payment_type, $return_amount, $staff_name, $date)
    {
        $this->insert('return_each_goods', $customer_name, $customer_address, $invoice_no, $payment_type, $return_amount, $staff_name, $date);
    }

    public function showReturnEachDetails($invoice_no, $productname)
    {
        return $this->fetchWhereAnd("return_goods_details", "invoice_no = $invoice_no", "productname = $productname");
    }

    public function updateEachReturnDetails($invoice_no, $productname, $quantity_return_details, $amount_return_details, $staff_name, $date)
    {

        $this->updates(
            "return_goods_details",
            U::col("quantity = $quantity_return_details", "amount= $amount_return_details", "staff = $staff_name", "date = $date"),
            U::where("invoice_no = $invoice_no", "productname = $productname")
        );
    }

    public function insertEachReturnDetails($customer_name, $customer_address, $invoice_no, $productname, $return_qty, $price, $return_amount, $staff_name, $date)
    {
        $this->insert('return_goods_details', $customer_name, $customer_address, $invoice_no, $productname, $return_qty, $price, $return_amount, $staff_name, $date);
    }


    public function viewReturn($table_name)
    {
        if (isset($_GET["invoice_no"])) {
            $invoice_no = $_GET["invoice_no"];
            $select = $this->fetchWhereAnd("return_each_goods", "invoice_no = $invoice_no");
            $result = mysqli_fetch_array($select);
            return $result["$table_name"];
        }
    }
    public function viewReturnDetail()
    {
        if (isset($_GET["invoice_no"])) {
            $invoice_no = $_GET["invoice_no"];
            return $this->fetchWhereAnd("return_goods_details", "invoice_no = $invoice_no");
        }
    }
    public function sumReturnTotal()
    {
        if (isset($_GET["invoice_no"])) {
            $invoice_no = $_GET["invoice_no"];
            return $this->fetchWhereLikeOperation('return_goods_details', 'sum', 'amount', "invoice_no=$invoice_no");
        }
    }


    public function edit()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            return $this->fetchWhereAnd("sales", "id = $id");
        }
    }

    public function update()
    {
        if (isset($_POST["update"])) {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $address = $_POST["address"];
            $phone_no = $_POST["phone_no"];
            $this->updates(
                "sales",
                U::col("name = $name", "address= $address", "phone_no= $phone_no"),
                U::where("id = $id")
            );

            header("location:test.php");
        }
    }
    public function returnAllGoods()
    {
        if (isset($_GET["invoice_no1"])) {
            $invoice = $_GET["invoice_no1"];
            $select1 = $this->fetchWhereAnd("sales", "id = $invoice");
            $row1 = mysqli_fetch_array($select1);
            $customer_name = $row1["customer_name"];
            $customer_address = $row1["customer_address"];
            $invoice_no = $row1["invoice_no"];
            $payment_type = $row1["payment_type"];
            $total = $row1["total"];
            $cash = $row1["cash"];
            $transfer = $row1["transfer"];
            $deposit = $row1["total_payment"];
            $balance = $row1["balance"];
            $date = date("d-m-Y");
            $staff =  $_SESSION["admin_firstname"] . " " . $_SESSION["admin_lastname"];
            // $new_deposit = $total + $deposit;
            // $new_balance = $balance - $total;
            // $new_balance1 = $balance - $total;
            $debit_total = 0;

            $show_debits = $this->fetchWhereAnd("debit", "customer_name = $customer_name", "customer_address = $customer_address");
            $row = mysqli_fetch_array($show_debits);
            $dbtotal_deposit = $row["deposit"];
            $dbtotal_bal = $row["balance"];
            $total_deposit = $dbtotal_deposit + $total;
            $total_bal = $dbtotal_bal - $total;
            $select2 = $this->fetchWhereAnd("sales_details", "invoice_no = $invoice_no");
            if (mysqli_num_rows($show_debits) > 0) {

                $comment = "All Goods Returned for " . $customer_name . " " . $customer_address;
                $this->insert('return_goods', $customer_name, $customer_address, $invoice_no, $payment_type, $total, $cash, $transfer, $deposit, $balance, $staff, $date);

                $this->updates(
                    "debit",
                    U::col("deposit = $total_deposit", "balance= $total_bal"),
                    U::where("customer_name = $customer_name", "customer_address = $customer_address")
                );
                $this->insert('debit_histories', $customer_name, $customer_address, $invoice_no, $debit_total, $total, $total_bal, $comment, $staff, $date);
                $this->trashWhere("debit", "balance = 0");
                $this->trashWhere("sales", "invoice_no = $invoice_no");


                while ($row2 = mysqli_fetch_array($select2)) {
                    $invoice_no1 = $row2["invoice_no"];
                    $productname = $row2["productname"];
                    $quantity = $row2["quantity"];
                    $price = $row2["price"];
                    $amount = $row2["amount"];

                    $this->insert('return_goods_details', $customer_name, $customer_address, $invoice_no1, $productname, $quantity, $price, $amount, $staff, $date);
                    $show_stock = $this->fetchWhereAnd("stocks", "productname = $productname");
                    $result_stocks = mysqli_fetch_array($show_stock);
                    $stock_qty = $result_stocks["quantity"];
                    $new_stock_qty = $stock_qty + $quantity;
                    $this->updates(
                        "stocks",
                        U::col("quantity = $new_stock_qty"),
                        U::where("productname = $productname")
                    );
                    $this->trashWhere("sales_details", "invoice_no = $invoice_no");
                }
                header("location:sales_history.php");
            } else {
                $this->insert('return_goods', $customer_name, $customer_address, $invoice_no, $payment_type, $total, $cash, $transfer, $deposit, $balance, $staff, $date);
                $this->trashWhere("debit", "balance = 0");
                $this->trashWhere("sales", "invoice_no = $invoice_no");
                while ($row2 = mysqli_fetch_array($select2)) {
                    $invoice_no1 = $row2["invoice_no"];
                    $productname = $row2["productname"];
                    $quantity = $row2["quantity"];
                    $price = $row2["price"];
                    $amount = $row2["amount"];

                    $this->insert('return_goods_details', $customer_name, $customer_address, $invoice_no1, $productname, $quantity, $price, $amount, $staff, $date);
                    $show_stock = $this->fetchWhereAnd("stocks", "productname = $productname");
                    $result_stocks = mysqli_fetch_array($show_stock);
                    $stock_qty = $result_stocks["quantity"];
                    $new_stock_qty = $stock_qty + $quantity;
                    $this->updates(
                        "stocks",
                        U::col("quantity = $new_stock_qty"),
                        U::where("productname = $productname")
                    );
                    $this->trashWhere("sales_details", "invoice_no = $invoice_no");
                }
                header("location:sales_history.php");
            }
        }
    }
    public function viewReturnInvoiceNo($invoice_no)
    {

        return $select = $this->fetchWhereLikeAnd("return_goods", "invoice_no = $invoice_no");
    }

    public function viewReturnCustomerName($customer_name)
    {

        return $select = $this->fetchWhereLikeAnd("return_goods", "customer_name = $customer_name");
    }
    public function viewReturnCustomerAddress($customer_name, $customer_address)
    {

        return $select = $this->fetchWhereLikeAnd("return_goods", "customer_name = $customer_name", "customer_address = $customer_address");
    }

    public function viewReturnEachInvoiceNo($invoice_no)
    {

        return $select = $this->fetchWhereLikeAnd("return_each_goods", "invoice_no = $invoice_no");
    }

    public function viewReturnEachCustomerName($customer_name)
    {

        return $select = $this->fetchWhereLikeAnd("return_each_goods", "customer_name = $customer_name");
    }
    public function viewReturnEachCustomerAddress($customer_name, $customer_address)
    {

        return $select = $this->fetchWhereLikeAnd("return_each_goods", "customer_name = $customer_name", "customer_address = $customer_address");
    }
}
