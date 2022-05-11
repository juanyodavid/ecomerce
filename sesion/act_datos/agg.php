<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Discos</title>
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
                       <h2>Discos: <b></b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="../cerrar.php" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xe8ac;</i> <span>Log Out</span></a>
                        <a href="../act_datos/musica.php" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add música</span></a>

                        <a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add disco</span></a>
                     <a href="../menu.php" class="btn btn-warning" data-toggle="modal"><i class="material-icons">&#xe5c4;</i> <span>Menú</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class='col-sm-3 pull-right'>
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="form-control" placeholder="Buscar por nombre" id="q" onkeyup="load(1);" />
                        <span class="input-group-btn">
                            <button class="btn btn-info" type="button" onclick="load(1);">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
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
    <!-- Edit Modal HTML -->

    <!-- Edit Modal HTML -->
    <?php include("html/agg_crud/modal_edit.php"); ?>
    <?php include("html/agg_crud/modal_add.php"); ?>
    <?php include("html/agg_crud/modal_delete.php"); ?>
    <!-- Delete Modal HTML -->
    <script src="js/agg_script.js"></script>
</body>

</html>