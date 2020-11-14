<?php

/**
 * 
 * Employee.php
 * Description: This class is designed to hold all the information from a single employee.
 * Author: Marc
 * Date Nov 07, 2020
 */
class Employee
{
    //properties
    private $id;
    private $firstName;
    private $lastName;
    private $position;
    
    //constructor
    public function __construct($id, $firstName, $lastName, $position) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->position = $position;
    }
    
    //getters and setters
    
    /**
     * @return String
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * @return String
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     * @return String
     */
    public function getPosition()
    {
        return $this->position;
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}

