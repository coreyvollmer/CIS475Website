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
				<?php createTable(1); ?>
			</div>
			<?php displayDownloadLinks();?>
			<!--</p> removed for validation which claimed there was no p in scope-->
		</div> <!--End panel-->
		<?php displayFooter();?>
	</div><!--End overlay-->
</body>
</html>