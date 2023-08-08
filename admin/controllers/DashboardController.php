<?php
class DashboardController extends Controller
{
    public function sumSales()
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
    // public function sumPayment()
    // {
    //     $date = date("d-m-Y");
    //     return $this->fetchWhereLikeOperation('sales', 'sum', 'total_payment', "date=$date");
    // }
    public function sumDebit()
    {
        $date = date("d-m-Y");
        return $this->fetchWhereLikeOperation('sales', 'sum', 'balance', "date=$date");
    }
    public function countCustomer()
    {
        $date = date("d-m-Y");
        return $this->fetchWhereLikeOperation('sales', 'count', 'invoice_no', "date=$date");
        
    }
    public function carouselDispplay()
    {

        $select = $this->fetchAll("stocks");
        $result = mysqli_fetch_array($select);

        $cards = [];
        if (mysqli_num_rows($select) > 0) {
            // output data of each row
            while ( $result = mysqli_fetch_array($select)) {
                $cards[] = $result;
            }
            return $cards;
        } else {
            echo "0 results";
        }
    }
    public function last50SalesHistory(){
        $date = date("d-m-Y");
        return $this->fetchWhereAndLimit50("sales", "date = $date");
    }
}
