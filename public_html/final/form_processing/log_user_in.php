<?php
	global $sqlConn;
	
	$userName = $sqlConn->real_escape_string($_SESSION["userName"]);
    $passWord = $sqlConn->real_escape_string($_SESSION["passWord"]);
	
	$hashedPassword = AESCrypto($passWord, $action= 'e');
	
	$sqlQuery = "SELECT * FROM USERS WHERE USER='$userName';";
	$result = mysqli_query($sqlConn, $sqlQuery);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck == 0){
		echo("resultCheck == 0");
	}
	if($resultCheck < 1){
		$_SESSION['loginMessage'] = "Login Error.";
		header("Location: ../pages/login.php?login=noresulterror");
		//exit();
	}else{
		while($row = mysqli_fetch_assoc($result)){
			if($row['PASS'] == $hashedPassword){
				//Log in user		
				$_SESSION['USER'] = $row['USER'];
				$_SESSION['loginMessage'] = "Welcome back, ".$_SESSION[USER].".";
				header("Location: ../pages/login.php?login=success");
			}
			else{
				header("Location: ../pages/login.php?login=error");		
			}
		}
	}	
	$sqlConn->close();
?>