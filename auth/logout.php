<?php
    //Set headers to allow cross-origin requests (CORS)
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //Clear the session
    //Start session
    session_start();

    //Unset all session variables
    $_SESSION = array();

    //Destroy session
    session_destroy();

    //Logout
    echo json_encode(["message" => "Logout successfully."]); 

    // redirect to login
    // header("location: login.php");
?>