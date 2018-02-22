<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tutorClass
 *
 * @author Stephan
 */
require_once './DBConnection.php';
class tutorClass
{
    private $classID;
    private $tutorClassID;
    private $tutorID;
    private $duration;
    private $classDate;
    
    function __construct()
    {
        
    }
    
    function getClassID()
    {
        return $this->classID;
    }

    function getTutorClassID()
    {
        return $this->tutorClassID;
    }

    function getTutorID()
    {
        return $this->tutorID;
    }

    function getDuration()
    {
        return $this->duration;
    }

    function getClassDate()
    {
        return $this->classDate;
    }

    function setClassID($classID)
    {
        $this->classID = $classID;
    }

    function setTutorClassID($tutorClassID)
    {
        $this->tutorClassID = $tutorClassID;
    }

    function setTutorID($tutorID)
    {
        $this->tutorID = $tutorID;
    }

    function setDuration($duration)
    {
        $this->duration = $duration;
    }

    function setClassDate($classDate)
    {
        $this->classDate = $classDate;
    }

       function getStudentSpecificClass()
    {
        $connection = new DBConnection();
        $data=$connection->getSpecificStudentClass($this);
        return $data;
    }

}
