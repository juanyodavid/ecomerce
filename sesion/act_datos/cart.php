<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/custom.css"><!-- hasta aca carga las librerias -->
</head>

<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                       <h2>Your cart <b></b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="../cerrar.php" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xe8ac;</i> <span>Logout</span></a>
                        <a href="checkout.php" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xeb88;</i> <span>Checkout</span></a>
                        <a href="../menu.php" class="btn btn-warning" data-toggle="modal"><i class="material-icons">&#xe5c4;</i> <span>Menu</span></a>
                    </div>
                </div>
            </div>
            

            <div class='clearfix'></div>
            <hr>
            <div id="loader"></div><!-- Carga de datos ajax aqui -->
            <div id="resultados"></div><!-- Carga de datos ajax aqui -->
            <div class='outer_div'></div><!-- Carga de datos ajax aqui -->
        </div>
    </div>

    <?php 
    include("html/cart_crud/modal_edit.php"); 
    include("html/cart_crud/modal_add.php"); 
    include("html/cart_crud/modal_delete.php"); 
    ?>
    <!-- Delete Modal HTML -->
    <script src="js/cart_script.js"></script>
</body>

</html>