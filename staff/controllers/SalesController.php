<?php
class SalesController extends Controller
{
    public function checkQty($productname)
    {
        return $this->fetchWhereAnd("stocks", "productname = $productname");
    }
    public function index()
    {
        return $this->fetchAll("stocks");
    }
    public function invoiceNo()
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
    public function sales()
    {
        if (isset($_POST["checkout"])) {
            if (isset($_SESSION["cart"])) {
                $this->lockInvoice();
                // sales
                $customer_type = $_POST["customer_type"];
                $title = $_POST["title"];
                $customer_name = $title . " " . $_POST["customer_name"];
                $customer_address = $_POST["customer_address"];
                
                $transport = $_POST["transport"];
                $old_deposit = $_POST['old_deposit'];
                $invoice_no = $_POST["invoice_no"];
                $_SESSION["customer_name"] = $customer_name;
                $_SESSION["address"] = $customer_address;

                $date = date("d-m-Y");
                $cash = $_POST["cash"];
                $transfer = $_POST["transfer"];
                $pos = $_POST["pos"];
               
                $deposit = $_POST["deposit"];
                $balance = $_POST["balance"];
                $total = $_POST["tot"];
                // $staff = $_SESSION["stafffullname"];
                // $username = $_SESSION["staffusername"];hi
                $staff = "hi name";
                $username = "username";
                $status = "pending";
                if ($_POST["cash"] == 0 && $_POST["transfer"] == 0 && $_POST["pos"] == 0 && $_POST["balance"] != 0) {
                    $bill_type = "Debit";
                } elseif ($_POST["cash"] == 0 && $_POST["transfer"] != 0 && $_POST["pos"] == 0 && $_POST["balance"] == 0) {
                    $bill_type = "Transfer";
                } elseif ($_POST["cash"] != 0 && $_POST["transfer"] == 0 && $_POST["pos"] == 0 && $_POST["balance"] == 0) {
                    $bill_type = "Cash";
                } elseif ($_POST["cash"] == 0 && $_POST["transfer"] == 0 && $_POST["pos"] != 0 && $_POST["balance"] == 0) {
                    $bill_type = "POS";
                } elseif ($_POST["cash"] != 0 && $_POST["transfer"] != 0 && $_POST["pos"] == 0 && $_POST["balance"] == 0) {
                    $bill_type = "Cash/Transfer";
                } elseif ($_POST["cash"] != 0 && $_POST["transfer"] == 0 && $_POST["pos"] != 0 && $_POST["balance"] == 0) {
                    $bill_type = "Cash/POS";
                } elseif ($_POST["cash"] != 0 && $_POST["transfer"] == 0 && $_POST["pos"] == 0 && $_POST["balance"] != 0) {
                    $bill_type = "Cash/Debit";
                } elseif ($_POST["cash"] != 0 && $_POST["transfer"] != 0 && $_POST["pos"] != 0 && $_POST["balance"] == 0) {
                    $bill_type = "Cash/Transfer/POS";
                } elseif ($_POST["cash"] != 0 && $_POST["transfer"] == 0 && $_POST["pos"] != 0 && $_POST["balance"] != 0) {
                    $bill_type = "Cash/POS/Debit";
                } elseif ($_POST["cash"] != 0 && $_POST["transfer"] != 0 && $_POST["pos"] == 0 && $_POST["balance"] != 0) {
                    $bill_type = "Cash/Transfer/Debit";
                } elseif ($_POST["cash"] != 0 && $_POST["transfer"] != 0 && $_POST["pos"] != 0 && $_POST["balance"] != 0) {
                    $bill_type = "Cash/Transfer/POS/Debit";
                } elseif ($_POST["cash"] == 0 && $_POST["transfer"] != 0 && $_POST["pos"] != 0 && $_POST["balance"] == 0) {
                    $bill_type = "Transfer/POS";
                } elseif ($_POST["cash"] == 0 && $_POST["transfer"] != 0 && $_POST["pos"] == 0 && $_POST["balance"] != 0) {
                    $bill_type = "Transfer/Debit";
                } elseif ($_POST["cash"] == 0 && $_POST["transfer"] != 0 && $_POST["pos"] != 0 && $_POST["balance"] != 0) {
                    $bill_type = "Transfer/POS/Debit";
                } elseif ($_POST["cash"] == 0 && $_POST["transfer"] == 0 && $_POST["pos"] != 0 && $_POST["balance"] != 0) {
                    $bill_type = "POS/Debit";
                }

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


                // deposit
                if ($_POST['old_deposit'] != 0) {
                    $select_deposit = $this->fetchWhereAnd('deposit', "customer_name = $customer_name", "customer_address = $customer_address");
                    $result_deposit = mysqli_fetch_array($select_deposit);
                    $deposit_invoice_no = $result_deposit["invoice_no"];
                    $this->deleteWhere("sales", "invoice_no = $deposit_invoice_no");
                    $this->deleteWhere("sales_histories", "invoice_no = $deposit_invoice_no");
                    // $this->deleteDeposit($customer_name, $customer_address);
                    // $this->deleteDepositDetails($customer_name, $customer_address);
                }
                // sales
                $fetch_invoice_no = $this->fetchWhereAnd("sales", "invoice_no = $invoice_no");
                if (mysqli_num_rows($fetch_invoice_no) > 0) {
                    $_SESSION["invoice"] = $invoice_no2;
                    if (!(empty($_POST["bank"]))) {
                        $bank_name = $_POST["bank"];
                        $this->insert("transfer", $bank_name, $invoice_no2, $transfer, $staff, $date);
                    }
                    
                    if (!((empty($_POST["pos_type"])) && (empty($_POST["pos_charges"])))) {
                        $pos_charges = $_POST["pos_charges"];
                        $pos_type = $_POST["pos_type"];
                        $this->insert('pos', $pos_type, $invoice_no2, $pos, $pos_charges, $staff, $date);
                    }
                  
                    $this->insert('sales', $customer_name, $customer_address, $invoice_no2,  $customer_type, $bill_type, $total, $cash, $transfer, $pos, $old_deposit, $deposit, $transport, $balance, $staff, $date, $username);

                    // debit 
                    $comment = "New Goods Bought";
                    $debit_row = mysqli_num_rows($this->fetchWhereAnd("debit", "customer_name=$customer_name", "customer_address=$customer_address"));
                    $debit_history = mysqli_fetch_array($this->fetchWhereAndLimit("debit_histories", "customer_name=$customer_name", "customer_address=$customer_address"));
                    // $balancedb = $debit_history["total_balance"];
                    // $depositdb = $debit_history["deposit"];
                    // $prev_total_paid = $debit_history["total_paid"];
                    // $total_paid = $deposit + $prev_total_paid;
                    // $new_balance = $balance + $balancedb;
                    $select_debit =  $this->fetchWhereAnd("debit", "customer_name = $customer_name", "customer_address = $customer_address");
                    $result_debit = mysqli_fetch_array($select_debit);
                    $prev_bal = $result_debit['balance'];
                    $new_balance1 = $prev_bal + $balance;
                    $prev_deposit = $result_debit['deposit'];
                    $new_deposit = $prev_deposit + $deposit;
                    $prev_total = $result_debit['total'];
                    $new_total = $prev_total + $total;
                    if ($balance != 0) {
                        if ($customer_name != "MR Sir" && $customer_address != "Address") {
                            if ($debit_row > 0) {

                                $this->updates(
                                    "debit",
                                    U::col("total = $new_total", "deposit= $new_deposit", "balance= $new_balance1", "staff = $staff", "date = $date"),
                                    U::where("customer_name = $customer_name", "customer_address = $customer_address")
                                );
                                $this->insert("debit_histories", $customer_name, $customer_address, $invoice_no2, $total, $deposit, $new_balance1, $comment, $staff, $date);
                            } else {
                                $this->insert("debit", $customer_name, $customer_address, $total, $deposit, $balance, $staff, $date);
                                $this->trashWhere("debit", "balance = 0");
                                $this->insert("debit_histories", $customer_name, $customer_address, $invoice_no2, $total,  $deposit, $new_balance1, $comment, $staff, $date);
                            }
                        }
                    }
                    $id = 1;
                    $qty_found = 0;
                    $max = 0;
                    $quantity_session = 0;
                    if (isset($_SESSION["cart"])) {
                        $max = sizeof($_SESSION['cart']);
                    }

                    for ($i = 0; $i < $max; $i++) {
                        $productname_session = "";

                        if (isset($_SESSION['cart'][$i])) {
                            foreach ($_SESSION["cart"][$i] as $key => $val) {
                                if ($key == "") {
                                    $productname_session = $val;
                                } elseif ($key == "quantity") {
                                    $quantity_sessionproductname = $val;
                                } elseif ($key == "price") {
                                    $price_session = $val;
                                }
                            }
                            if (!empty($productname_session)) {
                                $amount = (int)$quantity_session * (int)$price_session;
                                $qty = (int)($quantity_session);
                                //
                                $select_qty =  $this->fetchWhereAnd("stocks", "productname = $productname_session");
                                $result_qty = mysqli_fetch_array($select_qty);
                                $prev_qty = $result_qty['quantity'];
                                $new_qty = $prev_qty - $qty;
                                $this->insert("sales_histories", $invoice_no2, $productname_session, $quantity_session, $price_session, $amount);
                                $this->updates(
                                    "stocks",
                                    U::col("quantity = $new_qty"),
                                    U::where("productname = $productname_session")
                                );
                            }
                        }
                    }
                    // if ($_POST["customer_type"] == "retail") {
                    //     Session::unset("cart");
                    //     echo "<script> window.location = '../print/director/retail_print.php' </script>";
                    // } else {
                    //     Session::unset("cart");
                    //     echo "<script> window.location = 'print_receipt_w.php' </script>";
                    // }
                } else {

                    if (!(empty($_POST["bank"]))) {
                        $bank_name = $_POST["bank"];
                        $this->insert("transfer", $bank_name, $invoice_no, $transfer, $staff, $date);
                    }
                    if (!((empty($_POST["pos_type"])) && (empty($_POST["pos_charges"])))) {
                        $pos_charges = $_POST["pos_charges"];
                        $pos_type = $_POST["pos_type"];
                        $this->insert('pos', $pos_type, $invoice_no2, $pos, $pos_charges, $staff, $date);
                    }
                    $this->insert('sales', $customer_name, $customer_address, $invoice_no,  $customer_type, $bill_type, $total, $cash, $transfer, $pos, $old_deposit, $deposit, $transport, $balance, $staff, $date, $username);

                    // debit 
                    $comment = "New Goods Bought";
                    $debit_row = mysqli_num_rows($this->fetchWhereAnd("debit", "customer_name=$customer_name", "customer_address=$customer_address"));
                    $debit_history = mysqli_fetch_array($this->fetchWhereAndLimit("debit_histories", "customer_name=$customer_name", "customer_address=$customer_address"));
                    // $balancedb = $debit_history["total_balance"];
                    // $depositdb = $debit_history["deposit"];
                    // $prev_total_paid = $debit_history["total_paid"];
                    // $total_paid = $deposit + $prev_total_paid;
                    // $new_balance = $balance + $balancedb;
                    $select_debit =  $this->fetchWhereAnd("debit", "customer_name = $customer_name", "customer_address = $customer_address");
                    $result_debit = mysqli_fetch_array($select_debit);
                    $prev_bal = $result_debit['balance'];
                    $new_balance1 = $prev_bal + $balance;
                    $prev_deposit = $result_debit['deposit'];
                    $new_deposit = $prev_deposit + $deposit;
                    $prev_total = $result_debit['total'];
                    $new_total = $prev_total + $total;

                    if ($balance != 0) {
                        if ($customer_name != "MR Sir" && $customer_address != "Address") {
                            if ($debit_row > 0) {

                                $this->updates(
                                    "debit",
                                    U::col("total = $new_total", "deposit= $new_deposit", "balance= $new_balance1", "staff = $staff", "date = $date"),
                                    U::where("customer_name = $customer_name", "customer_address = $customer_address")
                                );
                                $this->insert("debit_histories", $customer_name, $customer_address, $invoice_no2, $total, $deposit, $new_balance1, $comment, $staff, $date);
                            } else {
                                $this->insert("debit", $customer_name, $customer_address, $total, $deposit, $balance, $staff, $date);
                                $this->trashWhere("debit", "balance = 0");
                                $this->insert("debit_histories", $customer_name, $customer_address, $invoice_no2, $total, $deposit, $new_balance1, $comment, $staff, $date);
                            }
                        }
                    }
                    $id = 1;
                    $qty_found = 0;
                    $max = 0;
                    $quantity_session = 0;
                    if (isset($_SESSION["cart"])) {
                        $max = sizeof($_SESSION['cart']);
                    }

                    for ($i = 0; $i < $max; $i++) {
                        $productname_session = "";

                        if (isset($_SESSION['cart'][$i])) {
                            foreach ($_SESSION["cart"][$i] as $key => $val) {
                                if ($key == "productname") {
                                    $productname_session = $val;
                                } elseif ($key == "quantity") {
                                    $quantity_session = $val;
                                } elseif ($key == "price") {
                                    $price_session = $val;
                                }
                            }
                            if (!empty($productname_session)) {
                                $amount = (int)$quantity_session * (int)$price_session;
                                $qty = (int)($quantity_session);
                                //
                                $select_qty =  $this->fetchWhereAnd("stocks", "productname = $productname_session");
                                $result_qty = mysqli_fetch_array($select_qty);
                                $prev_qty = $result_qty['quantity'];
                                $new_qty = $prev_qty - $qty;
                                $this->insert("sales_histories", $invoice_no, $productname_session, $quantity_session, $price_session, $amount);
                                $this->updates(
                                    "stocks",
                                    U::col("quantity = $new_qty"),
                                    U::where("productname = $productname_session")
                                );
                            }
                        }
                    }
                    // if ($_POST["customer_type"] == "retail") {
                    //     Session::unset("cart");
                    //     echo "<script> window.location = '../print/director/retail_print.php' </script>";
                    // } else {
                    //     Session::unset("cart");
                    //     echo "<script> window.location = 'print_receipt_w.php' </script>";
                    // }
                }
            }
        }
    }
}
