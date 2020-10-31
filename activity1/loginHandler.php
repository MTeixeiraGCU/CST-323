<?php

include "header.php";
require_once "SecurityService.php";

$sService = new SecurityService($_POST["UserName"], $_POST["Password"]);

if($sService->authenticateLogin()) {
    $_SESSION["principle"] = true;
    include "loginPassed.php";
}
else {
    $_SESSION["principle"] = false;
    include "loginFailed.php";
}
?>

