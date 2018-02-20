<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Email
 *
 * @author Stephan
 */
class Email
{
   private $emailID;
   private $emailAddress;
   
   function __construct()
   {
       
   }
   function getEmailID()
   {
       return $this->emailID;
   }

   function getEmailAddress()
   {
       return $this->emailAddress;
   }

   function setEmailID($emailID)
   {
       $this->emailID = $emailID;
   }

   function setEmailAddress($emailAddress)
   {
       $this->emailAddress = $emailAddress;
   }

   function inseertEmail()
   {
        $connection = new DBConnection();
        $connection->InsertEmail($this);
   }

}
