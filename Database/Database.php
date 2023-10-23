<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "test_project";
    $conn = new mysqli($host , $user, $pass, $dbname);
    
    if($conn->connect_error){
        die("Database Error : " . $conn->connect_error);
    }
    else {
        echo "Connected successfully!";
    }
?>