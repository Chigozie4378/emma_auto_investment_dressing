<?php
$total  = (int)$_GET["total"];
$cash = (int)$_GET["cash"];
$transfer = (int)$_GET["transfer"];
$pos = (int)$_GET["pos"];
$old_deposit = (int)$_GET["old_deposit"];
$transport = (int)$_GET["transport"];
$charges = (int)$_GET["charges"];
$deposit = $cash + $transfer + $pos + $old_deposit;
$balance = $total - $deposit + $transport;

?>

<div class="form-group">
    <label for="">Paid: </label>
    <input class="form-control" name="deposit" style="width:100%;box-sizing:border-box" type="number" readonly value="<?php echo $deposit ?>">
</div>
<div class="form-group">
    <label for="">Balance: </label>
    <input class="form-control" style="width:100%;box-sizing:border-box;" type="number" name="balance" value="<?php echo $balance ?>" readonly>

</div>