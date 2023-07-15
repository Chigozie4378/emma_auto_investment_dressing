

<?php
class ReturnGoodsController extends Controller
{


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
            $select1 = $this->showInvoiceSales($invoice);
            $row1 = mysqli_fetch_array($select1);
            $customer_name = $row1["customer_name"];
            $address = $row1["address"];
            $invoice_no = $row1["invoice_no"];
            $payment_type = $row1["payment_type"];
            $total = $row1["total"];
            $cash = $row1["cash"];
            $transfer = $row1["transfer"];
            $deposit = $row1["deposit"];
            $balance = $row1["balance"];
            $date = date("d-m-Y");
            $staff = $_SESSION['directorfullname'];
            // $new_deposit = $total + $deposit;
            // $new_balance = $balance - $total;
            // $new_balance1 = $balance - $total;
            $debit_total = 0;

            $show_debits = $this->showDebitTotalPaidTotalBal($customer_name, $address);
            $row = mysqli_fetch_array($show_debits);
            $dbtotal_deposit = $row["deposit"];
            $dbtotal_bal = $row["balance"];
            $total_deposit = $dbtotal_deposit + $total;
            $total_bal1 = $dbtotal_bal - $total;
            $total_bal2 = $dbtotal_bal - $total;


            if (mysqli_num_rows($show_debits) > 0) {

                $comment = "All Goods Returned for " . $customer_name . " " . $address;
                $this->insertAllReturn($customer_name, $address, $invoice_no, $payment_type, $total, $cash, $transfer, $deposit, $balance, $staff, $date);
                $this->updateReturnDebits($total_deposit, $total_bal1, $customer_name, $address);
                $this->insertReturnDebitsDetails($customer_name, $address, $debit_total, $total, $total_deposit, $total_bal1, $total_bal2, $staff, $date, $comment);
                $this->deleteDebit();
                $this->deletesales($invoice);

                $select2 = $this->showInvoiceSalesDetails($invoice);
                while ($row2 = mysqli_fetch_array($select2)) {
                    $invoice_no1 = $row2["invoice_no"];
                    $customer_name1 = $row2["customer_name"];
                    $address1 = $row2["address"];
                    $productname = $row2["product_name"];
                    $model = $row2["model"];
                    $manufacturer = $row2["manufacturer"];
                    $quantity = $row2["quantity"];
                    $price = $row2["price"];
                    $amount = $row2["amount"];
                    $date1 = $row2["date"];

                    $this->insertAllReturnDetails($customer_name1, $address1, $invoice_no1, $productname, $model, $manufacturer, $quantity, $price, $amount, $staff, $date1);
                    $this->updateReturnGoodsQty($quantity, $productname, $model, $manufacturer);
                    $this->deletesalesDetails($invoice);
                }
                header("location:sales_history.php");
            } else {
                $this->insertAllReturn($customer_name, $address, $invoice_no, $payment_type, $total, $cash, $transfer, $deposit, $balance, $staff, $date);
                $this->deleteDebit();
                $this->deletesales($invoice);
                $select2 = $this->showInvoiceSalesDetails($invoice);
                while ($row2 = mysqli_fetch_array($select2)) {
                    $invoice_no1 = $row2["invoice_no"];
                    $customer_name1 = $row2["customer_name"];
                    $address1 = $row2["address"];
                    $productname = $row2["product_name"];
                    $model = $row2["model"];
                    $manufacturer = $row2["manufacturer"];
                    $quantity = $row2["quantity"];
                    $price = $row2["price"];
                    $amount = $row2["amount"];
                    $date1 = $row2["date"];

                    $this->insertAllReturnDetails($customer_name1, $address1, $invoice_no1, $productname, $model, $manufacturer, $quantity, $price, $amount, $staff, $date1);
                    $this->updateReturnGoodsQty($quantity, $productname, $model, $manufacturer);
                    $this->deletesalesDetails($invoice);
                }
                header("location:sales_history.php");
            }
        }
    }
}
