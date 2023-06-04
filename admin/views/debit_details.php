

<?php include_once "../../includes/admin/header.php";
$ctr = new DebitController();
?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
              
                    <div class="card-body table-responsive p-0 fixTableHead">
                        <table class="table table-hover">
                        <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Customer Name </th>
                                    <th>Address</th>
                                    <th>Total</th>
                                    <th>Deposit</th>
                                    <th>Balance</th>
                                    <th>Staff</th>
                                    <th>Comments</th>
                                    <th style="width: 10%">Date</th>
                                </tr>
                            </thead>
                            <tbody id ="table">
                                <?php 
                               $id = 0;
                  $select = $ctr->viewDebit();
                 while ($row = mysqli_fetch_array($select)){?>
                 <capital>
                 <tr>
                                    <td style="text-transform:uppercase">
                                        <?php echo ++$id ?>
                                    </td>
                                    <td style="text-transform:uppercase">
                                        <?php echo $row['customer_name'] ?>
                                    </td>
                                    <td style="text-transform:uppercase">
                                        <?php echo $row['customer_address'] ?>
                                    </td>
                                    
                                    <td style="text-transform:uppercase">
                                        <?php echo $row['total'] ?>
                                    </td>
                                    <td style="text-transform:uppercase">
                                        <?php echo $row['deposit'] ?>
                                    </td>
                                    <td style="text-transform:uppercase">
                                        <?php echo $row['balance'] ?>
                                    </td>
                                    <td style="text-transform:uppercase">
                                        <?php echo $row['staff'] ?>
                                    </td>
                                    <td style="text-transform:uppercase">
                                        <?php echo $row['comments'] ?>
                                    </td>
                                    <td style="text-transform:uppercase">
                                        <?php echo $row['date'] ?>
                                    </td>
                                    
                                </tr>
                                </capital>
                                <?php }
                ?>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <form action="" method="post">
                            <input name="print" type="submit" class="toggle btn btn-success d-print-none" value="print" onclick="printpage()"> 
                            
                                <?php
                                if(isset($_SERVER['HTTP_REFERER'])) {
                                    // Get the URL of the previous page
                                    $previousPage = $_SERVER['HTTP_REFERER'];
                                    
                                    // Check if the previous page is "page1.php"
                                    if(strpos($previousPage, "debit.php") !== false) {
                                        echo '<a href="./debit.php" class="btn btn-primary d-print-none">Go Back</a>';
                                    } elseif(strpos($previousPage, "debit_history.php") !== false) {
                                        echo '<a href="./debit_history.php" class="btn btn-primary d-print-none">Go Back</a>';
                                    }    
                                }
                                ?>

                           </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
  
</section> 

<script>
         function printpage() {
            window.print() 
        }
    </script>


<?php include_once "../../includes/admin/footer.php"; ?>