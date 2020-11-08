<!--
Project name: CST-323
    Version:   1.0
Module name:  login.php
    Version:   1.0
Author:		 Marc Teixeira
Date:         11/07/2020
Description:
    This file builds the login form and displays all the appropriate error messages based on user input. It also gives the options for setting up a new user.
    This file requires:
        loginHandler.php
        registrationHandler.php
-->

<!-- header -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/utility/_header.php'; ?>

<!-- setup for login attempts and link to loginHandler -->
<?php
   if(!isset($_SESSION['loginAttempts']) || $_SESSION['loginAttempts'] == 0){
      $_SESSION['loginAttempts'] = 10;
   }
?>
	
<section class="loginFormWrapper">
<!-- Login Form -->
    <form action="/presentation/handlers/loginHandler.php" method="POST" class="loginForm">
            <div class="message">
            	<h2>Please type your username and password to Login</h2>
            </div>
    		<p class="error"><?php if(isset($loginMessageErr)) {echo $loginMessageErr;} ?></p>
    		<label for="username">User Name:</label>
    		<input id="username" type="text" maxlength="50" name="LoginUserName" value="" <?php if($_SESSION['loginAttempts'] == 0){echo "disabled";}?>/>
    		<span class="error"><?php if(isset($userNameErr)) {echo $userNameErr;} ?></span>	
    		<br/><br/>
    		<label for="password">Password:</label>
    		<input id="password" type="password" maxlength="50" name="LoginPassword" <?php if($_SESSION['loginAttempts'] == 0){echo "disabled";}?>/>
    		<span class="error"><?php if(isset($passwordErr)) {echo $passwordErr;} ?></span>	
    		<br/><br/>
    		<input type="submit" name="Login"/>
    </form>
</section>

<!-- footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/utility/_footer.php'?>