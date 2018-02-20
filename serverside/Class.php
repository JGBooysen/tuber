<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Class
 *
 * @author Stephan
 */
require_once './DBConnection.php';
class subjectClass {
    
    private $classID;
    private $name;
    private $description;
    
    function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }
    function getClassID()
    {
        return $this->classID;
    }

    function getName()
    {
        return $this->name;
    }

    function getDescription()
    {
        return $this->description;
    }

    function setClassID($classID)
    {
        $this->classID = $classID;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function setDescription($description)
    {
        $this->description = $description;
    }
    
    function AddClass()
    {
        $connection = new DBConnection();
        $connection->InsertClass($this); 
    }
    function getClasses()
    {
        $connection = new DBConnection();
        
        $data=$connection->getClasses();
        return $data;
    }
    



//put your code here
}
?>

