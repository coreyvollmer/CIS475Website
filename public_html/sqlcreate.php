<!doctype html>
<html lang ="en">
<?php
	include_once("scripts/php/vars.php"); 
	include_once("scripts/php/functions.php");
	include_once("scripts/php/dbvars.php");
?>
<head>
	<?php loadHeader();?>
	<title><?php echo($title);?></title>
</head>
<body onload="startTime()">
	<div id="nav"><!-- Main Navigation Bar -->
		<ul>
			<?php displayNavigationMenu();//PHP Function that displays navigation ?>
    	</ul>
	</div> 
	<div id="particles-js"> </div>
	<div id="overylay">	
		<div class="panel">
			<!--<div class="title"></div> -->
			<h1><?php echo("SQL Create Table");?></h1>
			<hr>
			<div style="text-align:center;">
				<?php createTable(); ?>
			</div>
			<?php displayDownloadLinks();?>
			<!--</p> removed for validation which claimed there was no p in scope-->
		</div> <!--End panel-->
		<?php displayFooter();?>
	</div><!--End overlay-->
</body>
</html>

<?php
	function createTable(){
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
		else{echo "Connected to database.<br><br>";}
		$sqlConn->query("DROP TABLE IF EXISTS monthsTable");		
		$sqlQuery = "CREATE TABLE monthsTable(
						monthsID INT(2),
						monthName CHAR(10),
						monthDays INT(2)
					)";
		if ($sqlConn->query($sqlQuery) === TRUE){
			echo("Table has been created.<br>");
		} 
		else{
			echo("Error." . $sql . "<br>" . $aqlConn->error);
		}	
		//Insert into db with loop
		for($t = 0; $t <= 11; $t++){		
			$sqlQuery = "INSERT INTO monthsTable (monthsID, monthName, monthDays)
						 VALUES ('$columnOne[$t]', '$columnTwo[$t]', '$columnThree[$t]')";
			if($sqlConn->query($sqlQuery) === TRUE){
				echo("Record #$t insertion successful.<br>");
			} 
			else{
				echo("Error: " . $sqlQuery . "<br>" . $sqlConn->error);
			}
		}
		echo('<br><img style="width:auto;" src="img/createTableMySQL.png" width="479" height="531" alt="image"><br>');
	}

?>