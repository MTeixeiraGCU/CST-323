<?php

/**
 * 
 * Description: handles all data information for a registering user
 * 
 * @author Marc
 * Nov 07, 2020
 */

class RegistrationDataService
{
    //methods
    /**
     * checks for a duplicate username in the database
     * @param String $userName
     * @return boolean true is there is a duplicate in the database
     */
    public function checkUser($userName) {
        
        $db = new Database();
        
        $conn = $db->getConnection();
        
        $result = mysqli_query($conn, "SELECT * FROM `users` WHERE USER_NAME LIKE '" . $userName . "'");
        
        if(mysqli_num_rows($result) == 0) {
            $conn->close();
            return false;
        }
        else {
            $conn->close();
            return true;
        }
    }
    
    public function insertUser($userName, $password, $role) {
        
        $db = new Database();
        
        $conn = $db->getConnection();
       
        $query = "INSERT INTO `users` (USER_NAME, PASSWORD, ROLE) VALUES (?, ?, ?)";
        
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sss', $userName, $password, $role);
        
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) { //successful entry
            $loginQuery = mysqli_query($conn, "SELECT * FROM `users` WHERE USER_NAME LIKE '" . $userName . "'");
            $conn->close();
            return mysqli_fetch_object($loginQuery)->USER_ID;
        }
        else { //failed attempt to register.
            $conn->close();
            return -1;
        }
    }
}
