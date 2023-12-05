<?php 
    //Set headers to allow cross-origin requests (CORS)
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //Session
    session_start();

    //Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: ../pages/welcome.php"); //&& $username === $_SESSION["username"]
        exit;
    }

    //include packages
    require "../db_configuration/db_config.php";

    // Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = $login_err = "";


    //Processing the form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Check if username is empty
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter username";
        }else{
            $username = trim($_POST["username"]);
        }

        //Check if password is empty
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter your password";
        }else{
            $password = trim($_POST["password"]);
        }


        //Validate credentials
        if(!empty($username_err) || !empty($password_err)){
            
            $result = [
                "username" => $username_err, 
                "password" => $password_err
            ]; 

            echo json_encode(["error" => $result]); 
        }else{

            //Prepare a select statement
            $sql = "
                SELECT 
                    id, username, password
                FROM users
                WHERE username = ?; 
            ";
            $stmt = $dbConnect->prepare($sql);
            if(!$stmt){
                echo json_encode(["error" => "Oops! Something went wrong. Please try again later."]); 
            }else{
                $param_username = $username;
                $stmt->bind_param("s", $param_username);
                $result = $stmt->execute();
                if(!$result){
                    // Username doesn't exist, display a generic error message
                    echo json_encode(["error" => "Invalid username or password."]); 
                }else{
                    //Store result
                    $stmt->store_result();

                    //Check if username exists, if yes than verify password
                    if($stmt->num_rows() < 1){
                        echo json_encode(["error" => "Oops! Could not found this user. Please try again later."]); 
                    }else{
                        $stmt->bind_result($id, $username, $hashed_password);
                        $fetch = $stmt->fetch();
                        if(!$fetch){
                            echo json_encode(["error" => "Oops! Could not found username or password. Please try again later."]); 
                        }else{
                            //$verify = //password_verify($password, $hashed_password);
                            if($password != $hashed_password){
                                // Password doesn't matched, display a generic error message
                                echo json_encode(["error" => "Invalid username or password.1"]); 
                            }else{

                                echo json_encode(["message" => "Logged in successfully."]); 

                                //Start the new session
                                session_start();

                                //Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;

                                //Redirected user to welcome page
                                header("location: ../pages/welcome.php");
                            }
                        }
                    }
                }

                //Close Statement
                $stmt->close();
            }
        }
        $dbConnect->close();
    }
?>