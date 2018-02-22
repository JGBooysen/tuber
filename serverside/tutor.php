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
require_once './DBConnection.php';
class tutor
{
      private $salary;
    private $tutorID;
    private $name;
    private $surname;
   private $streetName;
    private $username;
    private $password;
    private $houseNum;
    private $city;
    
    function __construct()
    {
        
    }
    function getStreetName()
    {
        return $this->streetName;
    }

    function getHouseNum()
    {
        return $this->houseNum;
    }

    function getCity()
    {
        return $this->city;
    }

    function setStreetName($streetName)
    {
        $this->streetName = $streetName;
    }

    function setHouseNum($houseNum)
    {
        $this->houseNum = $houseNum;
    }

    function setCity($city)
    {
        $this->city = $city;
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
    function insertTutorEmail()
    {
        $connection = new DBConnection();
        $connection->insertTutorEmail($this);
    }
       function insertTutorContact()
    {
        $connection = new DBConnection();
        $connection->insertTutorContact($this);
    }
   function getTutorEmail()
   {
       $connection = new DBConnection();
       $data= $connection->getTutorEmail($this);
       return $data;
   }
   function getTutorContact()
   {
       $connection = new DBConnection();
       $data= $connection->getTutorContact($this);
       return $data;
   }

}
