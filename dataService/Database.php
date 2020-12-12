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
    private $dbServerName = "35.236.55.47";
    private $dbUsername = "admin";
    private $dbPassword = "root";
    private $dbName = "cst_323_activities";
    private $dbPort = "3306";
    
    //methods
    public function getConnection() {

        $conn = new mysqli($this->dbServerName, $this->dbUsername, $this->dbPassword, $this->dbName, $this->dbPort);

        if($conn->connect_error) {
            ActivityLogger::error($conn->connect_error);
            die("Connection failed! " . $conn->connect_error . "<br>");
        }
        else {
            return $conn;
        }
    }
}

