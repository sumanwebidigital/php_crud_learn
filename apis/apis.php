<?php
    //Set headers to allow cross-origin requests (CORS)
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //include packages
    require '../db_configuration/db_config.php';

    //Check the HTTP method
    $method = $_SERVER['REQUEST_METHOD'];
    switch ($method){
        case 'GET':
            require 'get_persons.php';
            break;
        case 'POST':
            require 'create_person.php';
            break;
        case 'PUT':
            require 'update_person.php';
            break;
        case 'DELETE':
            require 'delete_person.php';
            break;
        default:
            //Method not allowed
            http_response_code(405);
            echo json_encode(["error" => "Method not allowed"]);
    }

    //Close Database after of used
    $dbConnect->close();
?>