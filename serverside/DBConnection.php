<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBConnection
 *
 * @author Stephan
 */
class DBConnection
{
           private $host;
    private $user;
    private $password;
    private $database;
    private $dbLink;
    
    function __construct($database="tuber",$host = 'localhost', $user = 'root', $password = '') {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->connectDb();
    }

    function connectDb()
    {
        $this->dbLink = new mysqli($this->host, $this->user, $this->password, $this->database);
    }  
    
           function InsertClass(subjectClass $obj)
    {
           //Insert subject Class
          
            // Sanitise URL supplied values
         $name 		     = filter_var($obj->getName(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $description	  = filter_var($obj->getDescription(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
       
         
            $sql 	= "Call insertClass('".$name."','".$description."')";
            if (mysqli_query($this->dbLink, $sql))
            {
                   echo json_encode(array('message' => 'Congratulations the record ' . $name . ' was added to the database'));
            }
            else
            {
                 echo json_encode("Error");
            }
       

         
         
         
        
    }
     function InsertStudent(student $obj)
    {
        
         // Sanitise URL supplied values
         $name 		     = filter_var($obj->getName(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $surname	  = filter_var($obj->getSurname(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $grade	  = filter_var($obj->getGrade(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $parentID =filter_var($obj->getParentID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);

            $sql 	= "Call insertStudent('".$name."','".$surname."','".$grade."')";
                if (mysqli_query($this->dbLink, $sql))
            {
                   echo json_encode(array('message' => 'Congratulations the record ' . $name . ' was added to the database'));
            }
            else
            {
                 echo json_encode("Error in main");
            }
            
           $sqlTwo 	= "Call insertStudentParent('".$parentID."')";
                 if (mysqli_query($this->dbLink, $sqlTwo))
            {
                   echo json_encode(array('message' => 'Congratulations the record ' . $parentID . ' was added to the database'));
            }
            else
            {
                 echo json_encode("Error in Link");
            }

            echo json_encode(array('message' => 'Congratulations the student ' . $name . ' was added to the database'));
         }
        
        
    
    function InsertSchool(school $obj)
    {
        
         // Sanitise URL supplied values
         $name 		     = filter_var($obj->getSchoolName(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $streetName	  = filter_var($obj->getStreetName(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $city	  = filter_var($obj->getCity(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $houseNum	  = filter_var($obj->getHouseNum(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);

         // Attempt to run PDO prepared statement
        
            $sql 	= "Call insertSchool('".$name."','".$streetName."','".$city."','".$houseNum."')";
              if (mysqli_query($this->dbLink, $sql))
            {
                   echo json_encode(array('message' => 'Congratulations the record ' . $name . ' was added to the database'));
            }
             else
            {
                 echo json_encode("Error");
            }
        
    
        
    }
    function InsertContact(Contact $obj)
    {
       $contact	  = filter_var($obj->getContactNum(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $sql 	= "Call insertContact('".$contact."')";
            if (mysqli_query($this->dbLink, $sql))
            {
                 echo json_encode(array('message' => 'Congratulations the contact ' . $contact . ' was added to the database'));
            }
            else
            {
                echo json_encode("Error");
            }
          
         
           
         
    }
    
    function InsertEmail(Email $obj)
    {
            $email 		     = filter_var($obj->getEmailAddress(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
       
            $sql 	= "Call insertEmail('".$email."')";
        
           if (mysqli_query($this->dbLink, $sql))
            {
                  echo json_encode(array('message' => 'Congratulations the email ' . $email . ' was added to the database'));
            }
            else
            {
                echo json_encode("Error");
            }
          
           
      
    }
    
   function insertParent(ParentClass $obj)
   {
         $name 		     = filter_var($obj->getName(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
          $surname 		     = filter_var($obj->getSurname(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
           $username 		     = filter_var($obj->getUsername(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $password 		     = filter_var($obj->getPassword(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $streetName 		     = filter_var($obj->getStreetName(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $city 		     = filter_var($obj->getCity(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $houseNum 		     = filter_var($obj->getHouseNum(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $nationalID 		     = filter_var($obj->getNationalID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         
            $sql 	= "Call insertParent('".$username."','".$password."','".$name."','".$surname."','".$streetName."','".$city."','".$houseNum."','".$nationalID."')";
            if (mysqli_query($this->dbLink, $sql))
            {
               echo json_encode(array('message' => 'Congratulations the parent ' . $name . ' was added to the database')); 
            }
            else
            {
                  echo json_encode('error');
            }
   }
   function insertStudentClass(tutorClass $obj,  student $objTwo)
   {
                 $tutorClassID		     = filter_var($obj->getTutorClassID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                  $studentID		     = filter_var($objTwo->getStudentID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         
            $sql 	= "Call insertStudentClass('".$tutorClassID."','".$studentID."')";
          if (mysqli_query($this->dbLink, $sql))
            {
               echo json_encode(array('message' => 'Congratulations the parent ' . $name . ' was added to the database')); 
            }
            else
            {
                  echo json_encode('error');
            }
   }
   
   function insertTutor(tutor $obj)
   {
                 $name		     = filter_var($obj->getName(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                  $surname	     = filter_var($obj->getSurname(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                   $username		     = filter_var($obj->getUsername(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                  $password	     = filter_var($obj->getPassword(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                  $salary	     = filter_var($obj->getSalary(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         
            $sql 	= "Call insertTutor('".$name."','".$surname."','".$username."','".$password."','".$salary."')";
         if (mysqli_query($this->dbLink, $sql))
            {
               echo json_encode(array('message' => 'Congratulations the parent ' . $name . ' was added to the database')); 
            }
            else
            {
                  echo json_encode('error');
            }
   }
   function getClasses()
   {
      $data    = array();

 
     
       $result = $this->dbLink->query("SELECT * FROM subjectclass");
        if($result != null){
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($rows as $row) {
                $Class = new subjectClass($row['className'], $row['classDescription']);
                $Class->setClassID($row['classID']);
                array_push($data, $Class);
            }
            
        }else{
            echo "No results found";
        }
        
        return $data;
    
      
 
   }
    
   
}
    //establish the link to switch function types
   

