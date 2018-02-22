<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ParentClass
 *
 * @author Stephan
 */
require_once './DBConnection.php';
class ParentClass
{
    private $accountBalance;
    private $city;
    private $houseNum;
    private $nationalID;
    private $parentID;
    private $Parentname;
    private $Parentsurname;
    private $streetName;
    private $username;
    private $password;
  

        function __construct()
    {
        
    }

    
    
    function getAccountBalance()
    {
        return $this->accountBalance;
    }

    function getCity()
    {
        return $this->city;
    }

    function getHouseNum()
    {
        return $this->houseNum;
    }

    function getNationalID()
    {
        return $this->nationalID;
    }

    function getParentID()
    {
        return $this->parentID;
    }

    function getParentName()
    {
        return $this->name;
    }

    function getParentSurname()
    {
        return $this->surname;
    }

    function getStreetName()
    {
        return $this->streetName;
    }

    function getUsername()
    {
        return $this->username;
    }

    function setAccountBalance($accountBalance)
    {
        $this->accountBalance = $accountBalance;
    }

    function setCity($city)
    {
        $this->city = $city;
    }

    function setHouseNum($houseNum)
    {
        $this->houseNum = $houseNum;
    }

    function setNationalID($nationalID)
    {
        $this->nationalID = $nationalID;
    }

    function setParentID($parentID)
    {
        $this->parentID = $parentID;
    }

    function setParentName($name)
    {
        $this->name = $name;
    }

    function setParentSurname($surname)
    {
        $this->surname = $surname;
    }

    function setStreetName($streetName)
    {
        $this->streetName = $streetName;
    }

    function setUsername($username)
    {
        $this->username = $username;
    }
      function getPassword()
    {
        return $this->password;
    }

    function setPassword($password)
    {
        $this->password = $password;
    }
    function InsertParent()
    {
        $connection = new DBConnection();
        $connection->insertParent($this);
    }
 function InsertParentEmail()
    {
        $connection = new DBConnection();
        $connection->insertParentEmail($this);
    }
 function InsertParentContact()
    {
        $connection = new DBConnection();
        $connection->insertParentContact($this);
    }
    function getStudentParent()
    {
        $connection = new DBConnection();
        $data=$connection->getstudentParent($this);
        return $data;
    }
       function getParentEmail()
   {
       $connection = new DBConnection();
        $data=$connection->getParentEmail($this);
        return $data;
   }
   function getParentContact()
   {
       $connection = new DBConnection();
       $data= $connection->getParentContact($this);
       return $data;
   }
    

}
