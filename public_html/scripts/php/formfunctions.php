<?php
	include_once("vars.php");

	
	function makeContactTable(){
		global $sqlConn;
		if ($sqlConn->connect_error){
			die("Failed to connect." . $sqlConn->connect_error);
		}	else{
			echo("Connected.<br>");
		}
		
		if ($sqlConn->query("DROP TABLE IF EXISTS `contactsTable`;") === TRUE){
			echo("Table dropped.<br>");
		} else{
			echo("drop error<br>");
		}
		$sqlQuery = "CREATE TABLE `vollmecm01`.`contactsTable` (
				`contactID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`contactFirstName` varchar(15),
				`contactLastName` varchar(15),
				`contactAddress` varchar(30),
				`contactCity` varchar(30),
				`contactState` varchar(2),
				`contactZipcode` varchar(9),
				`contactPhone` varchar(10),
				`contactEmail` varchar(60),
				`contactComments` LONGTEXT,
				`contactDate` DATE
	);";
		if ($sqlConn->query($sqlQuery) === TRUE){
			echo("Table has been created.<br>");
		} 
		else{
			
			echo("Error."."<br>" . $sqlConn->error);
		}	
	}

	//This function cleans pieces of data (datum) before sending to database
	function cleanStringData($datum){
		$datum = trim($datum);
		$datum = stripslashes($datum);
		$datum = htmlspecialchars($datum);
		$datum = str_replace(array( '(', ')','-' ), '', $datum);
		return $datum;
	}
?>