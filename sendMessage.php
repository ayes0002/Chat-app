<?php


function logError($text)
{
    $file = fopen("log.txt", "a");
    fwrite($file, $text);
    fclose($file);
    
}


//logError("test");

// Check if the correct get request has been recieved to process a new message
    if(isset($_GET["newMessage"])){
        
        // Create PDO login credentials for host, db name, user name, and user password
        $inputMsg = $_GET["newMessage"];
        $db_host = "localhost";
        $db_name = "Midterm";
        $db_user = "root";
        $db_password = "root";

        
        // Connect to mySQL DB with a PDO connection
        $pdo_link = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_password);
        
        // Execute the INSERT query
        $sqlQuery = "INSERT INTO `Midterm`.`messages` (`message_id`, `message_text`, `time_stamp`) VALUES (NULL,'$inputMsg',CURRENT_TIMESTAMP);";
        
        // Create a variable that holds the INSERT query
        $result = $pdo_link->exec($sqlQuery);
        

        // Close link to PDO connection        
        $pdo_link = NULL;
    }



?>