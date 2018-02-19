<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of student
 *
 * @author Stephan
 */
class student extends ParentClass
{
    
    private $studentID;
    private $grade;
    private $name;
    private $surname;
    
    function __construct()
    {
        
    }
    function getStudentID()
    {
        return $this->studentID;
    }

    function getGrade()
    {
        return $this->grade;
    }

    function getName()
    {
        return $this->name;
    }

    function getSurname()
    {
        return $this->surname;
    }

    function setStudentID($studentID)
    {
        $this->studentID = $studentID;
    }

    function setGrade($grade)
    {
        $this->grade = $grade;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function setSurname($surname)
    {
        $this->surname = $surname;
    }



}
