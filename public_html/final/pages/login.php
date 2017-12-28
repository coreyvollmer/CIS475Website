<?php
	session_start();
	include_once("../scripts/php/functions.php");
	include_once("../scripts/php/vars.php");
	injectHeader("Log In"); 
	
	if(!isset($_SESSION['loginMessage'])){
		$_SESSION['loginMessage'] = "";
	}
?>



<?php //This section is for form submission
	if($_SERVER["REQUEST_METHOD"] == "POST"){	
		
		if($loggedIn){
			session_destroy();
			header("Location:'login.php'");
		}
		
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
			
			$_SESSION['userName'] = $userName;
			$_SESSION['passWord'] = $passWord;
			
			include '../form_processing/log_user_in.php';
			
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
		<h1>Login</h1><hr>
		<?php
			if (isset($_SESSION['USER'])){
				echo "<br><div style=text-align:center;>You are logged in!</div>";
				$loggedIn=1;
			}
		?>
		<h2> <?php echo $_SESSION['loginMessage']; ?></h2>
		<form id="signIn" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" novalidate>
		<div class="container">
			<div class="inputContainer">
				<span class="error"><?php echo("$userErr");?></span>
				<input type="text" placeholder="Enter Your Email" name="userName"  value="<?php echo $userName;?>" required>
			</div>
			<div class="inputContainer">
				<span class="error"><?php echo("$passErr");?></span>
				<input type="password" placeholder="Enter Your Password" name="passWord"  value="<?php echo $passWord;?>" required>      
			</div>
			<div class="loginBtnContainer">
				<button type="submit">Login</button>
			</div>
		</div>	
	</form>	
	<?php if($loggedIn){
		injectLogoutForm();
	}else{
		injectHelperLinks();
	}
	?>
		</div> <!--End panel-->
	};
	</div><!--End overlay-->
	<script>particlesJS.load('particles-js','particles.json', function(){});</script>
	
</body>
</html>