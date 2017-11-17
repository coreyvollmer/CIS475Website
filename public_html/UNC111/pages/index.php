<?php
	include_once('../scripts/functions.php');
	include_once('../scripts/vars.php');
	head();
?>
<body>
	<div class="nav"><!-- Main Navigation Bar -->
		<ul>
			<?php displayNavigationMenu();//PHP Function that displays navigation ?>
    	</ul>
	</div> 
	<div id="particles-js"></div>
		<div id="overylay">	
		<div class="panel">
			<!--<div class="title"></div> -->
			<h1>Corey Vollmer</h1>
			<h2>
				I have selected the following careers for my research project:
			</h2>
			<div class="list">
			<h3><b><u>MBTI</u></b></h3>
			<ul>
				<li>
					Computer Engineer
				</li>
				<li>
					Database Administrator
				</li>
				<li>
					Computer Programmer
				</li>
			</ul>
			<h3><b><u>Strong Interest Inventory</u></b></h3>
			<ul>
				<li>
					Computer Scientist
				</li>
				<li>
					Network Administrator
				</li>
			</ul>
			<h3><b><u>Self Chosen</u></b></h3>
			<ul>
				<li>
					Data Scientist
				</li>
			</ul>
			</div>
		</div> <!--End panel-->
		
	</div><!--End overlay-->
	<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
	<script>particlesJS.load('particles-js', '../scripts/particles.json', function(){});</script>  
</body>
</html>