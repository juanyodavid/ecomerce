<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Administracion Tareas</title>
    <link rel="stylesheet" href="../css/ppl.css"><!-- hasta aca carga las librerias -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../icon/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/custom.css"><!-- hasta aca carga las librerias -->
</head>

<body>
<div class="welcome">
        <h1  style="color:#FF0000";>Error al ingresar</h1>
<?php  
session_start();

    if(isset($_SESSION['nombre'])) {
        header('location: principal.php');
    }

    $error = '';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $nombre = $_POST['username'];
        $clave = $_POST['password'];
        $clave = hash('sha512', $clave);

        try{
            $conexion = new PDO('mysql:host=localhost;dbname=ecommerce_db', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage(); ////aca hay un echo
            }
           
   
        $statement = $conexion->prepare('SELECT * FROM user WHERE username = :nombre AND password = :clave' );
        
        $statement->execute(array(
            ':nombre' => $nombre,
            ':clave' => $clave
        ));

        $resultado = $statement->fetch();
         if ($resultado !== false){
        // ESTA PARTE MUESTRA COMO ESTIRAR UN VALOR DE LA BASE DE DATOS ae
        $conn = mysqli_connect('localhost','root','', 'ecommerce_db');
        $consulta = "SELECT `name`,`id_user` FROM user WHERE username = '".$nombre."'" ;
        if($sql = mysqli_query($conn,$consulta)){
            $row = mysqli_fetch_array($sql);
            $_SESSION['nombre'] = $nombre;
            $_SESSION['allName'] = $row['name'];
            $_SESSION['identification'] = $row['id_user'];
            header('location: principal.php');  
         }
          }else{
             $error .= '<h2><p style="color:#FF0000";>Este nombre no existe o los datos no coinciden</p><h2>';
        }
       
    }
  echo $sql; 


?>
    
        <a href="<?=$_SERVER["HTTP_REFERER"]?>" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Volver a intentar</span></a>
        <a href="../menu" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Volver al menu principal</span></a>
        <a href='javascript:window.location.href = "login/index.html#toregister";' class="btn btn-info" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Crear un usuario</span></a>
    </div>
   </body>
</html>