<?php
if(isset($_POST['loginButton'])) {
	//Login button was pressed
	$username = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];

	//Calling to the Login function

	$result = $account->login($username, $password);
	if($result == true){ // If login was succesfull it starts a new session
		$_SESSION['userLoggedIn']=$username;
		header("Location: index.php");
	}
}
?>