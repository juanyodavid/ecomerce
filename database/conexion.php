<?php
    
    try{
        //  $conexion = new PDO('mysql:host=dontcompy.ipagemysql.com;dbname=sesiondb', 'sesionadmin', 'SesionAdmin2019*');
         $con = new PDO('mysql:host=localhost;dbname=db', 'root', '');
    }catch(PDOException $prueba_error){
        echo "Error: " . $prueba_error->getMessage();
    }


?>