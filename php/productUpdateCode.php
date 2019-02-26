

<?php 

session_start();

if($_POST){

    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $details = $_POST['details'];


    // echo($pid. $name. $price .$details);
    // exit;


    if (empty($name)) {
        $_SESSION['msg'] = "Please enter a Unique product name";
    }else if(empty($price) || !is_numeric($price)){
        $_SESSION['msg'] = "Please enter numeric price of the product";
    }else if(empty($details)){
        $_SESSION['msg'] = "Please enter product details";
    }else if( strlen($details) > 300){
        $_SESSION['msg'] = "Please enter product details in 300 words";
    }else{
        include_once "DB/DB_Connection.php";
        $conn = DataBaseConnection();
        
        $sql = "UPDATE `products` 
                SET 
                `name` = '$name',
                `price` = '$price',
                `details` = '$details' 
                WHERE `Id` = '$pid'";

        if($conn->query($sql)){
            $_SESSION['msg'] = "Product updated successfully";
        }else{
            $_SESSION['msg'] = "Product to update the product:".$conn->error;
        } 
    }
    header("location:../productRegistration.php");
}



?>