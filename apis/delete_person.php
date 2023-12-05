<?php 
    require '../db_configuration/db_config.php';

    if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        $data = json_decode(file_get_contents("php://input"));

        if(isset($data->id)){
            $id = $data->id;

            $sql = "
                DELETE FROM persons
                WHERE id = ?;
            ";
            $stmt = $dbConnect->prepare($sql);

            if($stmt === false){
                http_response_code(500);
                echo json_encode(["error" => "Internal Server Error"]);
                exit();
            }            

            $stmt->bind_param("i", $id);
            $result = $stmt->execute();
            if(!$result){
                http_response_code(500);
                echo json_encode(["error" => "Could not update person. " . $stmt->error]);
                exit();
            }

            http_response_code(200);
            echo json_encode(["message" => "Person deleted successfully."]);

        }else{
            http_response_code(405);
            echo json_encode(["error" => "Method not allowed"]);
        }
    }
?>