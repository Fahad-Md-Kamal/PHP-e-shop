

<?php 
session_start();
if(isset($_GET['pid'])){
    
    $key = array_search($_GET['pid'], $_SESSION['cart']);
    
    unset($_SESSION['cart'][$key]);
}

// print_r ($_SESSION['cart']);

header('location:../cart.php');

?>