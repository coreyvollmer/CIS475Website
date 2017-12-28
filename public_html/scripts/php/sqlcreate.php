<?php
	include_once("scripts/php/vars.php");
	include_once("scripts/php/functions.php");

		$ioPath = "scripts/io/cis475_io.txt";
		$columnOne = array();
        $columnTwo = array();
        $columnThree = array();
		$i = '1';
		$fh = fopen($ioPath,"rt"); //file handler
	
		$split = Array();
		
		//Input data from file with fgetcsv()
		while(($line = fgetcsv($fh)) !== FALSE){
			$columnOne[$i] = $line[0];
			$columnTwo[$i] = $line[1];
			$columnThree[$i] = $line[2];
			$i = $i + 1;
		}
		
		//Create sql connection
		$sqlConn = new mysqli($dbServer, $dbUsername, $dbPassword, $dbDatabase);
		if ($sqlConn->connect_error){
			die("Failed to connect." . $sqlConn->connect_error);
		}
		else{echo "Connected to database.<br><br>";}
		$sqlConn->query("DROP TABLE IF EXISTS monthsTable");		
		$sqlQuery = "CREATE TABLE monthsTable(
						monthsID INT(2),
						monthName CHAR(10),
						monthDays INT(2)
					)";
		if ($conn->query($sqlQuery) === TRUE){
			echo "Table has been created.<br>";
		} 
		else{
			echo "Error." . $sql . "<br>" . $aqlConn->error;
		}	
		//Insert into db with loop
		for($t = 0; $t <= 11; $t++){		
			$sqlQuery = "INSERT INTO monthsTable (monthsID, monthName, monthDays)
						 VALUES ('$columnOne[$t]', '$columnTwo[$t]', '$columnThree[$t]')";
			if($sqlConn->query($sqlQuery) === TRUE){
				echo "New record inserted.<br>";
			} 
			else{
				echo("Error: " . $sqlQuery . "<br>" . $conn->error);
			}
		}
		//echo "<br><img src=\"monthsTable.JPG\" alt=\"image\" height=\"500\" width=\"500\"><br>";
?>