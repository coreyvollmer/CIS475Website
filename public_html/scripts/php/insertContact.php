<?php
	global $sqlConn;
	//Grab vars from session	
    $firstName = $sqlConn->real_escape_string($_SESSION["firstName"]);
    $lastName = $sqlConn->real_escape_string($_SESSION["lastName"]);
    $address = $sqlConn->real_escape_string($_SESSION["address"]);
    $city = $sqlConn->real_escape_string($_SESSION["city"]);
    $state = $sqlConn->real_escape_string($_SESSION["state"]);
    $zipCode = $sqlConn->real_escape_string($_SESSION["zipCode"]);
    $phone = $sqlConn->real_escape_string($_SESSION["phone"]);
    $email = $sqlConn->real_escape_string($_SESSION["email"]);
    $comment = $sqlConn->real_escape_string($_SESSION["comment"]);
    $date = date("Y/m/d");
	

    $sqlQuery   = "INSERT into contactsTable (contactFirstName,contactLastName,contactAddress,contactCity,contactState,contactZipCode,contactPhone,contactEmail,contactComments,contactDate) 
    VALUES('".$firstName."','".             
                $lastName."','".
                $address."','".
                $city."','".
                $state."','".
                $zipCode."','".
                $phone."','".
                $email."','".
                $comment."','".
                $date."')";
    if ($sqlConn->query($sqlQuery) === TRUE){
		echo("<div style =\"text-align:center;\">$thankYouMessage</div>");
	} 
	else{
		echo("Error."."<br>" . $sqlConn->error);
	}	
	//Close and reset
	$sqlConn->close();
	$_SESSION = array();
	session_destroy();
?> 