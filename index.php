<?php
    // Enable strict type checking for this file
    declare(strict_types=1);

    http_response_code(404);
    echo json_encode(["error" => "404 - Page Not Found"]);

    //require "tests/mysql_database.php";
    // require "apis/apis.php";
    // require "auth/register.php";
    // require "auth/login.php";
    // require "pages/welcome.php";


    // Extract the path from the URI
    // $request_uri = $_SERVER["REQUEST_URI"];
    // $path = parse_url($request_uri, PHP_URL_PATH);
    // print_r($path);

    // // Remove leading and trailing slashes
    // $path = trim($path, "/");
    // echo $path;
    // var_dump($path); die();

    // //Define routes
    // switch($path){
    //     case 'auth/register':
    //         require "auth/register.php";
    //         break;
    //     case 'auth/login':
    //         require "auth/login.php";
    //         break;
    //     case 'pages/welcome':
    //         require "pages/welcome.php";
    //         break;
    //     case 'apis':
    //         require "apis/apis.php";
    //         break;
    //     default:
    //         http_response_code(404);
    //         echo json_encode(["error" => "404 - Page Not Found", "path" => $path]);
    //         break; 
    // }



    


?>