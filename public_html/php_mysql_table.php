<!doctype html>
<html lang ="en">
<?php
	include_once("scripts/php/vars.php");
	include_once("scripts/php/functions.php");
?>
<head>
	<?php loadHeader();?>
	<title><?php echo($title);?></title>
</head>
<body onload="startTime()">
	<div id="nav">
		<ul>	
			<?php displayNavigationMenu();?>
		</ul> 
	</div> 
	<div id="particles-js"> </div>
	<div id="overylay">	
		<div class="panel">
			<h1><?php echo("PHP MySQL Table");?></h1>
			<hr>
				<?php createTable(0); makeTable(1);//0 for no echos and 1 for use sql table?>	
			<!-- <p style="text-align:center"> -->
				<?php displayDownloadLinks();?>		
		</div> <!--End panel-->
		<?php displayFooter();?>
	</div><!--End overlay-->
</body>
</html>