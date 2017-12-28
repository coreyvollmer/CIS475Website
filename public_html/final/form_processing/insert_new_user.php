<?php
	global $sqlConn;
	
	$userName = $sqlConn->real_escape_string($_SESSION["userName"]);
    $passWord = $sqlConn->real_escape_string($_SESSION["passWord"]);
		
		
	$takenQuery = "SELECT * FROM USERS WHERE USER='$userName'";
	$result = mysqli_query($sqlConn, $takenQuery);
	$isTaken = mysqli_num_rows($result);
	
	if($isTaken > 0){
		header("Location: ../pages/sign_up.php?signup=usertaken");
		$_SESSION["message"] = "This username is taken!";
		//echo("<script>alert('This username is taken!')</script>");
		exit();
	}else{
		//This system stores all passwords with php hashing function to keep passwords secret and secure
		$hashedPwd = AESCrypto($passWord, $action = 'e');
		
		$sqlQuery = "INSERT INTO USERS (USER, PASS, ISADMIN)
					VALUES('$userName',             
						   '$hashedPwd',
							'0')";
	
		if ($sqlConn->query($sqlQuery) === TRUE){
			
			header("Location: ../pages/sign_up.php?login=success");
			$_SESSION["message"] = "Registration Successful!";
			//echo("<script>alert('Registration Successful!')</script>");
		} 
		else{
			echo("Error."."<br>" . $sqlConn->error);
		}	
		//Close and reset
		//$_SESSION = array();
		//session_destroy();
	}
?>