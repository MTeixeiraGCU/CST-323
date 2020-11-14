<!--
Project name: CST-323
    Version:   1.0
Module name:  logout.php
    Version:   1.0
Author:		 Marc Teixeira
Date:         11/06/2020
Description:
    This is a small file to handle logging out the user and returning them to the Main Menu
-->

<!-- header -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/utility/_header.php'; ?>

<?php
    session_destroy();
?>

<div class="message">
	<h2>You have been logged out. Thank you! <?php //user name here?>.</h2>
	<a href="/index.php">Click Here</a> to return to the home page.
</div>

<!-- footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/utility/_footer.php'?>