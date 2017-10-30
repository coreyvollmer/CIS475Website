<!doctype html>
<html lang ="en">
<?php
	include("scripts/php/vars.php");
	include("scripts/php/functions.php");
?>
<head>
	<?php loadHeader(); ?>
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
			<!--<div class="title"></div> -->
			<p>
				<iframe src="https://docs.google.com/document/d/e/2PACX-1vQjBFxLm3xYnouDGhyoOW_iZezBI4mp4JlqGsTG1q8mg8-vuqQrFJtqjXpbBuphjuL-q3E5KXSewxSl/pub?embedded=true"></iframe>
			</p>			
		</div> <!--End panel-->
		<?php displayFooter();?>
	</div><!--End overlay-->
</body>
</html>