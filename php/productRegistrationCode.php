

<?php 
session_start();
if ($_POST) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $details = $_POST['details'];

    print_r($_FILES['image']);
    exit;

    if (empty($name)) {
        $_SESSION['msg'] = "Please enter a Unique product name";
    }else if(empty($price) || !is_numeric($price)){
        $_SESSION['msg'] = "Please enter numeric price of the product";
    }else if(empty($details)){
        $_SESSION['msg'] = "Please enter product details";
    }else if( strlen($details) > 300){
        $_SESSION['msg'] = "Please enter product details in 300 words";
    }else{

    $_SESSION['msg']="";
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    // if(isset($_POST["submit"])) {
    //     $check = getimagesize($_FILES["image"]["tmp_name"]);
    //     if($check !== false) {
    //         $_SESSION['msg'] .= "File is an image - " . $check["mime"] . ".";
    //         $uploadOk = 1;
    //     } else {
    //         $_SESSION['msg'] .= "File is not an image.";
    //         $uploadOk = 0;
    //     }
    // }
    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['msg'] .= "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["image"]["size"] > 3000000) {
        $_SESSION['msg'] .= "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $_SESSION['msg'] .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['msg'] .= "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $_SESSION['msg'] .= "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        
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
                $_SESSION['msg'] .= "This product already registared";
            }else{
                $sql = "INSERT INTO products(name,price,details,Image) VALUES ('$name',$price,'$details','$target_file')";
                if($conn->query($sql)){
                    $_SESSION['msg'] .= "Product is registared into the system";
                }else{
                    $_SESSION['msg'] .= "Product registration failed ".$conn->error;
                }
            }
        } else {
            $_SESSION['msg'] .= "Sorry, there was an error uploading your file.";
        }
    }

        
    }

    header("location:../productRegistration.php");
}




?>