<?php

/**
 * 
 * Description: handles all the data information for logins
 * 
 * @author Marc
 * Nov 07, 2020
 */

class LoginDataService
{
    //methods
    public function loginUser($userName, $password) {
        
        $db = new Database();
        
        $conn = $db->getConnection();
        
        $stmt = $conn->prepare("SELECT * FROM `users` WHERE USERNAME LIKE ? AND PASSWORD LIKE BINARY ?");
        
        if(!$stmt) {
            echo "SQL error during query set up.";
            exit();
        }
        
        $stmt->bind_param("ss", $userName, $password);
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        if(!$result) {
            $conn->close();
            return -1;
        }
        else if($result->num_rows == 1) {
            $conn->close();
            return $result->fetch_assoc()["ID"];
        }
        else {
            $conn->close();
            return -1;
        }
    }
}

