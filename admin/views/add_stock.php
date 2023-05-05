<?php include_once "../../includes/admin/header.php";
$ctr  = new StockController(); ?>


    <div class="row">
        <div class="offset-md-3 col-md-6 col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-primary">Upload Goods</h3>
                </div>
                <div class="card-body">
                    <p class="text-danger"><?php $ctr->store();?></p>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            
                            <input type="file" class="form-control" name="files[]" multiple>
                        </div>
                        
                </div>
                <div class="card-footer" style="float:right">
                        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                       
                    </form>
                </div>
            </div>
        </div>
        
    </div>


<?php
include_once "../../includes/admin/footer.php";
?>