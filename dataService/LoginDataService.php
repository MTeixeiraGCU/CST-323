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
            echo "login finished!1";
            mysqli_stmt_execute($stmt);
            echo "login finished!2";
            $result = $stmt->get_result();
            echo "login finished!3";
            mysqli_stmt_close($stmt);
            echo "login finished!4";
            
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

