<?php 
    //Set headers to allow cross-origin requests (CORS)
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //include packages
    require "../db_configuration/db_config.php";

    //define the variables with empty strings
    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";


    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        //Validate username
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter a username";
        }elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
            $username_err = "Username can only contain letter, number and underscores.";
        }else{
            //Check if username already exists
            $sql = "
                SELECT id FROM users 
                WHERE username = ?;
            ";
            $stmt = $dbConnect->prepare($sql);
            if(!$stmt){
                echo json_encode(["error" => "Oops! Something went wrong. Please try again later."]); 
            }else{
                //Bind variables with prepared statement
                $stmt->bind_param("s", $param_username);

                //Set parameter
                $param_username = trim($_POST['username']);
                $result = $stmt->execute();
                if($result){
                    $stmt->store_result();
                    if($stmt->num_rows > 0){
                        $username_err = "This username is already taken.";
                    }else{
                        $username = $_POST["username"];
                    }
                }
            }
            //Close statement
            $stmt->close();
        }



        //Validate password
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter a password.";
        }elseif(strlen(trim($_POST["password"])) < 6){
            $password_err = "Password must have atleast 6 characters.";
        }else{
            $password = trim($_POST["password"]);
        }


        //Validate confirm password
        if(empty(trim(($_POST["confirm_password"])))){
            $confirm_password_err = "Please confirm password.";
        }else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Password didnot match.";
            }
        }


        //Check input errors before inserting in database
        if (!empty($username_err) || !empty($password_err) || !empty($confirm_password_err)){

            $result = [
                "username" => $username_err, 
                "password" => $password_err, 
                "confirm_password" => $confirm_password_err
            ]; 

            echo json_encode(["error" => $result]); 
            
        }else{

            $sql = "
                INSERT INTO users (
                    username, password
                )
                VALUES (
                    ?, ?
                );
            ";
            $stmt = $dbConnect->prepare($sql);
            if(!$stmt){
                echo json_encode(["error" => "Oops! Something went wrong. Please try again later."]); 
            }else{
                $stmt->bind_param("ss", $username, $password);
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT);
                $result = $stmt->execute();
                if(!$result){
                    echo json_encode(["error" => "Oops! Something went wrong. Please try again later."]); 
                }else{
                    echo json_encode(["message" => "Account created successfully."]); 
                }
                // Close statement
                $stmt->close();
            }
        }


        //Close connection
        $dbConnect->close();
    }
?>