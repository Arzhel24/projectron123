<?php
//establish connection
    $host = "localhost";
    $user = "root";
    $pass = "";
    $ron_db = "ron_db";

    //combine all variables to connect the database

    $conn = new mysqli ($host, $user, $pass, $ron_db);

    //check if connection is failed 

    if($conn->connect_error)
    {
        die("Connection failed: ". $conn->connect_error);
    }
   
?>