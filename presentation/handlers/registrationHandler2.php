<!--
Project name: CST-323
    Version:   1.0
Module name:  registrationHandler2.php
    Version:   2.0
Author:		 Marc Teixeira
Date:         11/07/2020
Description:
   This file checks the database for duplicates in the registration process and it also handles the PHP code required for the second page of the registration. If all the users
   information has been checked it will enter them into the database and log them in for the first time.
-->

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/utility/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Autoloader.php';

// define error message variables and set to empty values
$firstNameErr = $lastNameErr = "";
$regMessageErr = "* required fields";


//check each of the required fields and populate thier error message as necessary.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $ready = true; 
    
    //check for empty fields
        
    if (empty($address->getFirstName())) {
        $firstNameErr = "You must enter a first name!";
        $ready = FALSE;
    }
    
    if (empty($address->getLastName())) {
        $lastNameErr = "You must enter a last name!";
        $ready = FALSE;
    }
    
    //runs only if all fields that are required have been filled out
    if($ready) {
        
        $user = unserialize($_SESSION['User']);

        $firstName = $address->getFirstName();
        $middleName = $address->getMiddleName();
        $lastName = $address->getLastName();
        $address1 = $address->getAddressLineOne();
        $address2 = $address->getAddressLineTwo();
        $city = $address->getCity();
        $state = $address->getState();
        $zipCode = $address->getPostalCode();
        $country = $address->getCountry();
        
        
        //insert the new user
        $bs = new EmployeeBusinessService();
        
        $_SESSION['User_ID'] = $bs->insertUser($user->getName(), $user->getPassword(), $user->getRole());
        
        if($_SESSION['User_ID'] > -1) { //successfully registered
            $_SESSION["User"] = serialize(new User($_SESSION['User_ID'], $user->getName(), $user->getPassword(), $user->getRole()));
            $_SESSION['UserName'] = $user->getName();
            
            //generate a new cart for this user
            $bs->generateNewCart($_SESSION['User_ID']);
        }
        else { //failed to insert new user
            $regMessageErr = "Could not create new user!";
            include $_SERVER['DOCUMENT_ROOT'] . '/presentation/views/login/registrationFormPage2.php';
            exit();
        }
        
        if($bs->insertAddress($_SESSION['User_ID'], $firstName, $middleName, $lastName, $address1, $address2, $city, $state, $zipCode, $country)) {
            header("Location: /presentation/views/login/registered.php");
        }
        else {
            $mainMessageErr = "An error has occurred. You were not regester.";
            include $_SERVER['DOCUMENT_ROOT'] . '/presentation/views/login/registrationFormPage2.php';
            exit();
        }
            
    } else {
        $regMessageErr = "* required fields";
        include $_SERVER['DOCUMENT_ROOT'] . '/presentation/views/login/registrationFormPage2.php';
    }
    
}
?>