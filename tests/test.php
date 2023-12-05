<?php
// echo "<br/>";
    
    // // This is single line comment
    // # This is also single line comment
    // /*
    //     This is 
    //     multiline
    //     comment.
    // */
    // echo "Suman is back in php scripting!</br>";



    // // Syntax
    // $color = 'Blue';
    // $Color = "a";
    // $COLOR = "b";
    // echo "The sky color is " . $color . "</br>";
    // echo "The sky color is " . $Color . "</br>";
    // echo "The sky color is " . $COLOR . "</br>";

    // echo gettype($color) . "</br>";
    // echo GETTYPE($color) . "</br>";



    // // Variable
    // $v1 = (int) 1;
    // echo $v1 . "</br>";

    // $v1 = "abc";
    // echo $v1 . "</br>";

    // // Constant 
    // define("BASE_URL", "https://www.tutorialrepublic.com/php-tutorial/php-constants.php");
    // echo "Php tutorial url is. " . BASE_URL . "</br>";

    // define("SCREEN_WIDTH", 300);
    // echo "Website screen width is. " .SCREEN_WIDTH . "</br>";

    // $SCREEN_WIDTH = 400;

    // //
    // var_dump($SCREEN_WIDTH);



    // //
    // $my_str = 'If the facts do not fit the theory, change the facts.';
 
    // // Perform string replacement
    // str_replace("facts", "truth", $my_str, $count);
    
    // // Display number of replacements performed
    // echo "The text was replaced $count times.";



    // //
    // echo "axb" <=> "axa";
    // echo "<br/>";



    // //Switch-case
    // $n = (int) 100;
    // switch($n){
    //     case $n > 20:
    //         echo "Honest";
    //         break;
    //     case $n > 5:
    //         echo "Average";
    //         break;
    //     default:
    //         echo "None";
    // }
    // echo "<br/>";




    // //Array
    // //1. Indexed 
    // $names = array();
    // $names[] = "Suman";
    // $names[] = "Hari";
    // $names[] = "Raju";
    // $names[1] = "Dubay";
    // unset($names[0]);
    // print_r($names);
    // echo "<br/>";

    // //2. Associative
    // $nameValue =  array();
    // $nameValue["name"] = "Suman";
    // $nameValue["age"] = 29;
    // $nameValue["gender"] = "Male";
    // $nameValue["phone"] = "987657468";
    // print_r($nameValue);
    // echo "<br/>";

    // $nameValue2 = array("name" => "Raj", "age" => 25, "gender" => "Male", "phone" => "987657467");
    // print_r($nameValue2);
    // echo "<br/>";
    
    // //3. Multidimensional
    // $contacts = array(
    //     $nameValue,
    //     $nameValue2
    // );
    // print_r($contacts[1]["name"]);
    // echo "<br/>";
    
    // //
    // function getSum($a, $b){
    //     return $a + $b;
    // }

    // echo "Sum of 2 number is. " . getSum(5, 2);
?>