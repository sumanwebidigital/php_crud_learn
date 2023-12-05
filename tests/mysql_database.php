<?Php
    //1. Create Database
    // $dbConnect = new mysqli("localhost", "root", "");

    // if ($dbConnect === false){
    //     die("Error: Could not connect. " . mysqli_connect_error());
    // }
    // echo "Connect Successfully. Host info " . mysqli_get_host_info($dbConnect) . "<br/>";
    
    // //Create database
    // $sql = "CREATE DATABASE demo";
    // $result = mysqli_query($dbConnect, $sql);
    // if ($result) {
    //     echo "Database successfully created." . "<br/>";
    // }else {
    //     echo "Error: Could not able to create database. " . mysqli_error($dbConnect) . "<br/>";
    // }




    // 2. Create Table
    // $dbConnect = new mysqli("localhost", "root", "", "demo");

    // if ($dbConnect === false){
    //     die("Error: Could not connect. " . mysqli_connect_error());
    // }
    // echo "Connect Successfully. Host info " . mysqli_get_host_info($dbConnect) . "<br/>";
    
    // //Create database
    // $sql = " 
    //     CREATE TABLE users (
    //         id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    //         username VARCHAR(50) NOT NULL UNIQUE,
    //         password VARCHAR(255) NOT NULL,
    //         created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    //     )
    // ";
    // $result = mysqli_query($dbConnect, $sql);
    // if ($result) {
    //     echo "Table successfully created." . "<br/>";
    // }else {
    //     echo "Error: Could not able to create table. " . mysqli_error($dbConnect) . "<br/>";
    // }





    //3. Inert row
    // $dbConnect = new mysqli("localhost", "root", "", "demo");

    // if ($dbConnect === false){
    //     die("Error: Could not connect. " . mysqli_connect_error());
    // }
    // echo "Connect Successfully. Host info " . mysqli_get_host_info($dbConnect) . "<br/>";
    
    // //Create database
    // $sql = "
    //     INSERT INTO persons (
    //         first_name,
    //         last_name,
    //         email
    //     )
    //     VALUES 
    //     (
    //         'John', 
    //         'Rambo', 
    //         'johnrambo@mail.com'
    //     ),
    //     (
    //         'Clark', 
    //         'Kent', 
    //         'clarkkent@mail.com'
    //     ),
    //     (
    //         'John', 
    //         'Carter', 
    //         'johncarter@mail.com'
    //     ),
    //     (
    //         'Harry', 
    //         'Potter', 
    //         'harrypotter@mail.com'
    //         )
    // ";
    // $result = mysqli_query($dbConnect, $sql);
    // if ($result) {
    //     echo "Person successfully created." . "<br/>";
    // }else {
    //     echo "Error: Could not able to insert in the table. " . mysqli_error($dbConnect) . "<br/>";
    // }




    //4. Retrieving and Inserting the Form Data
    // $dbConnect = new mysqli("localhost", "root", "", "demo");

    // if ($dbConnect === false){
    //     die("Error: Could not connect. " . mysqli_connect_error());
    // }
    // echo "Connect Successfully. Host info " . mysqli_get_host_info($dbConnect) . "<br/>";
    
    // // Escape user inputs for security
    // $first_name = mysqli_real_escape_string($dbConnect, $_REQUEST['first_name']);
    // $last_name = mysqli_real_escape_string($dbConnect, $_REQUEST['last_name']);
    // $email = mysqli_real_escape_string($dbConnect, $_REQUEST['email']);


    // //Create database
    // $sql = "
    //     INSERT INTO persons (
    //         first_name,
    //         last_name,
    //         email
    //     )
    //     VALUES 
    //     (
    //         '$first_name', 
    //         '$last_name', 
    //         '$email'
    //     )     
    // ";
    // $result = mysqli_query($dbConnect, $sql);
    // if ($result) {
    //     echo "Table successfully created." . "<br/>";
    // }else {
    //     echo "Error: Could not able to create table. " . mysqli_error($dbConnect) . "<br/>";
    // }

    // mysqli_close($dbConnect);



    //5. Prepared Statements
    // $dbConnect =  new mysqli("localhost", "root", "", "demo");
    // if ($dbConnect === false){
    //     die("Error: Could not connect. " . mysqli_connect_error());
    // }
    // echo "Database connected successfully. Host Info " . mysqli_get_host_info($dbConnect) . "</br>";

    // //Prepare an insertion statement
    // $sql = "
    //     INSERT INTO persons (
    //         first_name,
    //         last_name,
    //         email
    //     )
    //     VALUES (
    //         ?,
    //         ?,
    //         ?
    //     )
    // ";

    // $stmt = $dbConnect->prepare($sql);
    // if(!$stmt){
    //     echo "Error: Could not prepare query: $sql. " . $dbConnect->error;
    //     return;
    // }

    // //Bind parameters to prepared statement
    // $stmt->bind_param("sss", $first_name, $last_name, $email);

    // //value 1
    // // $first_name = "Ser";
    // // $last_name = "Devor";
    // // $email = "ser.devor@gmail.com";
    // // $stmt->execute();

    // //value 2
    // // $first_name = "Her";
    // // $last_name = "Devor";
    // // $email = "her.devor@gmail.com";
    // // $stmt->execute();

    // //From form body
    // $first_name = $_REQUEST["first_name"];
    // $last_name = $_REQUEST["last_name"];
    // $email = $_REQUEST["email"];
    // $stmt->execute();
    
    // echo "Record saved successfully.";

    //6. Prepared Statements Get All
    $dbConnect = new mysqli("localhost", "root", "", "demo");
    if($dbConnect->connect_error){
        die("Error: Database connection failed: " . $dbConnect->connect_error);
    }

    //UPDATE
    // $sql = "
    //     UPDATE persons 
    //     SET first_name = ?, last_name = ?
    //     WHERE id = ?; 
    // ";
    // $stmt = $dbConnect->prepare($sql);
    // if($stmt === false){
    //     die("Error:1 SQL statement failed: " . $dbConnect->error);
    // }
    // $id = 9;
    // $first_name = "Jii";
    // $last_name = "Jii";
    // $stmt->bind_param("ssi", $first_name, $last_name, $id);
    // $stmt->execute();

    //DELETE
    $sql = "
        DELETE FROM persons
        WHERE id = ?;
    ";
    $stmt = $dbConnect->prepare($sql);
    if($stmt === false){
        die("Error:1 SQL statement failed: " . $dbConnect->error);
    }
    $id = 9;
    $stmt->bind_param("i", $id);
    $stmt->execute();

    //Show all
    // $sql = "
    //     SELECT * FROM persons 
    //     where email like ? 
    //     ORDER BY last_name
    //     LIMIT 0, 3 
    // ";
    $sql = "
        SELECT * FROM persons;
    ";
    $stmt = $dbConnect->prepare($sql);
    if($stmt === false){
        die("Error: SQL statement failed: " . $dbConnect->error);
    }
    //$name = "%%";
    //$stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->bind_result($id, $first_name, $last_name, $email);

    echo "<table>";
        echo "<tr>";
            echo "<th>id</th>";
            echo "<th>first_name</th>";
            echo "<th>last_name</th>";
            echo "<th>email</th>";
        echo "</tr>";
    while($stmt->fetch()){
        //echo "First name: $first_name, Last name: $last_name, Email: $email </br>";
        echo "<tr>";
            echo "<td>" . $id . "</td>";
            echo "<td>" . $first_name . "</td>";
            echo "<td>" . $last_name . "</td>";
            echo "<td>" . $email . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    //Close connection
    $stmt->close();
    $dbConnect->close();
?>