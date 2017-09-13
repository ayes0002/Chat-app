<?php


// Check if the correct get request has been recieved signaling what message number to start the selection from
if(isset($_GET["getMessagesAfterLine"]))
{
	// Make empty variable to hold the response to echo back to user
	$respondText;
    $key = $_GET["getMessagesAfterLine"];
	
	// Create a variable that holds the SELECT query
	$selectQ = "SELECT * FROM messages WHERE message_id > " . $key;
	// Create PDO login credentials for host, db name, user name, and user password
	$db_host = "localhost";
    $db_name = "Midterm";
    $db_user = "root";
    $db_password = "root";
    
    $pdo_link = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_password);
	// Connect to mySQL DB with a PDO connection
	
	// Query the DB with the SELECT query and store the results
	$result = $pdo_link->query($selectQ);
	// Check if the results is set to something
	if(isset($result)){
        $arr = $result->fetchAll(PDO::FETCH_NUM);
			// Store all the results in an array using the fetchAll() set to fech a numeric array
		$respondText = json_encode($arr);	
			
			// Encode the array as JSON data
    } else {
        $respondText = "Error fetching the data";
    }
		
	
	// Else, if the results were not set then set a response message
	
	
	// echo the response text to the user
	echo $respondText;
    
    // Close link to PDO connection
	$pdo_link = NULL;
	
}

?>
