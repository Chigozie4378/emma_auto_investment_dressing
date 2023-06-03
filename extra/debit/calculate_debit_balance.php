<?php
$total = (int)$_POST["total"];
$deposit = (int)$_POST["deposit"];
$balance = $total - $deposit;


?>
        <input type="text" class="form-control"  name="balance" value="<?php echo $balance; ?>" onclick="select()"/>
   
