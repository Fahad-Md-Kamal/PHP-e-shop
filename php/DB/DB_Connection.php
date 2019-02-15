

<?php 


function DataBaseCreate(){
$host = "localhost";
$user = "root";
$pass = "";

    $conn = new mysqli($host,$user,$pass);

    $sql = "CREATE DATABASE IF NOT EXISTS e_shop";

    if ($conn->connect_error) {
        die("Error:".$conn->connect_error);
    }
    else{
        $conn->query($sql);
    }
}

function DataBaseConnection(){
    DataBaseCreate();

    $host = "localhost";
    $user = "root";
    $pass = "";
    $Database = "e_shop";
    $conn = new mysqli($host, $user, $pass, $Database);
    return $conn;
    
}



?>