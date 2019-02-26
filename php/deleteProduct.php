
<?php 
    session_start();
    if (isset($_GET['id']) ) {

        $pid = $_GET['id'];

        include_once "DB/DB_Connection.php";
        $conn = DataBaseConnection();
        
        $sql ="DELETE FROM `products` WHERE `Id` = $pid";
        
        if($conn->query($sql))
        {
            $_SESSION['msg'] = "Product deleted from the system";
        }else {
            $_SESSION['msg'] = "Failed to delete products: ".$conn->error;
        }
        header("location:../productRegistration.php");
    }
?>