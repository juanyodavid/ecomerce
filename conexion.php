<?php
    
    try{

         $con = new PDO('mysql:host=localhost;dbname=db', 'root', '');
    }catch(PDOException $prueba_error){
        echo "Error: " . $prueba_error->getMessage();
    }


?>