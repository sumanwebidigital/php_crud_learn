<?php
    //include packages
    require '../db_configuration/db_config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        $sql = "SELECT * FROM persons";
        $result = $dbConnect->query($sql);

        if($result->num_rows > 0){
            $persons = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($persons);
        }else{
            echo json_encode(["message" => "No persons found"]);
        }

        $result->free_result();
    }
?>