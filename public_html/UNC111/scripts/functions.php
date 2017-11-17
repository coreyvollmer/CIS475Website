<?php
	include_once("vars.php");


    function displayNavigationMenu(){
		$careers = array("Computer Engineer",
				"Database Administrator",
				"Computer Programmer",
				"Computer Scientist",
				"Network Administrator",
				"Data Scientist");
        //Names that appear in navigation
        $pageNames = array("","UNC 111","Resume","CCMiner","Server Setup","Arrays","IO","SQL DB","PHP MySQL Table");
                
        //Names of files correlated with above array
        $pageFiles = array("index","UNC111/Pages/index","resume","cryptoMiner","setup","lfa","io","db","php_mysql_table");  
        $style = "'display:inline;'";
        //Simple loop to display all pages, dynamic to size
        for($i=0; $i < count($careers); $i++){
            echo("<li style=$style><a href='$pageFiles[$i].php'>$careers[$i]</a></li>");
        }
    }	

	function head(){
		echo('<!doctype html>');
		echo('<html lang ="en">');
		echo('<head>'); 
			echo("<title>UNC 111</title>");
			echo('
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
			'); //meta info
			
			echo('
				<link rel="stylesheet" type="text/css" href="../scripts/styles.css">
			'); // css

			echo('
				<script src="scripts/js/assignments.js"></script>
				<script src="scripts/js/digitalClock.js"></script>
				<script src="scripts/js/gtag.js"></script>
				<!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-44986793-1"></script>-->
			'); // javascript includes
		echo('</head>');
	}
?>