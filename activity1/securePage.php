<?php

include "header.php";

if(!isset($_SESSION["principle"]) || $_SESSION["principle"] == null || $_SESSION["principle"] == false) {
    header("Location: Login.html");   
}
?>