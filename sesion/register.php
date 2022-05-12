<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Error de registro</title>
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
        <h1  style="color:#FF0000";>Error al crear el usuario</h1>
<?php 

session_start();

    if(isset($_SESSION['nombre'])) {
        header('location: menu.php');
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        
        $nombre = $_POST['completeName'];
        $username = $_POST['usernamesignup'];
        $mail = $_POST['emailsignup'];
        $celular = $_POST['celular'];
        $clave = $_POST['passwordsignup'];
        $clave2 = $_POST['passwordsignup_confirm'];
        $clave = hash('sha512', $clave);
        $clave2 = hash('sha512', $clave2);
       
        $error = '';
        
    
            try{
                // $conexion = new PDO('mysql:host=dontcompy.ipagemysql.com;dbname=patrocinio_db', 'appalda', 'aldaapp01');
                $conexion = new PDO('mysql:host=localhost;dbname=ecommerce_db', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }

            $statement = $conexion->prepare('SELECT * FROM user WHERE username = :username LIMIT 1');
            $statement->execute(array(':username' => $username));
            $resultado = $statement->fetch();
            
                        
            if ($resultado != false){
                $error .= '<i style="color: red;">Este nombre de usuario ya existe.</i>';
            }
            
            if ($clave != $clave2){
                $error .= '<i style="color: red;"> Las contraseñas no coinciden.</i>';
            }
            
                  
        
     
        if ($error == ''){
            $query = 'INSERT INTO user( username, password,name, cel,email) VALUES (:username,:clave,:nombre,:celular,:mail)';
            $statement = $conexion->prepare($query);
            $statement->execute(array(
                ':username' => $username,
                ':nombre' => $nombre,
                ':clave' => $clave,
                ':celular' => $celular,
                ':mail' => $mail,
            ));
            
            $error .= '<i style="color: green;">Usuario registrado exitosamente</i>';
           header('location: ../sesion/menu.php');  
        }
    }echo $error;



?>
<br>
      <a href="<?=$_SERVER["HTTP_REFERER"]?>" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Volver a intentar</span></a>
        <a href="../menu" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Volver al menú principal</span></a>
        <a href='login/index.html' class="btn btn-info" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Iniciar sesión</span></a>
    </div>
   </body>
</html>