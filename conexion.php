 <?php
    
    // try{

    //      $con = new PDO('mysql:host=localhost;dbname=db', 'root', '');
    // }catch(PDOException $prueba_error){
    //     echo "Error: " . $prueba_error->getMessage();
    // }

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','ecommerce_db');
# conectare la base de datos
$con=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(!$con){
    die("imposible conectarse: ".mysqli_error($con));
}
if (@mysqli_connect_errno()) {
    die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
}


?>
