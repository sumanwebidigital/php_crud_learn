<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "demo";

    //Create database connection
    $dbConnect = new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if($dbConnect->connect_error){
        die("Connection failed: " . $dbConnect->connect_error);
    }

?>