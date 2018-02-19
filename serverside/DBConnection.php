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
    
           function InsertClass(TutorClass $obj)
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
                 echo json_encode("Error");
            }
            
           $sqlTwo 	= "Call insertStudentParent('".$parentID."')";
                 if (mysqli_query($this->dbLink, $sqlTwo))
            {
                   echo json_encode(array('message' => 'Congratulations the record ' . $parentID . ' was added to the database'));
            }
            else
            {
                 echo json_encode("Error");
            }

            echo json_encode(array('message' => 'Congratulations the student ' . $name . ' was added to the database'));
         }
        
        
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
    function InsertContact($obj)
    {
        $contact 		     = filter_var($obj->contact, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         try {
            $sql 	= "Call insertContact(?)";
          $stmt =$pdo->prepare($sql);
          $stmt->bindParam(1,$contact ,PDO::PARAM_STR);
          
          $stmt->execute();
            echo json_encode(array('message' => 'Congratulations the contact ' . $contact . ' was added to the database'));
         }
         // Catch any errors in running the prepared statement
         catch(PDOException $e)
         {
            echo $e->getMessage();
         }
    }
    
    function InsertEmail($obj,$pdo)
    {
            $email 		     = filter_var($obj->email, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         try {
            $sql 	= "Call insertEmail(?)";
          $stmt =$pdo->prepare($sql);
          $stmt->bindParam(1,$email ,PDO::PARAM_STR);
          
          $stmt->execute();
            echo json_encode(array('message' => 'Congratulations the email ' . $email . ' was added to the database'));
         }
         // Catch any errors in running the prepared statement
         catch(PDOException $e)
         {
            echo $e->getMessage();
         } 
    }
    
   function insertParent($obj,$pdo)
   {
         $name 		     = filter_var($obj->name, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
          $surname 		     = filter_var($obj->surname, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
           $username 		     = filter_var($obj->username, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $password 		     = filter_var($obj->password, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $streetName 		     = filter_var($obj->streetName, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $city 		     = filter_var($obj->city, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $houseNum 		     = filter_var($obj->houseNum, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $nationalID 		     = filter_var($obj->nationalID, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         try {
            $sql 	= "Call insertParent(?,?,?,?,?,?,?,?)";
          $stmt =$pdo->prepare($sql);
          $stmt->bindParam(1,$username ,PDO::PARAM_STR);
          $stmt->bindParam(2,$password ,PDO::PARAM_STR);
          $stmt->bindParam(3,$name ,PDO::PARAM_STR);
          $stmt->bindParam(4,$surname ,PDO::PARAM_STR);
          $stmt->bindParam(5,$streetName ,PDO::PARAM_STR);
          $stmt->bindParam(6,$city ,PDO::PARAM_STR);
          $stmt->bindParam(7,$houseNum ,PDO::PARAM_STR);
          $stmt->bindParam(8,$nationalID ,PDO::PARAM_STR);
          $stmt->execute();
            echo json_encode(array('message' => 'Congratulations the parent ' . $name . ' was added to the database'));
         }
         // Catch any errors in running the prepared statement
         catch(PDOException $e)
         {
            echo $e->getMessage();
         } 
   }
   function insertStudentClass($obj,$pdo)
   {
                 $tutorClassID		     = filter_var($obj->tutorClassID, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                  $studentID		     = filter_var($obj->studentID, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         try {
            $sql 	= "Call insertParent(?,?)";
          $stmt =$pdo->prepare($sql);
          $stmt->bindParam(1,$tutorClassID ,PDO::PARAM_INT);
          $stmt->bindParam(2,$studentID ,PDO::PARAM_INT);
         
          $stmt->execute();
            echo json_encode(array('message' => 'Congratulations the class ' . $name . ' was added to the database'));
         }
         // Catch any errors in running the prepared statement
         catch(PDOException $e)
         {
            echo $e->getMessage();
         } 
   }
   function insertTutor($obj,$pdo)
   {
                 $name		     = filter_var($obj->name, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                  $surname	     = filter_var($obj->surname, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                   $username		     = filter_var($obj->username, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                  $password	     = filter_var($obj->password, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
                  $salary	     = filter_var($obj->salary, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         try {
            $sql 	= "Call insertTutor(?,?,?,?,?)";
          $stmt =$pdo->prepare($sql);
          $stmt->bindParam(1,$name ,PDO::PARAM_STR);
          $stmt->bindParam(2,$surname ,PDO::PARAM_STR);
           $stmt->bindParam(3,$username ,PDO::PARAM_STR);
          $stmt->bindParam(4,$password ,PDO::PARAM_STR);
          $stmt->bindParam(5,$salary ,PDO::PARAM_STR);
         
          $stmt->execute();
            echo json_encode(array('message' => 'Congratulations the class ' . $name . ' was added to the database'));
         }
         // Catch any errors in running the prepared statement
         catch(PDOException $e)
         {
            echo $e->getMessage();
         } 
   }
   function getClass($pdo)
   {
      $data    = array();


   // Attempt to query database table and retrieve data
   try {
      $stmt 	= $pdo->query('SELECT * FROM subjectclass');
      while($row  = $stmt->fetch(PDO::FETCH_OBJ))
      {
         // Assign each row of data to associative array
         $data[] = $row;
      }

      // Return data as JSON
      echo json_encode($data);
   }
   catch(PDOException $e)
   {
      echo $e->getMessage();
   }
   }
    
    //establish the link to switch function types
    function getData($pdo)
    {
          $json    =  file_get_contents('http://localhost:8080/Tuber/test.php/');
          $obj     =  json_decode($json);
          
          
     
            $keySecondary = strip_tags($obj->keyTwo);
            $key     = strip_tags($obj->key);
            $this->switchKeyOne($key,$keySecondary, $obj,$pdo);
 
         
          
    }
    function switchCreate($keySecond,$obj,$pdo)
    {
            switch ($keySecond)
      {
          //Insert subject Class
          case "class":
                {
                    $this->InsertClass($obj,$pdo);     
                    break;
                }
          
                //Insert student
           case "student":
               {
                    $this->InsertStudent($obj,$pdo);     
                    break;
               }
          case "school":
               {
                    $this->InsertSchool($obj,$pdo);     
                    break;
               }
          case "contact":
               {
                    $this->InsertContact($obj,$pdo);     
                    break;
               }
           case "email":
               {
                    $this->InsertEmail($obj,$pdo);     
                    break;
               }   
           case "parent":
               {
                    $this->insertParent($obj,$pdo);     
                    break;
               }
           case "studentClass":
               {
                    $this->insertStudentClass($obj,$pdo);     
                    break;
               } 
               case "tutor":
               {
                    $this->insertTutor($obj,$pdo);     
                    break;
               } 
           default : echo 'sorry';
               break;
      }
    }
     function switchUpdate($keySecond,$obj,$pdo)
    {
        switch ($keySecond)
        {
            case "":
            {
                
             break;   
            }
           default : echo 'sorry';
               break; 
        }
    }
     function switchDelete($keySecond,$obj,$pdo)
    {
          switch ($keySecond)
        {
                 case "":
            {
                
             break;   
            }
           default : echo 'sorry';
               break;
        }
    }
     function switchSelect($keySecond,$obj,$pdo)
    {
        switch ($keySecond)
        {
            case "class":
                {
                    $this->getClass($pdo);     
                    break;
                }
                default : echo 'sorry';
               break;
        }
    }
    
    function switchKeyOne($key,$keySecond,$obj,$pdo)
    {
        switch($key)
        {
            case "create":
            {
                $this->switchCreate($keySecond, $obj, $pdo);
                break;
            }
            case "update":
            {
                $this->switchUpdate($keySecond, $obj, $pdo);
                break;
            }
              case "delete":
            {
                $this->switchDelete($keySecond, $obj, $pdo);
                break;
            }
              case "select":
            {
                $this->switchSelect($keySecond, $obj, $pdo);
                break;
            }
        default :echo 'Invalid';
            break;
                
        }
    }


