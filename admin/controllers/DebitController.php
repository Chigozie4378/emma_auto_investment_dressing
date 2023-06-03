<?php
class DebitController extends Controller
{
    public function displayDebitHistory()
    {
        return $this->selectDebitHistories();
    }

    public function searchDebitCustomerName($customer_name)
    {
        return $this->fetchWhereLikeAnd("debit", "customer_name = $customer_name");
    }
    public function searchDebitCustomerAddress($customer_name, $customer_address)
    {
        return $this->fetchWhereLikeAnd("debit", "customer_name = $customer_name", "customer_address = $customer_address");
    }
    public function searchDebitCustomerDate($date)
    {
        return $this->fetchWhereLikeAnd("debit", "date = $date");
    }

    public function searchDebitHistoryCustomerName($customer_name)
    {
        return $this->showDebitHistoryName($customer_name);
    }
    public function searchDebitHistoryCustomerAddress($customer_name, $customer_address)

    {
        return $this->showDebitHistoryAddress($customer_name, $customer_address);
    }
    public function displayDebit()
    {
        return $this->fetchAll('debit');
    }

    public function CheckRecord()
    {
        if (isset($_POST["check"])) {
            $customer_name = $_POST["customer_name"];
            $customer_address = $_POST["customer_address"];
            $total = $_POST["total"];
            $deposit = $_POST["deposit"];
            $balance = $_POST["balance"];
            $date = date('d-m-Y', strtotime($_POST["date"]));
            $comment = $_POST["comment"];
            Session::Name("customer_name", $customer_name);
            Session::Name("customer_address", $customer_address);
            Session::Name("total", $total);
            Session::Name("deposit", $deposit);
            Session::Name("balance", $balance);
            Session::Name("date", $date);
        }
    }
    public function addFromDebitBook()
    {
        if (isset($_POST["add"])) {
            $customer_name = $_POST["customer_name"];
            $customer_address = $_POST["customer_address"];
            $total = $_POST["total"];
            $deposit = $_POST["deposit"];
            $deposit2 = $_POST["deposit"];
            $balance = $_POST["balance"];
            $balance2 = $_POST["balance"];
            $staff = $_SESSION["admin_firstname"]." ".$_SESSION["admin_lastname"];
            $date = $_POST["date"];
            $comment = $_POST["comment"];
            // $select_debits = $this->fetchWhereAndLimit("debit", "customer_name = $customer_name", "customer_address = $customer_address");
            // $debit_row = mysqli_fetch_array($select_debits);
            // $db_deposit = $row["deposbalanceit"];
            // $db_bal = $row["balance"];
            // $total_deposit = $db_deposit + $deposit;
            // $total_bal = $db_bal + $balance;
            $select_debit = $this->fetchWhereAnd("debit",  "customer_name = $customer_name", "customer_address = $customer_address");
            if (mysqli_num_rows($select_debit) > 0) {
                $result_debit = mysqli_fetch_array($select_debit);
                $new_balance = (int)$balance+(int)$result_debit["balance"];
                $new_deposit = (int)$deposit+(int)$result_debit["deposit"];
                $new_total= (int)$total+(int)$result_debit["total"];
                // $this->updateFromDebitBook($new_total, $new_deposit, $new_balance, $customer_name, $customer_address);
                $this->updates(
                    "debit",
                    U::col("total = $new_total", "deposit= $new_deposit","balance= $new_balance"),
                    U::where("customer_name = $customer_name", "customer_address = $customer_address")
                );
                // $this->addIntoDebitDetails($customer_name, $address, $total, $deposit, $balance, $total_bal, $staff, $date, $comment);
                $this->insert('debit_histories',$customer_name, $customer_address,"", $total, $deposit, $new_balance, $comment, $staff,$date);
                // $this->deleteDebit();
                $this->trashWhere("debit", "balance = 0");
            } else {
                // $this->addDebits($customer_name, $customer_address, $total, $deposit, $balance, $staff, $date);
                $this->insert('debit',$customer_name, $customer_address, $total, $deposit, $balance, $staff, $date);
                $this->insert('debit_histories',$customer_name, $customer_address, "",$total, $deposit, $balance,  $comment, $staff,$date);
                $this->trashWhere("debit", "balance = 0");
            }
            Session::unset("customer_name");
            Session::unset("customer_address");
            Session::unset("total");
            Session::unset("deposit");
            Session::unset("balance");
            Session::unset("date");
            Session::unset("customer_name");
            echo "<script>
                document.getElementById('success').style.display='block';
                setTimeout(function(){
                    window.location = 'debit_book.php'
                 }, 3000);
                </script>";
        }
    }
}
