<!doctype html>
<?php
	$debug = 1;
	$title = "My PHP Homepage";
	$msg = "";
	if($debug){var_dump($_POST[]);}
	if(isset($_POST['subscribe'])){
		if ($_POST['email'] != ""){
			$email = $_POST['email'];
			$msg = "Thank you $email ";
		} else{
			$email = "";
			
    $name = "Corey";
    $array[1] = "array";

?>
<html lang ="en">
<head>
<title><?php echo($title);?></title>
</head>
<body>
	<h1><?php echo($title);?></h1>
    <?php
		if (isset($msg)){
			echo
    ?>
	<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
	<label for="email">Email address:</label<br />
	<label type="text" name="email" id="email" size="20" maxlength="50" val
	<label for="pswd"Password:</label<br />
	<input type="password" name="pswd" id="pswd" size="20" maxlength="15"
	<label for="subscribe"></label<br />

</body>
</html>
