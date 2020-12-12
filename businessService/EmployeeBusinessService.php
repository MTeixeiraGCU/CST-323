<?php

/**
 * 
 * Description: This class handles all servers for employee information.
 * 
 * @author Marc
 * Nov 06, 2020
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/Autoloader.php';

class EmployeeBusinessService
{
    
    //methods
    public function findByID($id) {
        $dbService = new EmployeeDataService();
        $dbService = new ActivityLogger($dbService);
        
        $employee = $dbService->findByID($id);
        
        return new Employee($id, $employee['FIRST_NAME'], $employee['LAST_NAME'], $employee['POSITION']);
    }
    
    public function findByFirstName($pattern) {
        $employees = array();
        
        $dbService = new EmployeeDataService();
        $dbService = new ActivityLogger($dbService);
        
        $employees = $dbService->findByFirstName($pattern);
        
        return $employees;
    }
    
    public function getAllEmployees() {
        $employees = array();
        
        $dbService = new EmployeeDataService();
        $dbService = new ActivityLogger($dbService);
        
        $employees = $dbService->getAllEmployees();
        
        return $employees;
    }
    
    public function loginUser($userName, $password) {
        $dbService = new LoginDataService();
        $dbService = new ActivityLogger($dbService);
        
        $userID = $dbService->loginUser($userName, $password);
        
        return $userID;
    }
    
    public function updateEmployee($id, $firstName, $lastName, $role){
        $dbService = new EmployeeDataService();
        $dbService = new ActivityLogger($dbService);
        
        return $dbService->updateUser($id, $firstName, $lastName, $role);
    }
    
    public function deleteEmployee($id) {
        $dbService = new EmployeeDataService();
        $dbService = new ActivityLogger($dbService);
        
        return $dbService->deleteUser($id);
    }
    
    public function insertEmployee($firstName, $lastName, $position){
        $dbService = new EmployeeDataService();
        $dbService = new ActivityLogger($dbService);
        
        return $dbService->insertUser($firstName, $lastName, $position);
    }
}

