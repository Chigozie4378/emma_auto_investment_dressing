<?php
include_once "../../autoload/loader.php";
$ctr = new ReturnGoodsController();
$return_qty = $_POST["returnQty"];
$quantity = $_POST["quantity"];
$productname = $_POST["productname"];
$price = $_POST["price"];
$amount = $_POST["amount"];
$invoice_no = $_POST["invoice_no"];
$total_amount = $_POST["total_amount"];
//

$customer_name = $_POST["customer_name"];
$customer_address = $_POST["customer_address"];
$payment_type = $_POST["payment_type"];
$cash = $_POST["cash"];
$transfer = $_POST["transfer"];
$total_payment = $_POST["total_payment"];
$balance = $_POST["balance"];
$date = $_POST["date"];
$staff_name = $_POST["staff"];
$comment = "Returned Good(s)";
$debit_total = 0;
//
$rem_qty = $quantity - $return_qty;
$new_amount = $price*$rem_qty;
$return_amount = $price*$return_qty;

// New total || New Balance
$new_total = $total_amount - $return_amount;
$new_balance = $new_total - $total_payment;

$ctr->updateSalesDetails($rem_qty,$new_amount,$productname,$invoice_no);

$ctr->updateStockAfterEachReturn($return_qty,$productname);

// $select = $ctr->sumAmountSales_details($invoice_no);
// $total = mysqli_fetch_array($select);
// $new_total = $total["total"];
// $new_balance = $new_total-$deposit;

$ctr->updateSales($new_total,$new_balance,$invoice_no);

$ctr->deleteSalesDetailsReturn($invoice_no); 
$ctr->deleteSalesReturn($invoice_no);

$show_debits = $ctr->showDebit($customer_name,$customer_address);
$row = mysqli_fetch_array($show_debits);
$dbtotal_deposit = $row["deposit"];
$dbtotal_bal = $row["balance"];
$total_deposit = $dbtotal_deposit + $return_amount;
$total_bal1 = $dbtotal_bal - $return_amount;
if (mysqli_num_rows($show_debits) > 0){
	$ctr->updateDebits($total_deposit,$total_bal1,$customer_name,$customer_address);
	$ctr->insertDebitsDetailsReturn($customer_name, $customer_address, $debit_total, $return_amount,$total_bal1, $staff_name, $date,$comment);
	
	$select_return =  $ctr->showReturnEach($invoice_no);
	$result_return = mysqli_fetch_array($select_return);
	$total_return = $result_return["total"]+ $return_amount;
	if (mysqli_num_rows($select_return) > 0){
		$ctr->updateEachReturn($invoice_no,$total_return,$staff_name,$date);
	}else{
		$ctr->insertEachReturn($customer_name, $customer_address, $invoice_no, $payment_type, $return_amount, $staff_name, $date);
	
	}
	
	$eachReturnDetails = $ctr->showReturnEachDetails($invoice_no,$productname);
	$result_return_each_details = mysqli_fetch_array($eachReturnDetails);
	$amount_return_details = $result_return_each_details["amount"] + $return_amount;
	$quantity_return_details = $result_return_each_details["quantity"] + $return_qty;
	if (mysqli_num_rows($eachReturnDetails) > 0){
		$ctr->updateEachReturnDetails($invoice_no,$productname,$quantity_return_details,$amount_return_details,$staff_name,$date);
	}else{
		$ctr->insertEachReturnDetails($customer_name,$customer_address,$invoice_no,$productname,$return_qty,$price,$return_amount,$staff_name,$date);
	
	}
	
	echo "<script>
	location.reload();
	</script>";
}else{
	$select =  $ctr->showReturnEach($invoice_no);
	if (mysqli_num_rows($select) > 0){
		$ctr->updateEachReturn($invoice_no,$total_return,$staff_name,$date);
	}else{
		$ctr->insertEachReturn($customer_name, $customer_address, $invoice_no, $payment_type, $return_amount, $staff_name, $date);
	
	}
	
	$eachReturnDetails = $ctr->showReturnEachDetails($invoice_no,$productname);
	if (mysqli_num_rows($eachReturnDetails) > 0){
		$ctr->updateEachReturnDetails($invoice_no,$productname,$return_qty,$return_amount,$staff_name,$date);
	}else{
		$ctr->insertEachReturnDetails($customer_name,$customer_address,$invoice_no,$productname,$return_qty,$price,$return_amount,$staff_name,$date);
	
	}
	
	echo "<script>
	location.reload();
	</script>";
}

?>
	<!-- customer_name address invoice_no payment_type total cash transfer deposit balance	staff_name	date -->
