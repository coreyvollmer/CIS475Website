<?php
	session_start();
	include_once("../scripts/php/functions.php");
	injectHeader("Welcome"); 
?>
<body>
	<div class="nav"><!-- Main Navigation Bar -->
		<ul>
			<?php displayNavigationMenu($pageNameList, $pageFileList); //PHP Function that displays navigation ?>
    	</ul>
	</div> 
	<div id="particles-js"></div>
		<div id="overylay">	
		<div class="panel">
			<h1>Final CIS475 Web Site</h1><hr>
			<h3>Welcome! This is a basic website that is a model for a retail business.</h3>
		</div> <!--End panel-->
		
	</div><!--End overlay-->
	<script>particlesJS.load('particles-js','particles.json', function(){});</script>
	
</body>
</html>