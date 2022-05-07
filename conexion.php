<?php
    
    try{
        //  $conexion = new PDO('mysql:host=dontcompy.ipagemysql.com;dbname=sesiondb', 'sesionadmin', 'SesionAdmin2019*');
         $con = new PDO('mysql:host=localhost;dbname=musico_db', 'root', '');
    }catch(PDOException $prueba_error){
        echo "Error: " . $prueba_error->getMessage();
    }


?>