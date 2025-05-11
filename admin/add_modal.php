<!-- Add Product Modal -->
<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="addProductLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST" action="../includes/addDrugs.php" role="form">

        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="addProductLabel">Add New Drug</h4>
        </div>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="form-group input-group">
              <span class="input-group-addon" style="width:120px;">Drug Name:</span>
              <input type="text" class="form-control" name="name" style="width:400px; text-transform:capitalize;" required>
            </div>

            <div class="form-group input-group">
              <span class="input-group-addon" style="width:120px;">Description:</span>
              <input type="text" class="form-control" name="desc" style="width:400px; text-transform:capitalize;" required>
            </div>

            <div class="form-group input-group">
              <span class="input-group-addon" style="width:120px;">Choose Batch:</span>
              <select class="form-control" name="batch" style="width:400px;" required>
                <option value="" disabled selected>Choose a Batch</option>
                <?php echo selectBatch(); ?>
              </select>
            </div>

            <div class="form-group input-group date" data-provide="datepicker">
              <span class="input-group-addon">Production Date:</span>
              <input type="text" class="form-control" name="pro_date" readonly required>
              <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>
            </div>

            <div class="form-group input-group date" data-provide="datepicker">
              <span class="input-group-addon">Expiry Date:</span>
              <input type="text" class="form-control" name="ex_date" readonly required>
              <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>
            </div>

            <div class="form-group input-group">
              <span class="input-group-addon">Price:</span>
              <input type="text" class="form-control" name="price" required>
            </div>

            <div class="form-group input-group">
              <span class="input-group-addon" style="width:120px;">Quantity:</span>
              <input type="text" class="form-control" name="qty" style="width:400px;">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            <i class="fa fa-times"></i> Cancel
          </button>
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Save
          </button>
        </div>

      </form>

    </div>
  </div>
</div>
<!-- /Add Product Modal -->


<!-- Add Customer -->
    <div class="modal fade" id="addCenter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Add a distribution center</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="../includes/addDistributionC.php" enctype="multipart/form-data">
						<div class="container-fluid">
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Name:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Location:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="address">
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Contact Info:</span>
                            <input type="text" style="width:400px;" class="form-control" name="contact">
                        </div>  						
				</div>
				</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
					</form>
                </div>
			</div>
		</div>
    </div>
<!-- /.modal -->
     <div class="modal fade" id="addBatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Add a new Batch</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="../includes/addBatch.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                        <div style="height:15px;"></div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Batch Name:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" required>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Created by</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="user" value="<?php echo $firstname.' '.$lastname; ?>" readonly>
                        </div>                          
                </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--Manage all sales -->
    <!-- Sales -->
    <div class="modal fade" id="sales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">New Sales</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="../includes/addSales.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                        <div style="height:15px;"></div>
                        <div class="form-group input-group date" data-provide="datepicker">
                            <span  class="input-group-addon">Sales Date:</span>
                            <input type="text" class="form-control" name="sale_date" required readonly="">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>
                        </div>

                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Distribution Center:</span>
                            <select style="width:400px;" class="form-control" name="dist_center">
                                <option selected="selected">choose a customer</option>
                                <?php
                                    //include '../includes/core.inc.php';
                                    echo select_customer();
                                ?>
                            </select>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Drugs</span>
                            <select style="width:400px;" class="form-control" name="drug">
                                <option selected="selected">choose a drug</option>
                                <?php
                                    //include '../includes/core.inc.php';
                                    echo selectDrug();
                                ?>
                            </select>
                        </div> 
                         <div class="form-group input-group">
                            <span class="input-group-addon">Sale Quantity:</span>
                            <input type="text" class="form-control" name="qty" required>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Sold Price:</span>
                            <input type="text" style="width:400px;" class="form-control" name="price">
                        </div>                         
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- ./sales end -->
