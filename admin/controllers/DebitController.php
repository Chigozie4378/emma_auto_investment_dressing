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
            $staff = $_SESSION["admin_firstname"] . " " . $_SESSION["admin_lastname"];
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
                $new_balance = (int)$balance + (int)$result_debit["balance"];
                $new_deposit = (int)$deposit + (int)$result_debit["deposit"];
                $new_total = (int)$total + (int)$result_debit["total"];
                // $this->updateFromDebitBook($new_total, $new_deposit, $new_balance, $customer_name, $customer_address);
                $this->updates(
                    "debit",
                    U::col("total = $new_total", "deposit= $new_deposit", "balance= $new_balance"),
                    U::where("customer_name = $customer_name", "customer_address = $customer_address")
                );
                // $this->addIntoDebitDetails($customer_name, $address, $total, $deposit, $balance, $total_bal, $staff, $date, $comment);
                $this->insert('debit_histories', $customer_name, $customer_address, "", $total, $deposit, $new_balance, $comment, $staff, $date);
                // $this->deleteDebit();
                $this->trashWhere("debit", "balance = 0");
            } else {
                // $this->addDebits($customer_name, $customer_address, $total, $deposit, $balance, $staff, $date);
                $this->insert('debit', $customer_name, $customer_address, $total, $deposit, $balance, $staff, $date);
                $this->insert('debit_histories', $customer_name, $customer_address, "", $total, $deposit, $balance,  $comment, $staff, $date);
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
                 }, 1000);
                </script>";
        }
    }
    public function debitEdit($tablename)
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($_GET['id']) {
                $row = mysqli_fetch_array($this->fetchWhereAnd("debit",  "id = $id"));
                echo $row["$tablename"];
            }
        }
    }
    public function invoiceNoDebit()
    {
        $select = $this->fetchAllDescLimit("sales");
        $result  = mysqli_fetch_array($select);
        $invoice_no_db = $result["invoice_no"];
        $invoice_no2 = $invoice_no_db + 1;
        $invoice_no = ltrim($invoice_no2, '0');
        $zeros = strlen($invoice_no_db) - strlen(ltrim($invoice_no_db, '0'));
        if ($zeros == 0) {
            echo "00000001";
        } else {

            if (strlen($invoice_no) == 1) {
                echo "0000000" . $invoice_no2;
            } elseif (strlen($invoice_no) == 2) {
                echo "000000" . $invoice_no2;
            } elseif (strlen($invoice_no) == 3) {
                echo "00000" . $invoice_no2;
            } elseif (strlen($invoice_no) == 4) {
                echo "0000" . $invoice_no2;
            } elseif (strlen($invoice_no) == 5) {
                echo "000" . $invoice_no2;
            } elseif (strlen($invoice_no) == 6) {
                echo "00" . $invoice_no2;
            } elseif (strlen($invoice_no) == 7) {
                echo "0" . $invoice_no2;
            } else {
                echo $invoice_no2;
            }
        }
    }
    public function debitUpdate()
    {
        if (isset($_POST["update"])) {
            $id = $_POST["id"];
            $customer_name = $_POST["customer_name"];
            $customer_address = $_POST["customer_address"];
            $date = $_POST["date"];
            $deposit = $_POST["deposit"];
            $balance = $_POST["balance"];
            $total = 0;
            $pay = $_POST["pay"];
            $comment = $_POST["comment"];
            $total_paid = $deposit + $pay;
            $new_balance = $balance - $pay;
            $staff = $_SESSION["admin_firstname"] . " " . $_SESSION["admin_lastname"];
            $settled = "SETTLED";
            $username = $_SESSION["admin_username"];
            $remark = "Old Balance Payment";
            $bill_type = "Cash (Old Balance)";
            Session::name("customer_name", $customer_name);
            Session::name("customer_address", $customer_address);
            Session::name("date", $date);
            Session::name("pay", $pay);
            Session::name("new_balance", $new_balance);
            $this->updates(
                "debit_histories",
                U::col("comments = $settled"),
                U::where("balance = 0")
            );
            $select_debit = $this->fetchWhereAnd("debit",  "customer_name = $customer_name", "customer_address = $customer_address");
            $result_debit = mysqli_fetch_array($select_debit);
            $new_balance = (int)$result_debit["balance"]-(int)$pay;
            $new_deposit = (int)$pay + (int)$result_debit["deposit"];
            $this->updates(
                "debit",
                U::col("deposit= $new_deposit", "balance= $new_balance", "staff= $staff", "date= $date"),
                U::where("customer_name = $customer_name", "customer_address = $customer_address")
            );
            $this->insert('debit_histories', $customer_name, $customer_address,"", $total, $pay, $new_balance,  $comment, $staff, $date);
            $this->trashWhere("debit", "balance = 0");
            $invoice_no = $_POST["invoice_no"];
            Session::name("invoice_no", $invoice_no);
            if ($_POST["payment_type"] == "cash") {
                $fetch_last_invoice_no = $this->fetchAllDescLimit("sales");
                $get  = mysqli_fetch_array($fetch_last_invoice_no);
                $invoice_no_db = $get["invoice_no"];
                $add_invoice_no = $invoice_no_db + 1;
                $invoice_no3 = ltrim($add_invoice_no, '0');
                if (strlen($invoice_no3) == 1) {
                    $invoice_no2 =  "0000000" . $add_invoice_no;
                } elseif (strlen($invoice_no3) == 2) {
                    $invoice_no2 =  "000000" . $add_invoice_no;
                } elseif (strlen($invoice_no3) == 3) {
                    $invoice_no2 =  "00000" . $add_invoice_no;
                } elseif (strlen($invoice_no3) == 4) {
                    $invoice_no2 =  "0000" . $add_invoice_no;
                } elseif (strlen($invoice_no3) == 5) {
                    $invoice_no2 =  "000" . $add_invoice_no;
                } elseif (strlen($invoice_no3) == 6) {
                    $invoice_no2 =  "00" . $add_invoice_no;
                } elseif (strlen($invoice_no3) == 7) {
                    $invoice_no2 =  "0" . $add_invoice_no;
                } else {
                    $invoice_no2 =  $add_invoice_no;
                }
                Session::name("invoice_no", $invoice_no2);
                $transport = 0;
                $fetch = $this->fetchWhereAnd("sales",  "invoice_no = $invoice_no");
                
                if (mysqli_num_rows($fetch) > 0) {
                    $this->insert('sales', $customer_name, $customer_address, $invoice_no2,  $remark, $bill_type, $total,  "Nill", "Nill", "Nill", "Nill", $pay, "Nill", $new_balance, $staff, $date, $username);
                    $this->insert("sales_details", $invoice_no2, "Old Balance", "Old Balance", "", $pay);
                } else {
                    $this->insert('sales', $customer_name, $customer_address, $invoice_no,  $remark, $bill_type, $total,  "Nill", "Nill", "Nill", "Nill", $pay, "Nill", $new_balance, $staff, $date, $username);
                    $this->insert("sales_details", $invoice_no, "Old Balance", "Old Balance", "", $pay);
                }

                echo "<script>
                document.getElementById('update').style.display='block';
                setTimeout(function(){
                    window.location = '../print/director/debit.php'
                 }, 1000);
                    </script>";
            } else {
                echo "<script>
                document.getElementById('update').style.display='block';
                setTimeout(function(){
                    window.location = 'debit.php'
                 }, 1000);
                    </script>";
            }
        }
    }
    public function viewDebit()
    {
        if (isset($_GET["customer_name"]) && $_GET["customer_address"]) {
            $customer_name = $_GET["customer_name"];
            $customer_address =  $_GET["customer_address"];
            $select =  $this->fetchWhereAnd("debit_histories",  "customer_name = $customer_name", "customer_address = $customer_address");
            return $select;
        }
    }
    public function checkDebit()
    {
        if (isset($_GET["customer_name"]) && $_GET["customer_address"]) {
            $customer_name = $_GET["customer_name"];
            $customer_address =  $_GET["customer_address"];
            $select =  $this->fetchWhereAnd("debit",  "customer_name = $customer_name", "customer_address = $customer_address");
            return $select;
        }
    }
}
