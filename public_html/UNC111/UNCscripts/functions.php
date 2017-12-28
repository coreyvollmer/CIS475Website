
<?php
	
	function displayIndexContent(){
		echo('
			<h1>
			Corey Vollmer
			</h1>
			
			<h2>
				I have selected the following careers for my research project:
			</h2>
			<div class="list">
			<h3><b><u>MBTI</u></b></h3>
			<ul>
				<li>
					Computer Engineer
				</li>
				<li>
					Database Administrator
				</li>
				<li>
					Computer Programmer
				</li>
			</ul>
			<h3><b><u>Strong Interest Inventory</u></b></h3>
			<ul>
				<li>
					Computer Scientist
				</li>
				<li>
					Network Administrator
				</li>
			</ul>
			<h3><b><u>Self Chosen</u></b></h3>
			<ul>
				<li>
					Data Scientist
				</li>
			</ul>
			</div>
		');
	}
	
    function displayNavigationMenu($careers){

        //Names that appear in navigation
	
        //Names of files correlated with above array
        $pageFiles = array("pageComEng","pageDatAdm","pageComPro","pageComSci","pageNetAdm","pageDatSci");  
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
				<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
				<link rel="stylesheet" type="text/css" href="../UNCscripts/styles.css">
				<script src="../../scripts/js/assignments.js"></script>
				<script src="../../scripts/js/digitalClock.js"></script>
				<script src="../../scripts/js/gtag.js"></script>
				<!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-44986793-1"></script>-->
			'); // javascript includes
		echo('</head>');
	}

	function injectFooter(){
		echo("<script>particlesJS.load('particles-js','particles.json', function(){});</script>"); 
		
	}
?>