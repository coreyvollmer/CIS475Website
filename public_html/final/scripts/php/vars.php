<?php 
	//Navigation bar
	$pageNameList = Array("Home","Login","Shop","Admin","Downloads",
						  "Contact Us");
	$pageFileList = Array("index","login","shop","admin","downloads",
						  "contact_us");  

	$userName = $passWord = "";
	$userErr = $passErr = "";
	$loggedIn = 0;
	
	$signUpMessage = "";
	$logInMessage = "";
	//$_SESSION['loginMessage'] = "";

	//MySQL 
	$dbUsername = "vollmecm01";
	$dbPassword = "B00762820";
	$dbDatabase = $dbUsername;
	$dbServer = "localhost";
	//$dbServer = "bscacad3.buffalostate.edu" ;
	$sqlConn = new mysqli($dbServer, $dbUsername, $dbPassword, $dbDatabase);
	//
	

	
	
?>