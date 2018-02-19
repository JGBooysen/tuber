<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of school
 *
 * @author Stephan
 */
class school
{
    private $schoolID;
    private $city;
    private $houseNum;
    private $streetName;
    private $schoolName;
    
    function __construct()
    {
        
    }
    
    function getSchoolID()
    {
        return $this->schoolID;
    }

    function getCity()
    {
        return $this->city;
    }

    function getHouseNum()
    {
        return $this->houseNum;
    }

    function getStreetName()
    {
        return $this->streetName;
    }

    function getSchoolName()
    {
        return $this->schoolName;
    }

    function setSchoolID($schoolID)
    {
        $this->schoolID = $schoolID;
    }

    function setCity($city)
    {
        $this->city = $city;
    }

    function setHouseNum($houseNum)
    {
        $this->houseNum = $houseNum;
    }

    function setStreetName($streetName)
    {
        $this->streetName = $streetName;
    }

    function setSchoolName($schoolName)
    {
        $this->schoolName = $schoolName;
    }



    
}
