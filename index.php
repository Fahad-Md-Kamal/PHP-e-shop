
<!-- head  -->
<?php include_once"templating/head.php" ?>

  <!-- Navigation -->
<?php include_once"templating/main_nav.php" ?>
 

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Shop Name</h1>
        <?php include_once"templating/side_bar.php" ?>



      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

      <?php include_once"templating/slider.php" ?>
      <p class="text-danger text-center h1"><?php
        if (isset($_SESSION['msg'])) {
          echo ($_SESSION['msg']);
          unset($_SESSION['msg']);
        }
      ?></p>

    <!-- product list -->
    <div class="row">

      <?php include_once"templating/product_list.php" ?>
      </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include_once"templating/footer_area.php" ?>
 