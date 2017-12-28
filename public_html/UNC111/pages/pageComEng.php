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
				Computer Engineer
			</h1>
			<div style = text-align:center;>
				<a href="index.php">Home</a>
			</div>
			<table style ="	width:100%; margin-left: auto; margin-right: auto;">
				<tr>
					<td >
						<u>Nature of Work</u>
						<p>
							<?php echo("$partOneData[0]"); ?>
						</p>
					</td>
					<td>
						<u>Working Conditions</u>
						<p>
							<?php echo("$partOneData[1]"); ?>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<u>Qualifications</u>
						<p>
							<?php echo("$partOneData[2]"); ?>
						</p>
					</td>
					<td>
						<u>Who is Hiring?</u>
						<p>
							<?php echo("$partOneData[3]"); ?>
						</p>
					</td>
				</tr>				
				<tr>
					<td>
						<u>Job Outlook</u>
						<p>
							<?php echo("$partOneData[4]"); ?>
						</p>
					</td>
					<td>
						<u>Salary</u>
						<p>
							<?php echo("$partOneData[5]"); ?>
						</p>
					</td>
				</tr>		
			</table>
			<div style="text-align:center; width: 100%;"><u>Additional Information</u></div>
			<p>
				<?php echo("$partOneData[6]"); ?>
			</p>
			<hr>
			<h2>Why have I chosen this occupation?</h2>
			<table>
				<tr>
					<td>
						<u>Interests</u>
						<p>
							<?php echo("$comEngData[0]"); ?>
						</p>
					</td>
					<td>
						<u>Abilities</u>
						<p>
							<?php echo("$comEngData[1]"); ?>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<u>Values/Motivations</u>
						<p>
							<?php echo("$comEngData[2]"); ?>
						</p>
					</td>
					<td>
						<u>Preferred Mental Functioning</u>
						<p>
							<?php echo("$comEngData[3]"); ?>
						</p>
					</td>
				</tr>
			</table>
			
		</div> <!--End panel-->
		
	</div><!--End overlay-->
	<?php injectFooter(); ?>
</body>
</html>