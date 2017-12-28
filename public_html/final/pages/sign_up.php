<?php
	session_start();
	include_once("../scripts/php/functions.php");
	include_once("../scripts/php/vars.php");
	injectHeader("Signup");

	if(!isset($_SESSION['message'])){
		$_SESSION['message'] = "";
	}
?>


<?php //This section is for form submission
	if($_SERVER["REQUEST_METHOD"] == "POST"){	
		$userName = ($_POST['userName']);
		if(!filter_var($userName,FILTER_VALIDATE_EMAIL)){
			$userErr = "Username must be a valid email address.";
		}
		
		$passWord = ($_POST['passWord']);
		if(!preg_match("/^[a-z\d_]{6,20}$/i",$passWord)){
			$passErr = "Password must be alphanumberic and 6-20 characters.";
		}
		echo("$userName");
		if($userErr == $passErr){
			$message = "Thank you!";
			
			$_SESSION['userName'] = $userName;
			$_SESSION['passWord'] = $passWord;
			
			include '../form_processing/insert_new_user.php';
			
			$userErr = $passErr = "";
		}
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
		<h1>Sign Up</h1><hr>
		<h2><?php echo $_SESSION['message']; ?></h2>
		
		<form id="signup" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" novalidate>
		<div class="container">
			<div class="inputContainer">
				<span class="error"><?php echo("$userErr");?></span>
				<input type="text" placeholder="Enter Email" name="userName"  value="<?php echo $userName;?>" required>
			</div>
			<div class="inputContainer">
				<span class="error"><?php echo("$passErr");?></span>
				<input type="password" placeholder="Enter Password" name="passWord"  value="<?php echo $passWord;?>" required>      
			</div>
			<div class="loginBtnContainer">
				<button type="submit">Sign Up</button>
			</div>
		</div>
		<div class="container">
			<a href="login.php">Want to login instead?</a><br>
			<a href="forgot_password.php">Forgot Password?</a>
		</div>
	</form>		
		</div> <!--End panel-->
		
	</div><!--End overlay-->
	<script>particlesJS.load('particles-js','particles.json', function(){});</script>
	
</body>
</html>