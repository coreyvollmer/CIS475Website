<?php
	global $sqlconn;
	session_start();
	include_once("../scripts/php/functions.php");
	injectHeader("Welcome"); 
	
	if(!isset($email)){
		$email = "";
	}
	
	if(!isset($comment)){
		$comment = "";
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
			<h1>Final CIS475 Web Site</h1><hr>
			<h2>Contact Us!</h2>
				<form id="contactUs" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" novalidate>
					<div class="container">
						<div class="inputContainer">
							<span class="error"><?php echo("$userErr");?></span>
						</div>
						<input type="text"  name="email" placeholder="Enter Your Email" value="<?php echo("$email"); ?>" required>
						<textarea name="comment" cols ="55" rows ="20" placeholder="Enter Your Comment"><?php echo($comment); ?></textarea>
						<div class="loginBtnContainer">
							<button type="save">Send Email</button>
						</div>
					</div>
				</form>	
			</div> <!--End panel-->	
		</div><!--End overlay-->
	<script>particlesJS.load('particles-js','particles.json', function(){});</script>
</body>
</html>