<?php
class UpdatePaymentController extends Controller
{

    public function checkBankExist($invoice_no)
    {
        return $this->fetchWhereAnd("transfer", "invoice_no = $invoice_no");
    }


    public function deleteTransfer($invoice_no)
    {

        return $this->trashWhere("transfer", "invoice_no = $invoice_no");
    }

    public function updateBank($new_transfer, $bank_name, $staff, $date, $invoice_no)
    {

        $this->updates(
            "transfer",
            U::col("amount = $new_transfer", "bank= $bank_name", "staff= $staff", "date= $date"),
            U::where("invoice_no = $invoice_no")
        );
    }


    public function addBank($bank_name,$invoice_no, $new_transfer,$staff, $date,$status)
    {
        $this->insert('transfer',$bank_name,$invoice_no, $new_transfer,$staff, $date,$status);
    }


    public function checkDebitInvoice($invoice_no)
    {
        return $this->fetchWhereAnd("debit_histories", "invoice_no = $invoice_no");
    }

    public function checkDebit($customer_name, $customer_address)
    {
        return $this->fetchWhereAnd("debit", "customer_name = $customer_name", "customer_address = $customer_address");
    }

    public function updateDebitPayment($new_deposit,$new_balance1,$customer_name, $customer_address)
    {

        $this->updates(
            "debit",
            U::col("deposit = $new_deposit", "balance= $new_balance1"),
            U::where("customer_name = $customer_name","customer_address = $customer_address")
        );
    }

    public function updateDebitHistoriesPayment($updated_deposit,  $updated_balance,$invoice_no)
    {

        $this->updates(
            "debit_histories",
            U::col("deposit = $updated_deposit", "balance= $updated_balance"),
            U::where("invoice_no = $invoice_no")
        );
    }

    public function deleteDebit()
    {

        return $this->trashWhere("debit", "balance = 0");
    }

    public function addDebitHistoriesPayment($customer_name, $customer_address,$total, $total_paid, $new_balance, $staff, $date, $comment,$invoice_no)
    {
        $this->insert('debit',$customer_name, $customer_address,$total, $total_paid, $new_balance, $staff, $date, $comment,$invoice_no);
    }

    public function addDebitsPayment($customer_name, $customer_address, $total, $total_paid, $new_balance, $staff, $date)
    {
        $this->insert('debit',$customer_name, $customer_address, $total, $total_paid, $new_balance, $staff, $date);
    }

    public function updatePaymentSales($new_transfer,$new_cash,$new_pos,$total_paid,$new_balance,$payment_type,$invoice_no)
    {

        $this->updates(
            "sales",
            U::col("transfer = $new_transfer", "cash= $new_cash", "pos= $new_pos", "deposit= $total_paid", "balance= $new_balance", "payment_type= $payment_type"),
            U::where("invoice_no = $invoice_no")
        );
    }
}
