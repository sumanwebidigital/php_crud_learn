<?php
    require '../db_configuration/db_config.php';

    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->first_name) && isset($data->last_name) && isset($data->email)) {
            $first_name = $data->first_name;
            $last_name = $data->last_name;
            $email = $data->email;

            //SQL Query
            $sql = "
                INSERT INTO persons (
                    first_name,
                    last_name,
                    email
                )
                VALUES(
                    ?,
                    ?,
                    ?
                );
            ";
            $stmt = $dbConnect->prepare($sql);
            if($stmt === false){
                http_response_code(500);
                echo json_encode(["error" => "Internal Server Error"]);
                exit();
            }

            $stmt->bind_param("sss", $first_name, $last_name, $email);
            $result = $stmt->execute();

            if(!$result){
                http_response_code(500);
                echo json_encode(["error" => "Could not create person." . $stmt->error]);
                exit();
            }

            //Created
            http_response_code(201);
            echo json_encode(["message" => "Person created successfully."]);
            $stmt->close();
        }else{
            http_response_code(405); // Method Not Allowed
            echo json_encode(["error" => "Method not allowed"]); 
        }
    }
?>