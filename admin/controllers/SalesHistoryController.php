<?php
class SalesHistoryController extends Controller
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

    public function searchSalesCustomerAddress($customer_name,$customer_address)
    {
        $date = date("d-m-Y");
        return $this->fetchWhereLikeAnd("sales", "customer_name = $customer_name", "customer_address = $customer_address", "date=$date");
    }

    public function searchSalesStaffName($staff_name)
    {
        $date = date("d-m-Y");

        return $this->fetchWhereLikeAnd("sales", "staff = $staff_name", "date=$date");
    }

    // SUm
    public function sumTotal()
    {
        $date = date("d-m-Y");
        return $this->fetchWhereLikeOperation('sales', 'sum', 'total', "date=$date");
    }
    public function sumCash()
    {
        $date = date("d-m-Y");
        return $this->fetchWhereLikeOperation('sales', 'sum', 'cash', "date=$date");
    }
    public function sumTransfer()
    {
        $date = date("d-m-Y");
        return $this->fetchWhereLikeOperation('sales', 'sum', 'transfer', "date=$date");
    }
    public function sumPos()
    {
        $date = date("d-m-Y");
        return $this->fetchWhereLikeOperation('sales', 'sum', 'pos', "date=$date");
    }
    public function sumPayment()
    {
        $date = date("d-m-Y");
        return $this->fetchWhereLikeOperation('sales', 'sum', 'total_payment', "date=$date");
    }
    public function sumDebit()
    {
        $date = date("d-m-Y");
        return $this->fetchWhereLikeOperation('sales', 'sum', 'balance', "date=$date");
    }
    public function count()
    {
        $date = date("d-m-Y");
        return $this->fetchWhereLikeOperation('sales', 'count', 'invoice_no', "date=$date");
    }

    // Search by staff sum
    public function sumStaffTotal($staff_name)
    {
        $date = date("d-m-Y");
        return $this->fetchWhereLikeOperation('sales', 'sum', 'total', "date=$date", "staff = $staff_name");
    }
    public function sumStaffCash($staff_name)
    {
        $date = date("d-m-Y");
        return $this->fetchWhereLikeOperation('sales', 'sum', 'cash', "date=$date", "staff = $staff_name");
    }
    public function sumStaffTransfer($staff_name)
    {
        $date = date("d-m-Y");
        return $this->fetchWhereLikeOperation('sales', 'sum', 'transfer', "date=$date", "staff = $staff_name");
    }
    public function sumStaffPos($staff_name)
    {
        $date = date("d-m-Y");
        return $this->fetchWhereLikeOperation('sales', 'sum', 'pos', "date=$date", "staff = $staff_name");
    }
    public function sumStaffPayment($staff_name)
    {
        $date = date("d-m-Y");
        return $this->fetchWhereLikeOperation('sales', 'sum', 'total_payment', "date=$date", "staff = $staff_name");
    }
    public function sumStaffDebit($staff_name)
    {
        $date = date("d-m-Y");
        return $this->fetchWhereLikeOperation('sales', 'sum', 'balance', "date=$date", "staff = $staff_name");
    }

    // Search by Date Sum

    public function sumDateTotal($date)
    {
        
        return $this->fetchWhereLikeOperation('sales', 'sum', 'total', "date=$date");
    }
    public function sumDateCash($date)
    {
        
        return $this->fetchWhereLikeOperation('sales', 'sum', 'cash', "date=$date");
    }
    public function sumDateTransfer($date)
    {
        
        return $this->fetchWhereLikeOperation('sales', 'sum', 'transfer', "date=$date");
    }
    public function sumDatePos($date)
    {
        
        return $this->fetchWhereLikeOperation('sales', 'sum', 'pos', "date=$date");
    }
    public function sumDatePayment($date)
    {
        
        return $this->fetchWhereLikeOperation('sales', 'sum', 'total_payment', "date=$date");
    }
    public function sumDateDebit($date)
    {
        
        return $this->fetchWhereLikeOperation('sales', 'sum', 'balance', "date=$date");
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
}
