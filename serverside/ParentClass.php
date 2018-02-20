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
    private $name;
    private $surname;
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

    function getName()
    {
        return $this->name;
    }

    function getSurname()
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

    function setName($name)
    {
        $this->name = $name;
    }

    function setSurname($surname)
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
    function InseertParent()
    {
        $connection = new DBConnection();
        $connection->insertParent($this);
    }



}
