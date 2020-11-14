<!-- 
Project name: CST-323 activity 2
    Version:   1.0
Module name:  search.php
    Version:   1.0
Author:		 Marc Teixeira
Date:         11/06/2020
Description: This file allows for searching of employees.
 -->

<!-- header -->
<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/utility/_header.php'; 
include $_SERVER['DOCUMENT_ROOT'] . '/presentation/handlers/searchHandler.php';
?>		

<div class="message">
	<!-- message -->
	<h2>Search</h2>
	
	<!-- warning message if any -->
	<?php
        echo $mainMessage;
    ?>
</div>

<?php 
 
?>

<!-- footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/utility/_footer.php'?>
