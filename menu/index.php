<?php 
session_start();
require_once("../conexion.php");
if(isset($_SESSION['nombre'])){
    $ban = true;
}else $ban = false;
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Obras pilarenses</title>
    <meta name="description" content="Modern effects and styles for off-canvas navigation with CSS transitions and SVG animations using Snap.svg" />
    <meta name="keywords" content="sidebar, off-canvas, menu, navigation, effect, inspiration, css transition, SVG, morphing, animation" />
    <meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/normalize1.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/menu_topexpand.css" />
		<link rel="stylesheet" type="text/css" href="css/demo1.css" />
		<link rel="stylesheet" type="text/css" href="css/common.css" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
		<link rel="stylesheet" type="text/css" href="css/style3.css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700' rel='stylesheet' type='text/css' />
		<script type="text/javascript" src="js/modernizr.custom.79639.js"></script> 


</head>

<body>
    <div class="container">
        <div class="menu-wrap">
		<nav class="menu">
					<div class="icon-list">
						<!-- <a href="#musicos"><i class="material-icons people"></i><span>Artistas</span></a> -->
						<!-- <a href="#discos"><i class="material-icons speaker_group"></i><span>Discos</span></a> -->
					<?php if ($ban == true) { ?>	
                        <a href="../sesion/act_datos/product.php"><i class="fa fa-fw fa-bar-chart-o"></i><span>See my products</span></a>
						<a href="../sesion/act_datos/product.php" data-toggle="modal"><i class="material-icons playlist_add"></i><span>Add a new product</span></a>
						<a href="../sesion/act_datos/shopping.php"><i class="material-icons my_library_add"></i><span>See my purchases</span></a>
						<a href="../sesion/act_datos/sales.php"><i class="material-icons my_library_add"></i><span>See my sales</span></a>
						<a href="../sesion/act_datos/cart.php"><i class="material-icons queue_music"></i><span>See my cart</span></a>
						<a href="../sesion/cerrar.php" ><i class="fa fa-fw fa-user"></i><span>Logout</span></a><?php } else{ ?>
						<a href="../sesion/login/index.html#toregister" ><i class="fa fa-fw fa-user"></i><span>Register</span></a>
						<a href="../sesion/login/index.html" ><i class="fa fa-fw fa-user"></i><span>Login</span></a><?php } ?>
					</div>
				</nav>
        </div>
        <button class="menu-button" id="open-button"></button>
        <div class="content-wrap">
            <div class="content">
                <header class="codrops-header">
                    <div class="codrops-links">
                        <a class="codrops-icon codrops-icon-prev" href="#"><span>輕鬆購買</span></a>
							<a class="codrops-icon codrops-icon-drop" href="#"><span>輕鬆銷售</span></a>
                    </div>
                    <h1>EJOGUA EASY <span>Taiwanese branch</span></h1>
                    <nav class="codrops-demos">

                    </nav>
                    <p>The best website for <a href="https://imgur.com/a6hX0I7">Trading products</a></p>
                </header>
                <section class="main">

                    <ul class="ch-grid">

                    <?php 
			$finales = 0;
			$consulta = "SELECT * FROM product" ;
			$query = mysqli_query($con,$consulta);
			while($row = mysqli_fetch_array($query)){	
				$id=$row['id_product'];
				$nombre=$row['name'];
				$seller=$row['id_seller'];
				$price=$row['price'];
				$description = $row['description'];
            $photoQ= "SELECT * FROM `image` where `id_product` = '$id'" ;
            $query2 = mysqli_query($con,$photoQ);
            $row = mysqli_fetch_array($query2);
				$foto = $row['name'];
				$consulta2 = "SELECT `name` FROM user WHERE id_user= '".$seller."' " ;
				if ($sql = mysqli_query($con, $consulta2)) {
					$row = mysqli_fetch_array($sql);
					$user = $row['name'];}
				$finales++;

			?>



							<li>
								<div class="ch-item">	
									<div class="ch-info">
										<h3><?php echo $nombre ?></h3>
										<p>by <?php echo $user; ?> <a href="<?php echo $link; ?>">Add to cart</a></p>
									</div>
									<div class="ch-thumb ch-info" style="background-image: url(../sesion/act_datos/ajax/product_ajax/images/<?php echo $foto; ?>); "></div>
								</div>
							</li>
							<?php } ?>
                    </ul>

                </section>
                <!-- Related demos -->
                <section class="related">
                    <p>If you enjoyed this products, you might also like:</p>
                    
                    <a href="http://tympanus.net/Development/PerspectivePageViewNavigation/">
                        <img src="../sesion/act_datos/ajax/product_ajax/images/<?php echo $foto; ?>" />
                        <h3><?php echo $nombre ?></h3>
                    </a>
                </section>
            </div>
        </div>
        <!-- /content-wrap -->
    </div>
    <!-- /container -->
    <script src="js/classie.js"></script>
    <script src="js/main.js"></script>
</body>

</html>