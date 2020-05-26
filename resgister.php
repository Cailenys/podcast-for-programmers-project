<?php
include("include/classes/Account.php");

$account = new Account(); // Calling the register function
$account->register();

include("include/handlers/register-handler.php");
include("include/handlers/login-handler.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Welcome to Podcast for Programmers </title>
</head>
<body>
    <div id="inputContainer">
        <form id="loginForm" action="resgister.php" method ="POST">
            <h2> Login to your account </h2>
            <p>
                <label for="loginUsername"> Username </label>
                <input id="loginUsername" name="loginUsername" type="text" placeholder ="e.g Cail" required>
            </p>
            <p>
                <label for="loginPassword"> Password </label>
                <input id="loginPassword" name="loginPassword" type="password" placeholder= "Your password" required>
            </p>
            <button type="submit" name="loginButton">Login</button>
        </form>

        <form id="registerForm" action="resgister.php" method ="POST">
            <h2> Create your free account </h2>

            <p>
                <label for="username"> Username </label>
                <input id="username" name="username" type="text" placeholder ="e.g Cail" required>
            </p>

            <p>
                <label for="email"> Email </label>
                <input id="email" name="email" type="eamil" placeholder ="e.g cailenys@ualberta.ca" required>
            </p>

            <p>
                <label for="email2"> Confim email </label>
                <input id="email2" name="email" type="eamil2" placeholder ="e.g cailenys@ualberta.ca" required>
            </p>
           
            <p>
                <label for="password"> Password </label>
                <input id="password" name="password" type="password" placeholder= "Your password" required>
                </p>

            <p>
                <label for="password2"> Confirm password </label>
                <input id="password2" name="password2" type="password"  placeholder= "Your password" required>
            </p>
            <button type="submit" name="registerButton">Sing up</button>

        </form>
  
    </div>
</body>
</html>