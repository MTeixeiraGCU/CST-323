<!--
Project name: CST-323
    Version:   2.0
Module name:  employeeViewHandler.php
    Version:   1.0
Author:		 Marc Teixeira
Date:         11/07/2020
Description:
   This file handles grabbing a list of employees from the database.
-->
<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/utility/header.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Autoloader.php';
    
    //used to tell the user if something has occured
    $mainMessage = "";
    
    $bs = new EmployeeBusinessService();
    $bs->getAllEmployees();
    
?>
    
