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
    <title>E-Commerce</title>
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
        <h1>Welcome, <?php echo $name;  ?>!</h1>
            <a href="../index.php" class="main-menu btn-block btn-info" data-toggle="modal"><i class="material-icons">&#xe1db;</i> <span> Main Menu</span></a>
            <br>
            <a href="../sesion/act_datos/product.php" class="btn-block btn-success" data-toggle="modal"><i class="material-icons">&#xe8d1;</i> <span> Your listings (for sale)</span></a>
            <br>
            <a href="../sesion/act_datos/cart.php" class="main-menu btn-block btn-success" data-toggle="modal"><i class="material-icons">&#xe8cc;</i> <span> Shopping cart</span></a>
            <br>
            <a href="../sesion/act_datos/sales.php" class="btn-block btn-success" data-toggle="modal"><i class="material-icons">&#xe889;</i> <span> Sales history</span></a>
            <br>
            <a href="../sesion/act_datos/shopping.php" class="btn-block btn-success" data-toggle="modal"><i class="material-icons">&#xef63;</i> <span> Purchase history</span></a>
            <br>
            <a href="../sesion/cerrar.php" class="btn-block btn-danger" data-toggle="modal"><i class="material-icons">&#xe9ba;</i> <span> Log out</span></a>
    </div>
</body>

</html>