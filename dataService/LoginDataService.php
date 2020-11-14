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
        
        echo "In Login";
        if($stmt = mysqli_prepare($conn,"SELECT * FROM users WHERE USERNAME LIKE ? AND PASSWORD LIKE BINARY ?")) {
        
            mysqli_bind_param($stmt,"ss", $userName, $password);
            mysqli_stmt_execute($stmt);
            $result = $stmt->get_result();
            mysqli_stmt_close($stmt);
            
        } else {
            
            echo "SQL error during query set up for login.";
            mysqli_close($conn);
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

