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
}
