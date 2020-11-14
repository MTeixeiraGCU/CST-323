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
    private $dbServerName = "localhost";
    private $dbUsername = "azure";
    private $dbPassword = "6#vWHD_$";
    private $dbName = "cst323_activities";
    private $dbPort = "49759";
    
    //methods
    public function getConnection() {
        $conn = mysqli_init();
        
        mysqli_real_connect($conn, $this->dbServerName, $this->dbUsername, $this->dbPassword, $this->dbName, $this->dbPort);
        
        if(mysqli_connect_errno($conn)) {
            die("Connection failed! " . $conn->connect_error . "<br>");
        }
        else {
            echo "Connection established!";
            return $conn;
        }
    }
}

