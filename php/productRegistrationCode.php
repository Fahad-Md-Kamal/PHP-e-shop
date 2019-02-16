

<?php 
session_start();
if ($_POST) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $details = $_POST['details'];

    if (empty($name)) {
        $_SESSION['msg'] = "Please enter a Unique product name";
    }else if(empty($price) || !is_numeric($price)){
        $_SESSION['msg'] = "Please enter numeric price of the product";
    }else if(empty($details)){
        $_SESSION['msg'] = "Please enter product details";
    }else if( strlen($details) > 300){
        $_SESSION['msg'] = "Please enter product details in 300 words";
    }else{

        $ValidFileExtensions = ['jpeg','jpg','png'];

        $uploadFile = true;
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileType = $_FILES['image']['type'];
        $fileExtension = strtolower(end(explode('.', $fileName)));


        $fileNewName = time().'.'.$fileExtension;
        $uploadPath = "../img/".$fileNewName;
        
        
        
        if(!in_array($fileExtension,$ValidFileExtensions)){
                $uploadFile = false;
                $_SESSION['msg'] = "This file extension is not allowed. Please Upload a JPEG or PNG or JPG file";
            }
            if ($fileSize > 3000000) {
                $uploadFile = false;
                $_SESSION['msg'] = "This is too large, Please upload file less then 3MB";
            }

            if ($uploadFile) {
                move_uploaded_file($fileTmpName, $uploadPath);
            

                include_once "DB/DB_Connection.php";
                $conn = DataBaseConnection();
                $sql = "CREATE TABLE products(
                    Id INT(5) PRIMARY KEY AUTO_INCREMENT,
                    name VARCHAR(50),
                    price INT(10),
                    details VARCHAR(300),
                    Image VARCHAR(30)
                )";

                $conn->query($sql);
        
                $sql = "SELECT * FROM products WHERE name = '$name'";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $_SESSION['msg'] = "This product already registared";
                }else{
                    $sql = "INSERT INTO products(name,price,details,Image) 
                    VALUES ('$name',$price,'$details','$fileNewName')";
                    if($conn->query($sql)){
                        $_SESSION['msg'] = "Product is registared into the system";
                    }else{
                        $_SESSION['msg'] = "Product registration failed ".$conn->error;
                    }
                }
            }
        }

     header("location:../productRegistration.php");
}




?>