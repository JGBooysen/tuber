<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author Stephan
 */
require_once './DBConnection.php';
class Contact
{
    private $contactID;
    private $contactNum;
    
    function __construct()
    {
        
    }
    function getContactID()
    {
        return $this->contactID;
    }

    function getContactNum()
    {
        return $this->contactNum;
    }

    function setContactID($contactID)
    {
        $this->contactID = $contactID;
    }

    function setContactNum($contactNum)
    {
        $this->contactNum = $contactNum;
    }

    function insertContact()
    {
        $connection = new DBConnection();
        $connection->InsertContact($this);
    }

}
