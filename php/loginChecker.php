

<?php 
session_start();
if ($_POST) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if (!isset($_SESSION['count'])) {
        $_SESSION['count'] = 0;
    }


    if (empty($email)) {
        $_SESSION['msg'] = "Please enter valid email address";
    }elseif (empty($pass)) {
        $_SESSION['msg'] = "Please enter your password";
    }else{
   
        include_once "DB/DB_Connection.php";
        $conn = DataBaseConnection();

        $sql = "SELECT * FROM users WHERE email ='$email' AND pass = '$pass' ";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            foreach($result AS $row){
                $_SESSION['userName']= $userName = $row['name'];
            }
            $_SESSION['loggedIn'] = true;
            $_SESSION['msg'] = "$userName <br>Welcome Back  ";
            unset($_SESSION['count']);
        }else{
            $_SESSION['count']++;
            if($_SESSION['count'] >= 3){
                setcookie('cookie', true, time() + 10);
            }
            $_SESSION['msg'] = "Invalid Username or Password";
        }
    }
    header("location:../login.php");

}
?>