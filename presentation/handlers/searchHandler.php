<!--
Project name: CST-323
    Version:   2.0
Module name:  searchHandler.php
    Version:   1.0
Author:		 Marc Teixeira
Date:         11/07/2020
Description:
   This file handles searching for employees from the database.
-->
<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/utility/header.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Autoloader.php';
    
    //used to tell the user if something has occured
    $mainMessage = "";
    
    //check for a logged in user
    if(isset($_SESSION['User_ID']) && $_SESSION['User_ID'] > -1){
        //$bs = new EmployeeBusinessService();
        //$employees = $bs->getAllEmployees();
    }
    else {
        //They must login first
        $mainMessage = "You must login to search for employees!";
    }
    
?>
    
