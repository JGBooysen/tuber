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
    // creates the link to the db
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
    //Inserts a student into the database and links the student to the parent
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
        
        
    //inserts a new school into the database
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
    //Main insert Contact Table
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
    //Inserts Parent contact
        function insertParentContact(ParentClass $obj)
    {
        $parentID=filter_var($obj->getParentID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $sql 	= "Call insertParentContact('".$parentID."')";
            if (mysqli_query($this->dbLink, $sql))
            {
               echo json_encode(array('message' => 'Congratulations the parent Email was added to the database')); 
            }
            else
            {
                  echo json_encode('error');
            }
    }
    //inserts tutor Contact
    function insertTutorContact(tutor $obj)
    {
        $tutorID=filter_var($obj->getTutorID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $sql 	= "Call insertTutorContact('".$tutorID."')";
            if (mysqli_query($this->dbLink, $sql))
            {
               echo json_encode(array('message' => 'Congratulations the tutor Email was added to the database')); 
            }
            else
            {
                  echo json_encode('error');
            }
    }
    //Inserts the school contact
    function insertSchoolContact(School $obj)
    {
        $schoolID=filter_var($obj->getSchoolID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $sql 	= "Call insertSchoolContact('".$schoolID."')";
            if (mysqli_query($this->dbLink, $sql))
            {
               echo json_encode(array('message' => 'Congratulations the school Email was added to the database')); 
            }
            else
            {
                  echo json_encode('error');
            }
    }
    
    //Main Insert email
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
    
    
    //Inserts the parent Email
    function insertParentEmail(ParentClass $obj)
    {
        $parentID=filter_var($obj->getParentID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $sql 	= "Call insertParentEmail('".$parentID."')";
            if (mysqli_query($this->dbLink, $sql))
            {
               echo json_encode(array('message' => 'Congratulations the parent Email was added to the database')); 
            }
            else
            {
                  echo json_encode('error');
            }
    }
    //Inserts the tutor email
    function insertTutorEmail(tutor $obj)
    {
        $tutorID=filter_var($obj->getTutorID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $sql 	= "Call insertTutorEmail('".$tutorID."')";
            if (mysqli_query($this->dbLink, $sql))
            {
               echo json_encode(array('message' => 'Congratulations the tutor Email was added to the database')); 
            }
            else
            {
                  echo json_encode('error');
            }
    }
    //inserts the school email
    function insertSchoolEmail(School $obj)
    {
        $schoolID=filter_var($obj->getSchoolID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $sql 	= "Call insertSchoolEmail('".$schoolID."')";
            if (mysqli_query($this->dbLink, $sql))
            {
               echo json_encode(array('message' => 'Congratulations the school Email was added to the database')); 
            }
            else
            {
                  echo json_encode('error');
            }
    }
    //Inserts a parent into the database
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
   //links a student to attending a class
   function insertStudentClass(tutorClass $obj,  student $objTwo)
   {
                 $tutorClassID		     = filter_var($obj->getTutorClassID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                  $studentID		     = filter_var($objTwo->getStudentID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         
            $sql 	= "Call insertStudentClass('".$tutorClassID."','".$studentID."')";
          if (mysqli_query($this->dbLink, $sql))
            {
               echo json_encode(array('message' => 'Congratulations the parent   was added to the database')); 
            }
            else
            {
                  echo json_encode('error');
            }
   }
   //inserts a tutor into the database
   function insertTutor(tutor $obj)
   {
                 $name		     = filter_var($obj->getName(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                  $surname	     = filter_var($obj->getSurname(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                   $username		     = filter_var($obj->getUsername(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                  $password	     = filter_var($obj->getPassword(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                  $salary	     = filter_var($obj->getSalary(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                  $streetName 		     = filter_var($obj->getStreetName(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $city 		     = filter_var($obj->getCity(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $houseNum 		     = filter_var($obj->getHouseNum(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         
            $sql 	= "Call insertTutor('".$name."','".$surname."','".$username."','".$password."','".$salary."','".$streetName."','".$houseNum."','".$city."')";
         if (mysqli_query($this->dbLink, $sql))
            {
               echo json_encode(array('message' => 'Congratulations the parent ' . $name . ' was added to the database')); 
            }
            else
            {
                  echo json_encode('error');
            }
   }
   //Links a tutor to giving a class
   function insertTutorClass(tutorClass $obj)
   {
            $classID		     = filter_var($obj->getClassID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                  $tutorID		     = filter_var($obj->getTutorID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                  $duration		     = filter_var($obj->getDuration(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                  $classDate		     = filter_var($obj->getClassDate(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         
            $sql 	= "Call insertTutorClass('".$classID."','".$tutorID."','".$classDate."','".$duration."')";
          if (mysqli_query($this->dbLink, $sql))
            {
               echo json_encode(array('message' => 'Congratulations the class was added to the database')); 
            }
            else
            {
                  echo json_encode('error');
            }
   }
   
   //get all the class subjects available
   function getClasses()
   {
      $data    = array();
       $result = $this->dbLink->query("Call getClasses()");
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
   //get a list of all the students attending a certain class
      function getSpecificStudentClass(tutorClass $obj)
   {
          $tutorClassID		     = filter_var($obj->getTutorClassID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
      $data    = array();
       $result = $this->dbLink->query("Call getStudentSpecificClass('".$tutorClassID."')");
        if($result != null){
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($rows as $row) {
                $student = new student();
                $student->setName($row['studentName']);
                $student->setStudentID($row['studentID']);
                $student->setSurname($row['studentSurname']);
                $student->setGrade($row['grade']);
                
                array_push($data, $student);
            }
            
        }else{
            echo "No results found";
        }
        
        return $data;
    
      
 
   }
   // get all the students related to a parent
   function getstudentParent(ParentClass $obj)
   {
                 $parentID		     = filter_var($obj->getParentID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
      $data    = array();
       $result = $this->dbLink->query("Call getStudentParent('".$parentID."')");
        if($result != null){
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($rows as $row) {
                $student = new student();
                $student->setName($row['studentName']);
                $student->setStudentID($row['studentID']);
                $student->setSurname($row['studentSurname']);
                $student->setGrade($row['grade']);
                
                array_push($data, $student);
            }
            
        }else{
            echo "No results found";
        }
        
        return $data;
    
      
   }
   //get all Tutors giving a specific subject
   function getTutorsSpecificClass(subjectClass $obj)
   {
       
                   $className		     = filter_var($obj->getName(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                 
      $data    = array();
       $result = $this->dbLink->query("Call getTutorSpecificClass('".$className."')");
       
        if($result != null){
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            
            foreach ($rows as $row) {
     
                $tutor = new tutor();
                
                $tutor->setName($row['tutorName']);
                $tutor->setTutorID($row['IDTutor']);
                $tutor->setSurname($row['surname']);
                
                
                array_push($data, $tutor);
            }
            
        }else{
            echo "No results found";
        }
        
        return $data;
    
   }
   
   function getParentEmail(ParentClass $obj)
   {
              
                   $parentID		     = filter_var($obj->getParentID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                 require_once './Email.php';
      $data    = array();
       $result = $this->dbLink->query("Call getParentEmail('".$parentID."')");
       
        if($result != null){
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            
            foreach ($rows as $row) {
     
                $email = new Email();
                
                $email->setEmailAddress($row['emailAddress']);
                $email->setEmailID($row['emailID']);
            
                
                
                array_push($data, $email);
            }
            
        }else{
            echo "No results found";
        }
        
        return $data;
   }
      function getSchoolEmail(school $obj)
   {
                    $schoolID		     = filter_var($obj->getSchoolID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                    require_once './Email.php';
      $data    = array();
       $result = $this->dbLink->query("Call getSchoolEmail('".$schoolID."')");
       
        if($result != null){
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            
            foreach ($rows as $row) {
     
                $email = new Email();
                
                $email->setEmailAddress($row['emailAddress']);
                $email->setEmailID($row['emailID']);
            
                
                
                array_push($data, $email);
            }
            
        }else{
            echo "No results found";
        }
        
        return $data;
   }
       function getTutorEmail(tutor $obj)
   {
                           $tutorID		     = filter_var($obj->getTutorID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                           require_once './Email.php';
      $data    = array();
       $result = $this->dbLink->query("Call getTutorEmail('".$tutorID."')");
       
        if($result != null){
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            
            foreach ($rows as $row) {
     
                $email = new Email();
                
                $email->setEmailAddress($row['emailAddress']);
                $email->setEmailID($row['emailID']);
            
                
                
                array_push($data, $email);
            }
            
        }else{
            echo "No results found";
        }
        
        return $data;
   }
    
      function getParentContact(ParentClass $obj)
   {
                          $parentID		     = filter_var($obj->getParentID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                          require_once './Contact.php';    
      $data    = array();
       $result = $this->dbLink->query("Call getParentContact('".$parentID."')");
      
        if($result != null){
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            
            foreach ($rows as $row) {
     
                $contact = new Contact();
                
                $contact->setContactNum($row['contactNumber']);
                $contact->setContactID($row['contactID']);
               
                array_push($data, $contact);
             
            }
            
        }else{
            echo "No results found";
        }
        
        return $data;
   }
      function getSchoolContact(school $obj)
   {
                      $schoolID		     = filter_var($obj->getSchoolID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);  
                      require_once './Contact.php';  
      $data    = array();
       $result = $this->dbLink->query("Call getSchoolContact('".$schoolID."')");
       
        if($result != null){
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            
            foreach ($rows as $row) {
     
                $contact = new Contact();
                
                $contact->setContactNum($row['contactNumber']);
                $contact->setContactID($row['contactID']);
           
                array_push($data, $contact);
            }
            
        }else{
            echo "No results found";
        }
        
        return $data;
   }
       function getTutorContact(tutor $obj)
   {
                                  $tutorID		     = filter_var($obj->getTutorID(), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                 require_once './Contact.php';  
      $data    = array();
       $result = $this->dbLink->query("Call getTutorContact('".$tutorID."')");
       
        if($result != null){
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            
            foreach ($rows as $row) {
     
              
                $contact = new Contact();
                
                $contact->setContactNum($row['contactNumber']);
                $contact->setContactID($row['contactID']);
           
                array_push($data, $contact);
            }
            
        }else{
            echo "No results found";
        }
        
        return $data;
   }
}
    
   

