<?php
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
			<h1>Administrative View</h1>
			<?php displayUsers(); ?>
			<br>
			<?php displayProducts(); ?>
		</div> <!--End panel-->
		
	</div><!--End overlay-->
	<script>particlesJS.load('particles-js','particles.json', function(){});</script>
	
</body>
</html>