
<!-- head  -->
<?php include_once"templating/head.php" ?>

  <!-- Navigation -->
<?php include_once"templating/main_nav.php" ?>
 

  <!-- Page Content -->
  <div class="container">

    <div class="row justify-content-center">

      <div class="col-lg-12 pb-5 pt-5">

      <?php if(!empty($_SESSION['cart'])) { ?>
      <table>
      <tr>
        <th> </th>
        <th class="text-center">Product Name</th>
        <th class="text-center">Price</th>
        <th class="text-center">Details</th>
        <th class="text-center">Action</th>
        <!-- <th></th> -->
      </tr>

      <?Php 
        include_once "php/DB/DB_Connection.php";
        $conn = DataBaseConnection();

        foreach ($_SESSION['cart'] as $product) {

        $sql = "SELECT * FROM products WHERE id = $product";
        $result = $conn->query($sql);
        
        // $total;
        
        foreach($result AS $row){
      ?>



      <tr>
        <td><img src="img/<?=$row['Image']?>" alt=""></td>
        <td><?=$row['name']?></td>
        <td>$ <?=$row['price']?></td>
        <td><?=$row['details']?></td>
        <td class="d-flex justify-content-between">
          <a class="btn btn-danger text-light" href="php/removeFromCart.php?pid=<?=$row['Id']?>">
           Remove 
           </a>
      </td>
      </tr>
      <?php 

          // $total += (int)$row['price'];
          
    } 
  }

        if (isset($_SESSION['msg'])) {
          echo($_SESSION['msg']);
          unset($_SESSION['msg']);
        }
    ?>

    </table>
      <?php }
      
      else{
        header("location:index.php");
      }
      
      ?>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include_once"templating/footer_area.php" ?>
 