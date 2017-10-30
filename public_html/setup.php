<!doctype html>
<html lang ="en">
<?php include("scripts/php/vars.php");
include("scripts/php/functions.php");

?>

<head>
	<?php loadHeader();?>
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
            <br>
            <img src="img/setup/PHP Dashboard.png" alt="PHP Dashboard">
            <img src="img/setup/PHPinfo.png" alt="PHP Info">
            <img src="img/setup/phpMyAdmin.png" alt="PHP My Admin">
		</div> <!--End panel-->
		<?php displayFooter();?>
	</div><!--End overlay-->
</body>
</html>
