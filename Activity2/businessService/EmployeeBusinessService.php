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
        $dbservice = new EmployeeDataService();
        
        $employee = $dbservice->findByID($id);
        
        return new Employee($id, $employee['FIRST_NAME'], $employee['LAST_NAME'], $employee['POSITION']);
    }
    
    public function findByFirstName($pattern) {
        $employees = array();
        
        $dbservice = new EmployeeDataService();
        $employees = $dbservice->findByFirstName($pattern);
        
        return $employees;
    }
    
    public function getAllEmployees() {
        $employees = array();
        
        $dbService = new EmployeeDataService();
        $employees = $dbService->getAllEmployees();
        
        return $employees;
    }
    
    public function loginUser($userName, $password) {
        $dbService = new LoginDataService();
        $userID = $dbService->loginUser($userName, $password);
        
        return $userID;
    }
    
    public function updateEmployee($id, $firstName, $lastName, $role){
        $dbService = new EmployeeDataService();
        return $dbService->updateUser($id, $firstName, $lastName, $role);
    }
    
    public function deleteEmployee($id) {
        $dbService = new EmployeeDataService();
        return $dbService->deleteUser($id);
    }
    
    public function insertEmployee($firstName, $lastName, $position){
        $dbService = new EmployeeDataService();
        return $dbService->insertUser($firstName, $lastName, $position);
    }
}

