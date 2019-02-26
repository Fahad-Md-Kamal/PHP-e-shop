<?php


function dbSetup(){
    $conn = new mysqli("localhost","root","");

    $sql = "CREATE DATABASE IF NOT EXISTS e_shop";

    if ($conn->connect_error) {
        die("Error:".$conn->connect_error);
    }
    else{
        $conn->query($sql);
    }

    include_once 'DB_Connection.php';
    $conn = DataBaseConnection();

    $sql = "CREATE TABLE users(
        id INT(10) PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(50),
        email VARCHAR(100),
        pass VARCHAR(20)
    )";

    if ($conn->error) {
        die("Failed to Create table users:" . $conn->error);
    }
    $conn->query($sql);


    $sql = "CREATE TABLE products(
        Id INT(5) PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(50),
        price INT(10),
        details VARCHAR(300),
        Image VARCHAR(30)
    )";

    if ($conn->error) {
        die("Failed to Create table users:" . $conn->error);
    }

    $conn->query($sql);

    
}
    dbSetup();
    header("location:../../index.php");
?>