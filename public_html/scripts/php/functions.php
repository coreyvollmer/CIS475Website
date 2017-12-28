<?php
include_once("scripts/php/vars.php"); 

	function createTable($printResult){
		$dbUsername = "vollmecm01"; // Your bsc username
		$dbPassword = "B00762820"; // Your bsc Banner ID beginning with 'B'
		$dbDatabase = $dbUsername; // your-bsc-username
		$dbServer = "localhost" ;
		$ioPath = "scripts/io/cis475_io.txt";
		$columnOne = array();
        $columnTwo = array();
        $columnThree = array();
		$i = '0';
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
		else{
			if($printResult){
				echo "Connected to database.<br><br>";
			}
		}
		$sqlConn->query("DROP TABLE IF EXISTS monthsTable");		
		$sqlQuery = "CREATE TABLE monthsTable(
						monthsID INT(2),
						monthName CHAR(10),
						monthDays INT(2)
					)";
		if ($sqlConn->query($sqlQuery) === TRUE){
			if($printResult){
				echo("Table has been created.<br>");
			}
		} 
		else{
			echo("Error." . $sql . "<br>" . $aqlConn->error);
		}	
		//Insert into db with loop
		for($t = 0; $t <= 11; $t++){		
			$sqlQuery = "INSERT INTO monthsTable (monthsID, monthName, monthDays)
						 VALUES ('$columnOne[$t]', '$columnTwo[$t]', '$columnThree[$t]')";
			if($sqlConn->query($sqlQuery) === TRUE){
				if($printResult){
					echo("Record #$t insertion successful.<br>");
				}
			} 
			else{
				echo("Error: " . $sqlQuery . "<br>" . $sqlConn->error);
			}
		}
		if($printResult){
			echo('<br><img style="width:auto;" src="img/createTableMySQL.png" width="479" height="531" alt="image"><br>');
		}
	}

	function displayDB(){
		echo('<form id="createTableForm" method="POST" action="sqlcreate.php">');
		echo('<input type="submit" name="submit" value="Import Months">');
		echo("</form>");
	}

    function displayDownloadLinks(){	
        $fileNames = array("index.php","lfa.php","scripts/php/vars.php","scripts/php/functions.php","io.php"
		,"scripts/io/cis475_ior.txt","db.php","sqlcreate.php","php_mysql_table.php","php_mysql_form.php","scripts/php/formfunctions.php","scripts/php/insertContact.php"); // names of download files
        $front = "<a href='download.php?file="; //First part of link string
		//todo: Can't get download to work with file in scripts folder.
		//$front = "<a href='scripts/php/download.php?file="; //First part of link string
		
        $middle = "' download>"; //Middle section of link string
        $ending = "</a><br>";
        //$i = 0; // used to check 5th position 
		echo('<div style="text-align:center;">');
		echo('<h2>Downloads</h2>');
        echo('<ol type="I" style="text-align: center; list-style-position:inside; ">');
        foreach($fileNames as $name){
            echo('<li style="background-color:gray;opacity:.5;width:18vw;padding-top:20px;margin: 0 auto;">');
			echo("$front$name$middle$name$ending</li>");  	
		}
        echo('</ol>');
		echo('</div>');
    }
	
    function displayFooter(){
		
        //Left side
        echo('<div id="footer">SUNY Buffalo State College 2017');
        $dateTime = date('Y/m/d H:i:s');
        //Centered date
        echo('<span id="clock" style="
            display:inline-block;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);"></span>'
        );

        // validation images and footer close
        echo('<div id="validation">
				<a href="http://jigsaw.w3.org/css-validator/check/referer">
					<img style="border:0;width:88px;height:31px"
					src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Valid_XHTML_1.0.svg/1200px-Valid_XHTML_1.0.svg.png"
					alt="Valid XHTML!" />
				</a>
				<a href="http://jigsaw.w3.org/css-validator/check/referer">
					<img style="border:0;width:88px;height:31px"
					src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
					alt="Valid CSS!" />
				</a>
			</div><!--End validation-->
		</div><!--End Footer-->');
		// Background particles.js script load 
		echo('<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>');
		echo("<script>particlesJS.load('particles-js', 'scripts/json/particles.json', function(){});</script>");
    }
    
	function displayNavigationMenu(){
        //Names that appear in navigation
        $pageNames = array("Home","UNC 111","Resume","CCMiner","Server Setup","Arrays","IO","SQL DB","PHP MySQL Table","PHP MySQL Form","Final");
                
        //Names of files correlated with above array
        $pageFiles = array("index","UNC111/pages/index","resume","cryptoMiner","setup","lfa","io","db","php_mysql_table","php_mysql_form","final/pages/index");  
        $style = "'display:inline;'";
        //Simple loop to display all pages, dynamic to size
        for($i=0; $i < count($pageNames); $i++){
            echo("<li style=$style><a href='$pageFiles[$i].php'>$pageNames[$i]</a></li>");
        }
    }
	function io (){
		$ioPath = "scripts/io/cis475_io.txt";
		$columnOne = array();
        $columnTwo = array();
        $columnThree = array();
		$tdOdd = '<td style="background-color:#3B6BFF;opacity:.8;">'; //td style for odd rows
        $tdEven = '<td style="background-color:#2C4FBA;opacity:.8;">'; //td style for even rows
        $thStyle = '<th style="font-size:40px;background-color:white;color:black;opacity:.8;">';
		$i = '0';
		$fh = fopen($ioPath,"rt");
		$columnOne[$i] = "Number";
		$columnTwo[$i] = "Month";
		$columnThree[$i] = "Days";
		$i = $i + 1;
		$split = Array();
		
		//Input data from file with fgetcsv()
		while(($line = fgetcsv($fh)) !== FALSE){
			$columnOne[$i] = $line[0];
			$columnTwo[$i] = $line[1];
			$columnThree[$i] = $line[2];
			$i = $i + 1;
		}
        //table header
        echo('<table style="margin: 0 auto; width:50%;">');
        echo('<tr>');
        echo($thStyle);echo("$columnOne[0]</th>"); //col 1 header
        echo($thStyle);echo("$columnTwo[0]</th>"); //col 2 header
        echo($thStyle);echo("$columnThree[0]</th>"); // col 3 header
        echo('</tr>'); // end header row

        //table data loop
        for($t=1;$t<13;$t++){
            echo('<tr style="text-align:center">');
                if($t & 1){
                    echo($tdOdd); echo("$columnOne[$t]</td>");
                    echo($tdOdd); echo("$columnTwo[$t]</td>");
                    echo($tdOdd); echo("$columnThree[$t]</td>");
                }else{
                    echo($tdEven); echo("$columnOne[$t]</td>");
                    echo($tdEven); echo("$columnTwo[$t]</td>");
                    echo($tdEven); echo("$columnThree[$t]</td>");
                }
            echo('</tr>');
        }
        echo('</table>');
	}
	
	function ior(){
		$ioPath = "scripts/io/cis475_io.txt";
		$i = '0';
		$fh = fopen($ioPath,"rt");
		$columnOne = array();
        $columnTwo = array();
        $columnThree = array();
		$revColumnOne = array();
		$revColumnTwo = array();
		$revColumnThree = array();
		
		
		//read file into column arrays
		while(($line = fgetcsv($fh)) !== FALSE){
			$columnOne[$i] = $line[0];
			$columnTwo[$i] = $line[1];
			$columnThree[$i] = $line[2];
			$i = $i + 1;
		}
	
	
		//transfer array into reversed column arrays
		$j = 11;
			for($k=0;$k<12;$k++){
				$revColumnOne[$j] = $columnOne[$k];
				$revColumnTwo[$j] = $columnTwo[$k];
				$revColumnThree[$j] = $columnThree[$k];
				$j = $j - 1;
			}
		$outLine="";
		$outFile = fopen("scripts/io/cis475_ior.txt","w") or die("Unable to open file!");
		for($o=0;$o<12;$o++){
			$outLine = $revColumnThree[$o];
			$outLine .= ",";
			$outLine .= $revColumnTwo[$o];
			$outLine .= ",";
			$outLine .= $revColumnOne[$o];
			$outLine .="\r\n"; // new line
			fwrite($outFile,$outLine);
		}
		fclose($outFile);
	}

    function loadHeader(){
        echo('
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        '); //meta info

        echo('
            <link rel="stylesheet" type="text/css" href="scripts/css/styles.css">
        '); // css

        echo('
			<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
            <script src="scripts/js/assignments.js"></script>
            <script src="scripts/js/digitalClock.js"></script>
            <script src="scripts/js/gtag.js"></script>
            <!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-44986793-1"></script>-->
        '); // javascript includes

      
    }
    
	//makes a table, $useSQL is used as a flag to determine where to get data from
    function makeTable($useSQL){
		if($useSQL){ //for sql table page
			$dbUsername = "vollmecm01"; // Your bsc username
			$dbPassword = "B00762820"; // Your bsc Banner ID beginning with 'B'
			$dbDatabase = $dbUsername; // your-bsc-username
			$dbServer = "localhost" ;
			
			//Create sql connection
			$mysqli = new mysqli($dbServer, $dbUsername, $dbPassword, $dbDatabase);
			if ($mysqli->connect_error){
				die("Failed to connect." . $mysqli->connect_error);
			}
			else{echo "Connected to database.<br><br>";}
			$query = 'SELECT monthsID, monthName, monthDays FROM monthsTable;';
			if ($result = $mysqli->query($query)) {
				$j = '1';
				$columnOne = array("Number");
				$columnTwo = array("Month");
				$columnThree = array("Days");
				while($row = $result->fetch_assoc()) { //insert query into array variables
					$columnOne[$j] = $row['monthsID'];
					$columnTwo[$j] = $row['monthName'];
					$columnThree[$j] = $row['monthDays'];
					$j = $j + 1;
				}
			}
			$mysqli->close();
			}else{ //for array page
			$columnOne = array("Number",1,2,3,4,5,6,7,8,9,10,11,12); //Month Numbers
			$columnTwo = array("Month","January","February","March","April","May","June","July","August","September","October","November","December");
			$columnThree = array("Days",31,28,31,30,31,30,31,31,30,31,30,31); //Days Per Month
		}
	
		//styles
        $tdOdd = '<td style="background-color:#3B6BFF;opacity:.8;">'; //td style for odd rows
        $tdEven = '<td style="background-color:#2C4FBA;opacity:.8;">'; //td style for even rows
        $thStyle = '<th style="font-size:40px;background-color:white;color:black;opacity:.8;">';
        //table header
        echo('<table style="margin: 0 auto; width:50%;">');
        echo('<tr>');
        echo($thStyle);echo("$columnOne[0]</th>"); //col 1 header
        echo($thStyle);echo("$columnTwo[0]</th>"); //col 2 header
        echo($thStyle);echo("$columnThree[0]</th>"); // col 3 header
        echo('</tr>'); // end header row
        //table data loop
        for($i=1;$i<13;$i++){
            echo('<tr style="text-align:center">');
                if($i & 1){
                    echo($tdOdd); echo("$columnOne[$i]</td>");
                    echo($tdOdd); echo("$columnTwo[$i]</td>");
                    echo($tdOdd); echo("$columnThree[$i]</td>");
                }else{
                    echo($tdEven); echo("$columnOne[$i]</td>");
                    echo($tdEven); echo("$columnTwo[$i]</td>");
                    echo($tdEven); echo("$columnThree[$i]</td>");
                }
            echo('</tr>');
        }
        echo('</table>');
    }
?>