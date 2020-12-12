<?php
    session_start(); //needed to keep the login active for the current user
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    
    $logger = new Logger('activity_logger');
    $logger->pushHandler(new StreamHandler($_SERVER['DOCUMENT_ROOT'] . '/activities.log', Logger::DEBUG));
    
    if(isset($_SESSION['User_ID']) && $_SESSION['User_ID'] != -1) {
        
    } else {
        $_SESSION['User_ID'] = -1;
    }
?>