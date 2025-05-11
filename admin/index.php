<?php include('../includes/core.inc.php'); ?>
<?php include('header.php'); ?>
<body>
<div id="wrapper">
<?php include('navbar.php'); ?>

<div style="height:50px;"></div>
<div id="page-wrapper">
  <div class="container-fluid">
    <div style="height:40px;"></div>

    <div class="row">
      <!-- Total Drugs -->
      <div class="col-md-4">
        <div class="card mb-4">
          <i class="fa fa-product-hunt"></i>
          <div class="card-body">
            <h2>Total Drug List<br>ሙሉ የመድሃኒት ዝርዝሮች</h2>
            <h2 class="card-title batch-list">
              <?php
              $batch_query = mysqli_query($conn, "SELECT * FROM drug_table");
              echo mysqli_num_rows($batch_query);
              ?>
            </h2>
          </div>
          <div class="card-footer text-muted">
            <a href="product.php">Check out</a>
          </div>
        </div>
      </div>

      <!-- Distribution Center -->
      <div class="col-md-4">
        <div class="card mb-4">
          <i class="fa fa-list"></i>
          <div class="card-body">
            <h2>Distribution Center <br> የስርጭት ማዕከላት</h2>
            <h2 class="card-title batch-list">
              <?php
              $dc_query = mysqli_query($conn, "SELECT * FROM distribution_center");
              echo mysqli_num_rows($dc_query);
              ?>
            </h2>
          </div>
          <div class="card-footer text-muted">
            <a href="customer.php">Check out</a>
          </div>
        </div>
      </div>

      <!-- Batch -->
      <div class="col-md-4">
        <div class="card mb-4">
          <i class="fa fa-book"></i>
          <div class="card-body">
            <h2>Batch <br> ባች</h2>
            <h2 class="card-title batch-list">
              <?php
              $batch_query = mysqli_query($conn, "SELECT * FROM batch");
              echo mysqli_num_rows($batch_query);
              ?>
            </h2>
          </div>
          <div class="card-footer text-muted">
            <a href="batch.php">Check out</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Expired Drugs -->
      <div class="col-md-6">
        <div class="card mb-4">
          <i class="fa fa-times"></i>
          <div class="card-body">
            <h2>Expiry Drugs <br> ጊዜ ያለፈባቸው መድኃኒቶች</h2>
            <h2 class="card-title batch-list">
              <?php
              $expired = mysqli_query($conn, "SELECT status FROM drug_table WHERE status = 0");
              echo mysqli_num_rows($expired);
              ?>
            </h2>
          </div>
          <div class="card-footer text-muted">
            <a href="product.php">Check out</a>
          </div>
        </div>
      </div>

      <!-- Trashed Drugs -->
      <div class="col-md-6">
        <div class="card mb-4">
          <i class="fa fa-trash"></i>
          <div class="card-body">
            <h2>Trashed Drugs <br> የተጣሉ መድኃኒቶች</h2>
            <h2 class="card-title batch-list">
              <?php
              $trashed = mysqli_query($conn, "SELECT * FROM drug_table WHERE status = 'trashed'");
              echo mysqli_num_rows($trashed);
              ?>
            </h2>
          </div>
          <div class="card-footer text-muted">
            <a href="#">Check out</a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>

<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<script src="custom.js"></script>

<!-- Optional effect (can uncomment if needed) -->
<!--
<script>
  $("div .mb-4").mouseenter(function(){
    $(this).slideUp("fast", function(){
      $(this).slideDown("fast");
    });
  });
</script>
-->

</body>
</html>
