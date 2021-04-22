<?php

    //credentials
    $dbHost = 'db';
    $dbUser = 'root';
    $dbPassword = 'root';
    $dbName = 'db_test';
    $conn   = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

?>
