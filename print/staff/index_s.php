<?php session_start();
    require_once __DIR__ . '/vendor/autoload.php';

    include "../../autoload/loader.php";
    $ctr = new SmallPrintController();
    
    $select = $ctr->showInvoiceSales($_GET["invoice_no"]);
    $result = mysqli_fetch_array($select);
    $staff = explode(" ",$result["staff_name"]);
    include "includes/header.php";
    $html = '<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../assets/images/logo.jpg" type="image/gif" sizes="20x20">
        <title>EMMA AUTO AND MULTI-SERVICES COMPANY</title>
        <style>
        @media print {
            @page {
                margin: 0 auto; /* imprtant to logo margin */
                /* sheet-size: 300px 250mm; imprtant to set paper size */
                
            }
            table,
            th,
            td {
                border: 1px solid black;
                border-collapse: collapse;
                font-weight:bold;
            }
    
            table {
                border-collapse: collapse;
                
            }
    
            .table {
                width: 100%;
                font-weight:bold;
            }
            .table2{
                border-collapse: collapse;
                
            }
            th,td{
                font-size:10px;
                border-collapse: collapse;
            }
            .qty{
                width: 10%;
            }
            .goods{
                width: 55%;
            }
            .rate{
                width: 15%;
            }
            .amount{
                width: 20%;
            }
        }
    
        </style>
    </head>
    
    <body>
    <h6 style="text-align: center;">EMMA AUTO AND MULTI-SERVICES COMPANY <br/>DRESSING</h6>
        <p style="text-align: center;font-size:8px;font-weight:bold;"> <span style="font-weight: bolder;">Such as: </span>All Type of Light, Seat Cover, Horn, MP3, Remote, Lock Keys, Bulbs, Gums etc.<br>
        <span style="font-weight: bolder;">Address: </span>Opp. Jesus Life Church, Asubiaro Hospital juction, Osogbo<br>
        <span style="font-weight: bolder;">Tel: </span>07063684266, 08062063060</p>
        <div style="text-align:center;border-radius: 50%;"><span
                style="font-size:13px;border: 1px solid;text-align:center; padding: 5px;background-color:rgb(0, 0, 0); color: white;">Invoice</span>
        </div>
        <br>
        <table style="text-align: left;">
            <tr>
                <th style="text-align: left;">Customer Name: </th>
                <td>'.$result["customer_name"].'</td>
            </tr>
            <tr>
                <th style="text-align: left;">Invoice No: </th>
                <td>'.$result["invoice_no"].'</td>
            </tr>
            <tr>
                <th style="text-align: left;">Payment Type: </th>
                <td>'.$result["payment_type"].'</td>
            </tr>
            <tr>
                <th style="text-align: left;">Date: </th>
                <td>'.$result["date"].'</td>
            </tr>
            <tr>
            <th style="text-align: left;">Sold By: </th>
            <td>Mr/Miss '.$staff[1].'</td>
        </tr>
        </table>
        <br/>
        <table class="table">
            <tr>
                <th class="qty">Qty</th>
                <th class="goods" colspan="5">Description of Goods</th>
                <th class="rate">Rate</th>
                <th class="amount">Amount</th>
            </tr>';
            $select = $ctr->showInvoiceSalesDetails($_GET["invoice_no"]);
                        while($row = mysqli_fetch_array($select)){
                            
                     
                        $html.=
                        
                '<tr>
                <td class="qty">'.$row['quantity'].'</td>
                <td class="goods"  colspan="5">'.$row['productname'].'</td>
                <td class="rate">'.$row['price'].'</td>
                <td class="amount">'.$row['amount'].'</td>
            </tr>';
             }             
             $html.='<tr>
                <td colspan="6" style="text-align: right;"><b>Total Amount: </b></td>
                <td colspan="2" style="text-align: center;">'.$result["total"].'</td>
            </tr>
           
            <tr>';
            $select_pos = $ctr->showPosInvoice($_GET["invoice_no"]);
                $result_pos = mysqli_fetch_array($select_pos);
            if ($result["pos"] == 0){
                
               $html.='
               <td colspan="2" ></td>
           <td colspan="2" style="text-align: left;"><b>Cash: '.$result["cash"].'</b></td>
           <td colspan="2" style="text-align: left;"><b>Transfer: '.$result["transfer"].'</b></td>
           <td colspan="2" style="text-align: left;"><b>POS: '.$result["pos"].'</b></td>';
            }else{
                $html.= '
                <td colspan="2" style="text-align: left;"><b>Cash: '.$result["cash"].'</b></td>
               <td colspan="2" style="text-align: left;"><b>Transfer: '.$result["transfer"].'</b></td>
               <td colspan="2" style="text-align: left;"><b>POS: '.$result["pos"]." (".$result_pos["pos_type"].")".'</b></td>
               <td style="text-align: left;"><b>POS Charges: '.$result_pos["pos_charges"].'</b></td>';
             }
       $html.='
       
       </tr>
        <tr>';
             if ($result["old_deposit"] == 0){
                $html.='
                <td colspan="4" style="text-align: left;"><b>Total Payment: '.intval($result["total_payment"])+intval($result_pos["pos_charges"]).'</b></td>
                <td colspan="4" style="text-align: left;"><b>Balance: '.$result["balance"].'</b></td>';
             }else{
                $html.= '
                <td colspan="2" style="text-align: left;"><b>Old Deposit: '.$result["old_deposit"].'</b></td>
        <td colspan="2" style="text-align: left;"><b>Total Payment: '.intval($result["total_payment"])+intval($result_pos["pos_charges"]).'</b></td>

                <td colspan="4" style="text-align: left;"><b>Balance: '.$result["balance"].'</b></td>';
             }
        $html.='
        
        </tr>
        </table>
        <br/>
        <span style="font-size:10px;font-weight:bold;">Customer Sign. ____________&nbsp;&nbsp;Cashier Sign. ____________ </span>
        <p style="text-align:center;font-size:10px;font-weight:bold;">You Must Be Born Again!</p>
        
    </body>
    
    </html>';
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [72,234]]);
    $mpdf->showImageErrors = false;
    $mpdf->WriteHTML($html);
    $mpdf->Output();
?>