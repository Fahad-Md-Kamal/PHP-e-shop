

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>

        <?php if (isset($_SESSION['loggedIn'])) {?>
          <li class="nav-item">
            <a class="nav-link" href="productRegistration.php">Product Reg</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link text-info" href="#"><?=$_SESSION['userName'] ?></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="php/logout.php">Log Out</a>
          </li>

        <?php } else { ?>

          <li class="nav-item">
            <a class="nav-link" href="signup.php">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Log In</a>
          </li>

        <?php } ?>

        </ul>
      </div>
    </div>
  </nav>