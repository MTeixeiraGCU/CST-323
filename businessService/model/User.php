<?php

/**
 * 
 * User.php
 * Description: This class is designed to hold all the information from a single user.
 * Author: Marc
 * Date Nov 07, 2020
 */
class User
{
    //properties
    private $id;
    private $userName;
    private $password;
    
    //constructor
    public function __construct($id, $userName, $password) {
        $this->id = $id;
        $this->userName = $userName;
        $this->password = $password;
    }
    
    //getters and setters

    /**
     * @return String
     */
    public function getName()
    {
        return $this->userName;
    }
    
    /**
     * @return String
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
}

