


<?Php
    include_once "php/DB/DB_Connection.php";
    $conn = DataBaseConnection();
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    foreach($result AS $row){
    ?>

<div class="col-lg-4 col-md-6 mb-4">
  <div class="card h-100">
    <a href="#"><img class="card-img-top" src="img/<?=$row['Image']?>" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="#"><?=$row['name']?></a>
      </h4>
      <h5>$ <?=$row['price']?></h5>
      <p class="card-text"><?=$row['details']?></p>
    </div>
    <div class="card-footer d-flex justify-content-between">
      <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>

<!-- 
      <form action="php/productInCart.php?pid=<?=$row['Id']?>" method="get">
          <div class="form-group">
              <input type="submit" class="btn btn-primary form-control" value="Add To Cart">
            </div>
          <div class="form-group">
              <input type="input" class="form-control" placeholder="Quantity..">
            </div>
      </form> -->

      <a href="php/productInCart.php?pid=<?=$row['Id']?>" class="btn btn-primary">Add To Cart</a>
    </div>
  </div>
</div>

    <?php } ?>