<?php

spl_autoload_register(function($class) {
   
    //get the difference in folders
    $lastDirectories = substr(getcwd(), strlen(__DIR__));
    
    $debug = false;
    
    if($debug){
        echo "getcwd = : " . getcwd() . " <br>";
        echo "__DIR__ = : " . __DIR__ . " <br>";
        echo "lastDirectories = : " . $lastDirectories . " <br>";
    }
    
    $slash = '/';
    
    //count the number of slashes
    $numberOfLastDirectories = substr_count($lastDirectories, $slash);
    
    if($debug) {
        echo "number of directories different = : " . $numberOfLastDirectories . " <br>";
    }
    
    //look up locations for class in this app
    $directories = ['businessService', 'businessService' . $slash . 'model', 'dataService', 'presentation', 'presentation' . $slash . 'handlers', 'presentation' . $slash . 'views', 'presentation' . $slash . 'views' . $slash . 'login', 'utility'];
    
    //look up each directory for the class we need
    foreach($directories as $dir) {
        $curDirectory = $dir;
        for($x = 0;$x < $numberOfLastDirectories;$x++) {
            $curDirectory = ".." . $slash . $curDirectory;
        }
        $classfile = $curDirectory . $slash . $class . '.php';
        
        if(is_readable($classfile)) {
            if(require $dir . $slash . $class . ".php") {
                if($debug) {
                    echo $dir . $slash . $class . ".php";
                }
                break;
            }
        }
    }
    
});