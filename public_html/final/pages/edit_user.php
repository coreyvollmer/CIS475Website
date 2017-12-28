<?php
	session_start();
	global $sqlConn;
	include_once("../scripts/php/functions.php");
	injectHeader("Welcome"); 
?>

<?php
	$urlHash = $_GET['id'];
	$sqlQuery = "SELECT * FROM USERS WHERE PASS = '$urlHash';";
	$result = mysqli_query($sqlConn, $sqlQuery);
	if(!$result){
		echo("SQL Error.");
	}
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck == 0){
		echo("$urlHash");
	}
	if($row = mysqli_fetch_assoc($result)){
		$editUserEmail = $row['USER'];
		$editUserPassword = $row['PASS'];
		$editUserIsAdmin = $row['ISADMIN'];
	}else{
		$editUserEmail = "SQL Error";
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){	
		$userName = ($_POST['userName']);
		if(!filter_var($userName,FILTER_VALIDATE_EMAIL)){
			$userErr = "Username must be a valid email address.";
		}
		if(!$userErr == ""){
			$sqlQuery = "UPDATE USERS SET USER = 'userName' WHERE PASS='$urlHash";
			$result = mysqli_query($sqlConn, $sqlQuery);
			if(!$result){
				echo("SQL Error.");
			}
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
				<h1>Edit Email Username</h1>
				<form id="editUser" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" novalidate>
					<div class="container">
						<div class="inputContainer">
							<span class="error"><?php echo("$userErr");?></span>
						</div>
						<input type="text"  name="userName"  value="<?php echo("$editUserEmail"); ?>" required>
						<div class="loginBtnContainer">
							<button type="save">Save Changes</button>
						</div>
					</div>
				</form>	
			</div> <!--End panel-->	
		</div><!--End overlay-->
	<script>particlesJS.load('particles-js','particles.json', function(){});</script>
	
</body>
</html>