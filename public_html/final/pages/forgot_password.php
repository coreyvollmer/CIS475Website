<?php
	global $sqlconn;
	include_once("../scripts/php/functions.php");
	injectHeader("Welcome"); 
?>

<?php //POST
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
	}	
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
			<h1>Final CIS475 Web Site</h1>
			<h3>Reset Your Password!</h3>
			<form id="editUser" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" novalidate>
				<div class="container">
					<div class="inputContainer">
						<span class="error"><?php echo("$userErr");?></span>
					</div>
					<input type="text" placeholder="Enter Your Email" name="userName"  value="" required>
					<div class="loginBtnContainer">
						<button type="save">Send Email Verification</button>
					</div>
				</div>
			</form>	
		</div> <!--End panel-->
		
	</div><!--End overlay-->
	<script>particlesJS.load('particles-js','particles.json', function(){});</script>
	
</body>
</html>