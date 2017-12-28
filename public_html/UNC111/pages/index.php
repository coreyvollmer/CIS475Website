<?php
	include_once('../UNCscripts/functions.php');
	include_once('../UNCscripts/vars.php');
	head();
?>

<body>
	<div class="nav"><!-- Main Navigation Bar -->
		<ul>
			<?php displayNavigationMenu($careers); //PHP Function that displays navigation ?>
    	</ul>
	</div> 
	<div id="particles-js"></div>
		<div id="overylay">	
		<div class="panel">
			<?php displayIndexContent(); ?>
			<hr>
			<div style="text-align: center;">
				<h2><u>World of Work Map MTBI Result</u></h2>
				<img src="../img/wowm.png" alt="World of Work Map" height="50%" width="50%" ></img>
			</div>
			
		</div> <!--End panel-->
		
	</div><!--End overlay-->
	
	<?php injectFooter(); ?>
</body>
</html>