<?php
    $dbServername = "127.0.0.1";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "4353";
    $con = mysqli_connect("127.0.0.1","root","","4353");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
