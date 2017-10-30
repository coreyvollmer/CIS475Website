<!doctype html>
<html lang ="en">
<?php
	include_once("scripts/php/vars.php"); 
	include_once("scripts/php/functions.php");
?>
<head>
	<?php loadHeader();?>
	<title><?php echo($title);//ToDo: rename titles for pages and pass into loadHeader function?></title>
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
			<h1><?php echo("$name");?></h1>
			<hr>
			<?php io();?>
			<?php ior();//This executes function to write reverse file upon page load?>
			<p style="text-align:center">
				<?php displayDownloadLinks();?>
			<!--</p> removed for validation which claimed there was no p in scope-->
		</div> <!--End panel-->
		<?php displayFooter();?>
	</div><!--End overlay-->
</body>
</html>