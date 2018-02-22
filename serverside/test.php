<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form name="testFrm" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="submit" value="Test" name="btnTest" />
        </form>
        
        <?php
        require_once './ParentClass.php';
       
        if (isset($_POST['btnTest']))
        {
           
            $obj = new ParentClass();
            $obj->setParentID(1);
            $data= $obj->getParentContact();
            foreach ($data as $value)
            {
                echo $value->getContactNum();
            
               
                echo "<br>";
                
            }
        }
        ?>
        
    </body>
</html>
