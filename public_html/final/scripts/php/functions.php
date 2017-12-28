<?php
	include_once("vars.php");
	
    function displayNavigationMenu($pageNameList, $pageFileList){

        //Names that appear in navigation
	
        //Names of files correlated with above array
        $style = "display:inline;";
        //Simple loop to display all pages, dynamic to size
        for($i=0; $i < count($pageNameList); $i++){
            echo("<li style=$style><a href='$pageFileList[$i].php'>$pageNameList[$i]</a></li>");
        }
    }	

	function injectFooter(){
		echo("<script>particlesJS.load('particles-js','../scripts/json/particles.json', function(){});</script>"); 
	}
	
	function injectHeader($titleTag){
		echo('<!doctype html>');
		echo('<html lang ="en">');
		echo('<head>'); 
		echo("<title>$titleTag</title>");
		
		//meta info
		echo('
			 <meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, initial-scale=1">
			'); 
			
		// javascript includes
		echo('
			<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
			<script src="../scripts/js/digitalClock.js"></script>
			<script src="../scripts/js/gtag.js"></script>
			<!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-44986793-1"></script>-->
		'); 
		
		// css include
		echo('<link rel="stylesheet" type="text/css" href="styles.css">');	
		echo('</head>');
	}
	
	function displayDownloadLinks(){
			//download links
		$fileNames = array("index.php","login.php","sign_up.php","particles.json",
		"styles.css","../scripts/php/functions.php","../scripts/php/vars.php","admin.php",
		"edit_user.php","forgot_password.php","contact_us.php","downloads.php","../form_processing/insert_new_user.php","../form_processing/log_user_in.php"); // names of download files
		$front = "<a href='download.php?file="; //First part of link string		
		$middle = "' download>"; //Middle section of link string
		$ending = "</a><br>";	
        echo('<ol type="I" style="text-align: center; list-style-position:inside;">');
        foreach($fileNames as $name){
            echo('<li style="background-color:gray;opacity:.5;width:18vw;padding-top:20px;margin: 0 auto; float: left;">');
			echo("$front$name$middle$name$ending</li>");  	
		}
        echo('</ol>');
		echo('</div>');
    }
	
	function displayUsers(){
		global $sqlConn;
		
		$sqlQuery = "SELECT * FROM USERS;";
		$result = mysqli_query($sqlConn, $sqlQuery);
		
		if(!$result){
			echo("Error: ".mysql_error());
			exit();
		}
		$rowCount = mysqli_num_rows($result);
		if($rowCount == 0){
			echo("USERS table is empty.");
			exit();
		}
		
		
		
		echo("<hr><div style='margin:0 auto;'><table style='width:100%; border: 1px solid black;'>
			<h1>Users</h1>
			<tr'>
				<th style='width:30%;'>Email</th>
				<th style='width:30%;'>Hashed Password</th>
				<th style='width:30%;'>isAdmin </th>
				<th style='width:10%;'>Edit</th>
			</tr>
		");
		while($row = mysqli_fetch_assoc($result)){
			$rowUserName = $row["USER"];
			$rowPassWord = $row["PASS"];
			$rowIsAdmin = $row["ISADMIN"];
			$i = 0;
			echo("<tr>");
			echo("<td style='border: 1px solid black;'>$rowUserName</td>");
			echo("<td style='border: 1px solid black;'>$rowPassWord</td>");
			echo("<td style='border: 1px solid black;'>$rowIsAdmin</td>");
			injectEditLink($i,$rowPassWord);
			$i = $i + 1;
			echo("</tr>");
		}
		echo("</div></table>");
		mysqli_free_result($result);	
	}
	
	function injectEditLink($i,$hash){
		echo("<td style='border: 1px solid black;'>");
		echo("<a class = 'edit' href='edit_user.php?id=$hash'>Edit</a></td>");
	}
	
	
	function displayProducts(){
			global $sqlConn;
		
		$sqlQuery = "SELECT * FROM PRODUCTS;";
		$result = mysqli_query($sqlConn, $sqlQuery);
		
		if(!$result){
			echo("Error: ".mysql_error());
			exit();
		}
		$rowCount = mysqli_num_rows($result);
		if($rowCount == 0){
			echo("Empty PRODUCTS table.");
			exit();
		}
		
		echo("<hr><div style='margin:0 auto;'><table style='width:90%; border: 1px solid black;'>
			<h1>Products</h1>
			<tr'>
				<th style='width:30%;'>Product Name</th>
				<th style='width:30%;'>Description</th>
				<th style='width:30%;'>Price</th>
				<th style='width:10%;'>Stock</th>
			</tr>
		");
		while($row = mysqli_fetch_assoc($result)){
			$rowName = $row["NAME"];
			$rowDescription = $row["DESCRIPTION"];
			$rowPrice = $row["PRICE"];
			$rowStock = $row["STOCK"];
			echo("<tr>");
			echo("<td style='border: 1px solid black;'>$rowName</td>");
			echo("<td style='border: 1px solid black;'>$rowDescription</td>");
			echo("<td style='border: 1px solid black;'>$rowPrice</td>");
			echo("<td style='border: 1px solid black;'>$rowStock</td>");
			echo("</tr>");
		}
		echo("</div></table>");
		mysqli_free_result($result);
		$sqlConn->close();
	}
	
	function injectLogoutForm(){
		echo('<form id="signout" method="post">
		<div class="loginBtnContainer">
			<button type="submit">Logout</button>
		</div>');
	}
	
	function injectHelperLinks(){
		echo('<div class="container">
			<a href="sign_up.php">Want to sign up instead?</a><br>
			<a href="forgot_password.php">Forgot Password?</a>
		</div>');
	}
	
	//Code from https://nazmulahsan.me/simple-two-way-function-encrypt-decrypt-string/
	function AESCrypto($string, $action){
    // you may change these values to your own
    $secret_key = 'my_simple_secret_key';
    $secret_iv = 'my_simple_secret_iv';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
	}
?>