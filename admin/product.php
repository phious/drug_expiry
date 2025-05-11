<?php
require "../phpqrcode/qrlib.php";
include('../includes/core.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<?php include('navbar.php'); ?>

<?php if (isset($_GET['success'])): ?>
  <div class="alert alert-success text-center">
    <?php echo htmlspecialchars($_GET['success']); ?>
  </div>
<?php endif; ?>

<div id="wrapper">
  <div style="height:50px;"></div>
  <div id="page-wrapper">
    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            Drug List
            <span class="pull-right">
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addproduct">
                <i class="fa fa-plus-circle"></i> Add New Drug
              </button>
            </span>
          </h1>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="table-responsive">
            <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Drug Name</th>
                  <th>Description</th>
                  <th>Batch</th>
                  <th>QR Code</th>
                  <th>Prod. Date</th>
                  <th>Expiry Date</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Expiry Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php echo DrugList(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div> <!-- /.container-fluid -->
  </div> <!-- /#page-wrapper -->
</div> <!-- /#wrapper -->

<?php
include('script.php');
include('modal.php');
include('add_modal.php');
?>

<script src="custom.js"></script>
<script>
  function evaluate(obj) {
    const id = obj.attr("id");
    $.ajax({
      url: "../includes/evaluate.php",
      method: "GET",
      data: { id: id },
      success: function (data) {
        obj.html(data);
        obj.closest("tr").fadeOut(3000);
      }
    });
  }

  $(".evaluate").on("click", function () {
    const obj = $(this);
    obj.addClass("click");

    setTimeout(() => {
      obj.removeClass("click");
      evaluate(obj);
    }, 3700);
  });
</script>
</body>
</html>
