<?php
class DashboardController extends Controller
{
    public function sumSales()
    {
        $date = date("d-m-Y");
        $staff_username = $_SESSION["staff_username"];
        return $this->fetchWhereLikeOperation('sales', 'sum', 'total', "date=$date", "username=$staff_username");
    }
    public function sumCash()
    {
        $date = date("d-m-Y");
        $staff_username = $_SESSION["staff_username"];
        return $this->fetchWhereLikeOperation('sales', 'sum', 'cash', "date=$date", "username=$staff_username");
    }
    public function sumTransfer()
    {
        $date = date("d-m-Y");
        $staff_username = $_SESSION["staff_username"];
        return $this->fetchWhereLikeOperation('sales', 'sum', 'transfer', "date=$date", "username=$staff_username");
    }
    public function sumPos()
    {
        $date = date("d-m-Y");
        $staff_username = $_SESSION["staff_username"];
        return $this->fetchWhereLikeOperation('sales', 'sum', 'pos', "date=$date", "username=$staff_username");
    }
    // public function sumPayment()
    // {
    //     $date = date("d-m-Y");
    //     return $this->fetchWhereLikeOperation('sales', 'sum', 'total_payment', "date=$date", "username=$staff_username");
    // }
    public function sumDebit()
    {
        $date = date("d-m-Y");
        $staff_username = $_SESSION["staff_username"];
        return $this->fetchWhereLikeOperation('sales', 'sum', 'balance', "date=$date", "username=$staff_username");
    }
    public function countCustomer()
    {
        $date = date("d-m-Y");
        $staff_username = $_SESSION["staff_username"];
        return $this->fetchWhereLikeOperation('sales', 'count', 'invoice_no', "date=$date", "username=$staff_username");
    }
    public function last50SalesHistory(){
        $date = date("d-m-Y");
        $staff_username = $_SESSION["staff_username"];
        return $this->fetchWhereAndLimit50("sales", "date = $date", "username=$staff_username");
    }
}
