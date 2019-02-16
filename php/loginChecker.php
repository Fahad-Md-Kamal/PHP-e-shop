

<?php 
session_start();
if ($_POST) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if (empty($email)) {
        $_SESSION['msg'] = "Please enter valid email address";
    }elseif (empty($pass)) {
        $_SESSION['msg'] = "Please enter your password";
    }else{
   
        include_once "DB/DB_Connection.php";
        $conn = DataBaseConnection();

        $sql = "SELECT * FROM users WHERE email ='$email' AND pass = '$pass' ";
        if($result = $conn->query($sql)){
            foreach($result AS $row){
                $_SESSION['userName'] = $row['name'];
            }
            $_SESSION['loggedIn'] = true;
            $_SESSION['msg'] = "You are successfully Logged In";
        }else{
            $_SESSION['msg'] = "Invalid Username or Password";
        }
    }
    header("location:../login.php");

}
?>