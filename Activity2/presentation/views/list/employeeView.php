<!-- 
Project name: CST-323
    Version:   1.0
Module name:  employeeView.php
    Version:   1.0
Author:		 Marc Teixeira
Date:         11/07/2020
Description: This file displays a single item in the catalog.
 -->

<!-- header -->
<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/utility/_header.php'; 
include $_SERVER['DOCUMENT_ROOT'] . '/presentation/handlers/employeeViewHandler.php';
?>		

<div class="message">
	<!-- message -->
	<h2>Employees</h2>
	
	<!-- warning message if any -->
	<?php
        echo $mainMessage;
    ?>
</div>

<?php 

?>

<!-- footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/utility/_footer.php'?>
