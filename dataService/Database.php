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
    private $dbServerName = "MYSQLCONNSTR_localdb";
    private $dbUsername = "root";
    private $dbPassword = "root";
    private $dbName = "cst323_activities";
    
    //methods
    public function getConnection() {
        $conn = new mysqli($this->dbServerName, $this->dbUsername, $this->dbPassword, $this->dbName);
        
        if($conn->connect_error) {
            echo "Connection failed " .$conn->connect_error . "<br>";
        }
        else {
            return $conn;
        }
    }
}

