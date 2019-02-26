



<!-- head  -->
<?php include_once"templating/head.php" ?>

<?php 
if (!isset($_SESSION['loggedIn'])){
    $_SESSION['msg'] = "Please login first";
    header("location:login.php"); 
    exit;
  }

  $pid = '';
  $p_name = $p_price = $p_desc = '';
  $script = 'Registration';

  if (isset($_GET['id'])) {
  
    $pid = $_GET['id'];
    
    include_once "php/DB/DB_Connection.php";
    $conn = DataBaseConnection();
    
    $sql ="SELECT * FROM products WHERE Id = '$pid'";
    $product = $conn->query($sql);

    foreach ($product AS $prd) {
      $p_name = $prd['name'];
      $p_price = $prd['price'];
      $p_desc = $prd['details'];
      $p_img = $prd['Image'];
    }
    $script = 'Update';
  }
    ?>

  <!-- Navigation -->
<?php include_once"templating/main_nav.php" ?>
 

  <!-- Page Content -->
  <div class="container">

    <div class="row justify-content-center">

      <div class="col-lg-6 bg-dark text-light mt-5 pb-5 pt-5">

        <form action="php/product<?=$script?>Code.php" method="post" enctype="multipart/form-data">
          <legend class="text-center text-uppercase">Product Registration</legend>
          <div class="form-group">
          <input type="hidden" value="<?=$pid?>" name="pid">
            <label for="name">Product Name :</label>
            <input type="text" name="name" id="name" value="<?=$p_name?>" class="form-control" placeholder="Example: John Doe">
          </div>

          <div class="form-group">
            <label for="price">Product Price :</label>
            <input type="price" name="price" id="price" value="<?=$p_price?>" class="form-control" placeholder="Example: johnDoe@gmail.com">
          </div>
          
          <div class="form-group">
            <label for="details">Product Details :</label>
            <textarea name="details" id="details" class="form-control" placeholder="Product Details ( In 300 words )"><?=$p_desc?></textarea>
          </div>
          <div class="form-group">
            <label for="details">Product image :</label><br>
            <input type="file" name="image">
          </div>
          <div class="form-group">
            <input type="submit" class="form-control btn btn-success mt-4" value="SUBMIT">
          </div>
          <p class="h4 text-center">
          <?php 
          if (isset($_SESSION['msg'])) {
            echo($_SESSION['msg']);
            unset($_SESSION['msg']);
          } ?>
          </p>
        </form>

      </div>

    </div>
    <!-- /.row -->
<div class="col-lg-12 mt-5 mb-5">
<p class="h1 text-center">Product List</p>
  <table>
    <tr>
      <th class="text-center">Product Name</th>
      <th class="text-center">Price</th>
      <th class="text-center">Details</th>
      <th class="text-center">Action</th>
      <!-- <th></th> -->
    </tr>

    <?Php 
      include_once "php/DB/DB_Connection.php";
      $conn = DataBaseConnection();
      $sql = "SELECT * FROM products";
      $result = $conn->query($sql);
      foreach($result AS $row){
    ?>

    <tr>
      <td><?=$row['name']?></td>
      <td>$ <?=$row['price']?></td>
      <td><?=$row['details']?></td>
      <!-- <td>< ?=$row['image']?></td> -->
      <td class="d-flex justify-content-between">
        <a class="btn btn-primary text-light" href="productRegistration.php?id=<?=$row['Id']?>"> EDIT </a>
        <a class="btn btn-danger text-light" href="php/deleteProduct.php?id=<?=$row['Id']?>"> DELETE </a>
    </td>
    </tr>
    <?php } ?>

  </table>
</div>
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include_once"templating/footer_area.php" ?>
 