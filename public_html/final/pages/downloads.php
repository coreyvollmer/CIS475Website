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
			
				<div style="text-align:center; margin: 0 auto;">
					<h2>Downloads</h2>
					<ol>
						<?php displayDownloadLinks(); ?>
					</ol>
				</div>
		</div> <!--End panel-->
		
	</div><!--End overlay-->
	<script>particlesJS.load('particles-js','particles.json', function(){});</script>
	
</body>
</html>