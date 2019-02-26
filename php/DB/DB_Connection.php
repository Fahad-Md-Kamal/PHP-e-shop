

<?php 

function DataBaseConnection(){

    $host = "localhost";
    $user = "root";
    $pass = "";
    $Database = "e_shop";
    $conn = new mysqli($host, $user, $pass, $Database);
    return $conn;
    
}

?>