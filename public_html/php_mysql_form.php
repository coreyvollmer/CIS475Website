<!doctype html>
<html lang ="en">
<?php
	include_once("scripts/php/vars.php"); 
	include_once("scripts/php/functions.php");
	include_once("scripts/php/formfunctions.php");
?>
<head>
	<?php loadHeader();?>
	<title>MySQL Contact Form</title>
</head>
<body onload="startTime()">
	<div id="nav"><!-- Main Navigation Bar -->
		<ul>
			<?php displayNavigationMenu();//PHP Function that displays navigation ?>
    	</ul>
	</div> 
	<div id="particles-js"> </div>
	<div id="overylay">	
		<div class="panel">
			<!--<div class="title"></div> -->
			<h1><?php echo("Contact Form");?></h1>
			<hr>
			<?php // This section runs when submit is pressed	
				if($_SERVER["REQUEST_METHOD"] == "POST"){	
						
					//Below is extensive validation for each post variable
					
					//first name
					if(empty($_POST['firstName'])){
						$firstNameErr = "First names must have at least one letter.";
					}else{
						$firstName = cleanStringData($_POST['firstName']);
						//preg_match is a boolean checker for letters, spaces and '
						if(!preg_match("/^[a-zA-Z ']*$/",$firstName)){
							$firstNameErr = "Only letters and white and apostrophes are accepted.";
						}						
					}	
					//last name
					if(empty($_POST['lastName'])){
						$lastNameErr = "Last names must have at least one letter.";
					}else{
						$lastName = cleanStringData($_POST['lastName']);
						if(!preg_match("/^[a-zA-Z ']*$/",$lastName)){
							$lastNameErr = "Only letters and white and apostrophes are accepted.";
						}	
					}
					//address
					if(empty($_POST['address'])){
						$lastNameErr = "Address is required.";
					}else{
						$address = cleanStringData($_POST['address']);
						if(!preg_match("/[A-Za-z0-9]+/",$address)){
							$addressErr = "Only alphanumeric values are accepted.";
						}	
					}	
					//city
					if(empty($_POST['city'])){
						$cityErr = "City is required.";
					}else{
						$city = cleanStringData($_POST['city']);
						if(!preg_match("/^[a-zA-Z0-9 ']*$/",$city)){
							$cityErr = "Only alphanumeric values and apostrophes are accepted.";
						}	
					}	
					//state
				    if(empty($_POST["state"])){
						$stateErr = "State is required.";
					}else{
						$contactState = cleanStringData($_POST['state']);
					}
					//zip
					if(empty($_POST['zipCode'])){
						$zipCodeErr = "ZIP Code is required.";
					}else{
						$zipCode = cleanStringData($_POST['zipCode']);
						if(!preg_match("/^[0-9]*$/",$zipCode)){
							$zipCodeErr = "Only valid ZIP Codes are accepted.";
						}	
					}		
					//phone
					if(empty($_POST['phone'])){
						$phoneErr = "Phone is required.";
					}else{
						$phone = cleanStringData($_POST['phone']);
						$phone = substr($phone,0,10);
						if(!preg_match("/^[0-9]+/",$phone)){
							$phoneErr = "Only valid phone numbers are accepted.";
						}	
					}						
					//email
					if(empty($_POST["email"])){
						$emailErr = "Email is required";
					}else{
						$email = cleanStringData($_POST['email']);
						if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
							$emailErr = "Only valid email addresses are accepted.";
						}
					} 
					//comment
					$comment = cleanStringData($_POST['comment']);
					
					//If all errors are equal, start session and insert contact into table
					if($firstNameErr == $lastNameErr && $addressErr == $cityErr &&
					$stateErr == $zipCodeErr && $phoneErr == $emailErr){				
						$thankYouMessage = "Thank you, ".$firstName." ".$lastName.". Your contact has been accepted into the database.";
						
						//start session and set session values for insertContact.php script
						session_start();
						$_SESSION['firstName'] = $firstName;
						$_SESSION['lastName'] = $lastName;
						$_SESSION['address'] = $address;
						$_SESSION['city'] = $city;
						$_SESSION['state'] = $state;
						$_SESSION['zipCode'] = $zipCode;
						$_SESSION['phone'] = $phone;
						$_SESSION['email'] = $email;
						$_SESSION['comment'] = $comment;
						
						include 'scripts/php/insertContact.php'; //inserts into database
					
						//reset empty form vars = to empty set ""
						$firstNameErr = $lastNameErr = $addressErr = $cityErr = $stateErr = $zipCodeErr = $phoneErr = $emailErr = $commentErr = "";
					}	
				}
			?>	
			
			<!--Form section -->
			<div><form id="contact" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" novalidate>
				<fieldset>
					<legend>Personal Information</legend><br>
					<label>First Name:</label>
					<div class="inputContainer">
						<span class="error"><?php echo("$firstNameErr");?></span>
						<div><input placeholder="First Name" size="50" type="text" name="firstName" value="<?php echo $firstName;?>" required></div>
					</div>
					<label>Last Name:</label>
					<div class="inputContainer">
						<span class="error"><?php echo("$lastNameErr");?></span>
						<div><input placeholder="Last Name" size="50" type="text" name="lastName" value="<?php echo $lastName;?>" required></div>
					</div> 
					<label>Address:</label>
					<div class="inputContainer">
						<span class="error"><?php echo("$addressErr");?></span>
						<div><input placeholder="Address" size="50" type="text" name="address" value="<?php echo $address;?>" required></div>
					</div>	
					<label>City:</label>
					<div class="inputContainer">
						<span class="error"><?php echo("$cityErr");?></span>
						<div><input placeholder="City" size="50" type="text" name="city" value="<?php echo $city;?>" required></div>
					</div>		
					<label>State:</label>
						<div class="inputContainer">
							<span class="error"><?php echo("$stateErr");?></span>
							<div><select name="state">
								<?php 
									$state_select = "New York";			
									foreach ($stateList as $stateValue => $stateName) {
										if($stateName == $state_select){
											$selected = 'selected = "selected"';
										}else{
											$selected = '';
										}
										echo "<option value='$stateValue' $selected>$stateName</option>";
									}
								?>
							</select></div>
						</div>
						<label>ZIP Code:</label>
						<div class="inputContainer">
							<span class="error"><?php echo("$zipCodeErr");?></span>
							<div><input placeholder="ZIP Code" size="50" type="text" name="zipCode" value="<?php echo $zipCode;?>" required></div>
						</div>	
						<label>Phone Number:</label>
						<div class="inputContainer">
							<span class="error"><?php echo("$phoneErr");?></span>
							<div><input placeholder="Phone Number" size="50" type="tel" name="phone" value="<?php echo $phone;?>" required></div>
						</div>
						<label>Email:</label>
						<div class="inputContainer">
							<span class="error"><?php echo("$emailErr");?></span>
							<div><input placeholder="Email Address" size="50" type="text" name="email" value="<?php echo $email;?>" required></div>
						</div>
						<label>Comment:</label>
						<div class="inputContainer"><textarea placeholder="Comment" name="comment" rows="3" cols="50"><?php echo($comment); ?></textarea></div>
						<br>
						<div class="inputContainer"><button class="button" name="submit" type="submit" value="submit">Submit</button></div>
					</fieldset>
				</form></div><br><br><hr><br>
			<?php displayDownloadLinks();?>
		</div> <!--End panel-->
		<?php displayFooter(); ?>
	</div><!--End overlay-->
</body>
</html>