

<?php 
session_start();

if (isset($_GET['pid'])) {

    if(empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (in_array($_GET['pid'], $_SESSION['cart'])) {

        $_SESSION['msg'] = "This Item already in cart";
    
    }else{
        array_push($_SESSION['cart'], $_GET['pid']);
        $_SESSION['msg'] = "Item added to cart";
    }
}
header('location:../index.php');

?>