

<?php
session_start();
if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $Re_pass = $_POST['Re-pass'];

    if (empty($name)) {
        $_SESSION['msg'] = "Please enter you name";

    }elseif(empty($email)){
        $_SESSION['msg'] = "Please enter valid email address.";

    }elseif(empty($pass)){
        $_SESSION['msg'] = "Please enter password";

    }elseif($pass !== $Re_pass){
        $_SESSION['msg'] = "Re-entered password didn't matched.<br> Enter password again.";

    }else{
        include_once "DB/table_Create.php";
        TableCreate();

        include_once "DB/DB_Connection.php";
        $conn = DataBaseConnection();
        
        $sql = "SELECT * FROM users WHERE email = '$email'";

        $result = $conn->query($sql);

        
        if ($result->num_rows > 0) {
            $_SESSION['msg'] = "User already exists in the system";
        }else{
            $sql = "INSERT INTO users (name, email, pass) VALUES ('$name','$email', '$pass')";
            if($conn->query($sql)){
                $_SESSION['msg'] = "User is registered successfully";
            }else {
                $_SESSION['msg'] = "Error:".$conn->error;
            }
        }
    }

    header("location:../signup.php");
}
?>