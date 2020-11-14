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
        
        if($stmt = mysqli_prepare($conn,"SELECT * FROM users WHERE USERNAME LIKE ? AND PASSWORD LIKE BINARY ?")) {
        
            mysqli_stmt_bind_param($stmt,"ss", $userName, $password);
            mysqli_stmt_execute($stmt);
            $result = $stmt->get_result();
            mysqli_stmt_close($stmt);
            
        } else {
            
            echo "SQL error during query set up for login.";
            mysqli_close($conn);
            exit();
        }
        
        if(!$result) {
            mysqli_close($conn);
            return -1;
        }
        else if($result->num_rows == 1) {
            mysqli_close($conn);
            return $result->fetch_assoc()["ID"];
        }
        else {
            mysqli_close($conn);
            return -1;
        }
    }
}

