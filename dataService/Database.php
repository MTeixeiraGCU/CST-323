<?php

/**
 * 
 * Description: This class connects and gives access to a database
 * 
 * @author Marc
 * Nov 07, 2020
 */

class Database
{
    //properties
    private $dbServerName = "qn66usrj1lwdk1cc.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    private $dbUsername = "ire6vekgfa7mk6kp";
    private $dbPassword = "pi64ew7ktqlzmaja";
    private $dbName = "moq9tr12xpvg1f4e";
    
    //methods
    public function getConnection() {
        $conn = new mysqli($this->dbServerName, $this->dbUsername, $this->dbPassword, $this->dbName);
        
        if($conn->connect_error) {
            die("Connection failed! " . $conn->connect_error . "<br>");
        }
        else {
            echo "Connection made!";
            return $conn;
        }
    }
}

