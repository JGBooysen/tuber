<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tutor
 *
 * @author Stephan
 */
class tutor
{
      private $salary;
    private $tutorID;
    private $name;
    private $surname;
   
    private $username;
    private $password;
    
    function __construct()
    {
        
    }
    function getSalary()
    {
        return $this->salary;
    }

    function getTutorID()
    {
        return $this->tutorID;
    }

    function getName()
    {
        return $this->name;
    }

    function getSurname()
    {
        return $this->surname;
    }

    function getUsername()
    {
        return $this->username;
    }

    function getPassword()
    {
        return $this->password;
    }

    function setSalary($salary)
    {
        $this->salary = $salary;
    }

    function setTutorID($tutorID)
    {
        $this->tutorID = $tutorID;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function setSurname($surname)
    {
        $this->surname = $surname;
    }

    function setUsername($username)
    {
        $this->username = $username;
    }

    function setPassword($password)
    {
        $this->password = $password;
    }

    function insertTutor()
    {
        $connection = new DBConnection();
        $connection->insertTutor($this);
    }

}
