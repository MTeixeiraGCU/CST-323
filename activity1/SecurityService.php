<?php

class SecurityService
{
    //properties
    private $userName;
    private $password;
    
    
    //constructor
    public function __construct($userName, $password) {
        $this->userName = $userName;
        $this->password = $password;
    }
    
    
    //methods
    public function authenticateLogin() {
        if($this->userName == "Tom" && $this->password == "12344321") {
            return true;
        }
        return false;
    }
}

?>

