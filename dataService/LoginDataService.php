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
        echo "Here 1";
        if($stmt = $conn->prepare("SELECT * FROM users WHERE USERNAME LIKE ? AND PASSWORD LIKE BINARY ?")) {
        
            echo "Here 2";
            $stmt->bind_param("ss", $userName, $password);
            echo "Here 3";
            $stmt->execute();
            echo "Here 4";
            $result = $stmt->get_result();
            echo "Here 5";
            $stmt->close();
            
        } else {
            
            echo "SQL error during query set up for login.";
            $conn->close();
            exit();
        }
        
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

