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
			<div class ="imgContainer">
				<img src="img/owl.png" alt="owl">
			</div>
			<p><?php echo($helloText);?></p>	
			<?php displayDownloadLinks();?>
		</div> <!--End panel-->
		<?php displayFooter();?>
	</div><!--End overlay-->
</body>
</html>