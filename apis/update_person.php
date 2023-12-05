<?php
    require '../db_configuration/db_config.php';

    if($_SERVER["REQUEST_METHOD"] == 'PUT'){
        $data = json_decode(file_get_contents("php://input"));

        if(isset($data->id) && isset($data->first_name) && isset($data->last_name) && isset($data->email)){
            $id = $data->id;
            $first_name = $data->first_name;
            $last_name = $data->last_name;
            $email = $data->email;
    
            $sql = "
                UPDATE persons 
                SET first_name = ?, last_name = ?, email = ?
                WHERE id = ?;
            ";
            $stmt = $dbConnect->prepare($sql);
    
            if($stmt === false){
                http_response_code(500);
                echo json_encode(["error" => "Internal Server Error"]);
                exit();
            }
    
            $stmt->bind_param("sssi", $first_name, $last_name, $email, $id);
            $result = $stmt->execute();
            if(!$result){
                http_response_code(500);
                echo json_encode(["error" => "Could not update person. " . $stmt->error]);
                exit();
            }
    
            http_response_code(200);
            echo json_encode(["message" => "Person updated successfully."]);
            $stmt->close();
        }else{
            http_response_code(405);
            echo json_encode(["error" => "Method not allowed"]); 
        } 
    }
?>