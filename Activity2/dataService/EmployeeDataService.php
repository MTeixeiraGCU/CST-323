<?php

/**
 * 
 * Description: This class allows for searchs of employees in the database by several different fields. 
 * 
 * @author Marc
 * Nov 07, 2020
 */

class EmployeeDataService
{
    //methods
    public function findByFirstName($pattern) {
        
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT ID, FIRST_NAME, LAST_NAME, POSITION FROM employees WHERE FIRST_NAME LIKE ?");
        
        if(!$stmt) {
            echo "SQL error during search set up.";
            exit();
        }
        
        $like_pattern = "%" . $pattern . "%";
        $stmt->bind_param("s", $like_pattern);
        
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        if(!$result) {
            echo "SQL error during results.";
            return null;
            exit();
        }
        else {
            $userArray = array();
            
            while($user = $result->fetch_assoc()) {
                array_push($userArray, $user);
            }
            return $userArray;
        }
    }

    public function findByID($id) {
            
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT ID, FIRST_NAME, LAST_NAME, POSITION FROM employees WHERE ID LIKE ?");
        
        if(!$stmt) {
            echo "SQL error during search set up.";
            exit();
        }
        
        $stmt->bind_param("s", $id);
        
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        if(!$result) {
            echo "SQL error during results.";
            return null;
            exit();
        }
        else {
            return $result->fetch_assoc();
        }
    }

    public function getAllEmployees() {
        
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT * FROM employees");
        
        if(!$stmt) {
            echo "SQL error during search set up.";
            exit();
        }
        
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        if(!$result) {
            echo "SQL error during results.";
            return null;
            exit();
        }
        else {
            $employees = array();
            
            while($employee = $result->fetch_assoc()) {
                array_push($employees, $employee);
            }
            return $employee;
        }
    }
    
    public function insertEmployee($firstName, $lastName, $position) {
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("INSERT INTO employees (FIRST_NAME, LAST_NAME, POSITION) VALUES (?, ?, ?)");
        
        if(!$stmt) {
            echo "SQL error during while updating a user.";
            exit();
        }
        
        $stmt->bind_param("sss", $firstName, $lastName, $position);
        
        $result = $stmt->execute();
        
        if($result === false) {
            echo "SQL error during employee update results.";
            exit();
        }
    }
    
    public function updateEmployee($id, $firstName, $lastName, $position) {
        
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("UPDATE employees SET FIRST_NAME = ?, LAST_NAME = ?, POSITION = ? WHERE USER_ID = ?");
        
        if(!$stmt) {
            echo "SQL error during while updating a user.";
            exit();
        }
        
        $stmt->bind_param("ssi", $firstName, $lastName, $position, $id);
        
        $result = $stmt->execute();
        
        if($result === false) {
            echo "SQL error during employee update results.";
            exit();
        }
    }
    
    public function deleteEmployee($id) {
        
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("DELETE FROM employees WHERE ID = ?");
        
        if(!$stmt) {
            echo "SQL error while trying to remove a user.";
            exit();
        }
        
        $stmt->bind_param("i", $id);
        
        $result = $stmt->execute();
        
        if($result === false) {
            echo "SQL error while removing employee results.";
            exit();
        }
        return true;
    }
}

