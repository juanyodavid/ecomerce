<?php session_start();
if(isset($_SESSION['nombre'])){
    $bandera = 1;
}else {
    
    header ('location: login/index.html#tologin');
}
$name = $_SESSION['allName'];
?>

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
        <h1>Bienvenido  <?php echo $name;  ?> </h1>
        <a href="../sesion/act_datos/product.php" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>My Products</span></a>
        <a href="../sesion/act_datos/musica.php" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>My Cart</span></a>
        <a href="../sesion/act_datos/musica.php" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>My sales</span></a>
        <a href="../sesion/act_datos/musica.php" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>My shopping</span></a>
        <a href="../index.php" class="btn btn-info" data-toggle="modal"><i class="material-icons">&#xe5d2;</i> <span>Menu principal</span></a>
        <a href="../sesion/cerrar.php" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xe8ac;</i> <span>Logout</span></a>
    </div>
</body>

</html>