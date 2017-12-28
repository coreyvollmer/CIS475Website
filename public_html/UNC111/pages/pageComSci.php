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
			<h1>
				Computer Scientist
			</h1>
			<div style = text-align:center;>
				<a href="index.php">Home</a>
			</div>
				<h2>Why have I chosen this occupation?</h2>
			<table>
				<tr>
					<td>
						<u>Interests</u>
						<p>
							<?php echo("$comSciData[0]"); ?>
						</p>
					</td>
					<td>
						<u>Abilities</u>
						<p>
							<?php echo("$comSciData[1]"); ?>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<u>Values/Motivations</u>
						<p>
							<?php echo("$comSciData[2]"); ?>
						</p>
					</td>
					<td>
						<u>Preferred Mental Functioning</u>
						<p>
							<?php echo("$comSciData[3]"); ?>
						</p>
					</td>
				</tr>
			</table>
		</div> <!--End panel-->
		
	</div><!--End overlay-->
	<?php injectFooter(); ?>
</body>
</html>