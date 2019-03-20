
<!-- head  -->
<?php include_once"templating/head.php" ?>

  <!-- Navigation -->
<?php include_once"templating/main_nav.php" ?>
 

  <!-- Page Content -->
  <div class="container">

    <div class="row justify-content-center">

      <div class="col-lg-6 pb-5 pt-5 bg-dark text-light m-3">




<?php
if(!isset($_COOKIE['cookie'])) { 
?>

        <form action="php/loginChecker.php" method="post">
          <legend class="text-center text-uppercase">User Login</legend>
          
          <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Example: johnDoe@gmail.com">
          </div>

          <div class="form-group">
            <label for="pass">Password :</label>
            <input type="password" name="pass" id="pass" class="form-control" placeholder="******">
          </div>
          
          <div class="form-group">
            <input type="submit" class="form-control btn btn-success mt-4" value="SUBMIT">
          </div>

        </form>

        <?php } else {
          echo "<p class='text-center h1'>Suspecious Login Detected</p>";
          }
          
          if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg']. '<br>'.$_SESSION['count'];
            unset($_SESSION['msg']);
          } ?>






      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include_once"templating/footer_area.php" ?>
 