
<!-- head  -->
<?php include_once"templating/head.php" ?>

  <!-- Navigation -->
<?php include_once"templating/main_nav.php" ?>
 

  <!-- Page Content -->
  <div class="container">

    <div class="row justify-content-center">

      <div class="col-lg-6 bg-dark text-light pb-5 pt-5">

        <form action="php/sendMail.php" method="post">
          <legend class="text-center text-uppercase">Contact Us</legend>
          <div class="form-group">
            <label for="fromMail">From :</label>
            <input type="text" name="fromMail" id="fromMail" class="form-control" placeholder="Example: John Doe" value=''>
          </div>
          <div class="form-group">
            <label for="toMail">To :</label>
            <input type="email" name="toMail" id="toMail" class="form-control" placeholder="Example: johnDoe@gmail.com">
          </div>
          <div class="form-group">
            <label for="mailSubject">Subject :</label>
            <input type="text" name="mailSubject" id="mailSubject" class="form-control" placeholder="******">
          </div>
          <div class="form-group">
            <label for="message">Message :</label>
            <input type="text" name="message" id="message" class="form-control" placeholder="******">
          </div>
          <div class="form-group">
            <input type="submit" class="form-control btn btn-success mt-4" value="SUBMIT">
          </div>
          <p class="h4 text-center">
            <?php if (isset($_SESSION['msg'])) {
              echo($_SESSION['msg']);
              unset($_SESSION['msg']);
            } ?>
          </p>
        </form>



      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include_once"templating/footer_area.php" ?>
 