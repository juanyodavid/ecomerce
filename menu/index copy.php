<!-- <?php 
// session_start();

// if(isset($_SESSION['nombre'])){
//     $ban = true;
// }else $ban = false;
// ?> -->
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Obras pilarenses</title>
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

  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>

	</head>
	<body>
		<div class="container">
			<div class="menu-wrap">
				<nav class="menu">
					<div class="icon-list">
						<a href="#musicos"><i class="material-icons people"></i><span>Artistas</span></a>
						<a href="#discos"><i class="material-icons speaker_group"></i><span>Discos</span></a>
					<?php if ($ban == true) { ?>	<a href="../sesion/act_datos/product.php"><i class="fa fa-fw fa-bar-chart-o"></i><span>Ver mis discos</span></a>
						<a href="../sesion/act_datos/musica.php"><i class="material-icons playlist_add"></i><span>Agregar un disco</span></a>
						<a href="../sesion/act_datos/musica.php"><i class="material-icons my_library_add"></i><span>Agregar música</span></a>
						<a href="../sesion/act_datos/musica.php"><i class="material-icons queue_music"></i><span>Ver mis musicas</span></a>
						<a href="../sesion/cerrar.php" ><i class="fa fa-fw fa-user"></i><span>Logout</span></a><?php } else{ ?>
						<a href="../sesion/login/index.html" ><i class="fa fa-fw fa-user"></i><span>Iniciar sesión</span></a><?php } ?>
					</div>
				</nav>
			</div>
			<button class="menu-button" id="open-button"></button>
			<!-- <div class="content-wrap">
				<div class="content">
					<header class="codrops-header">
						<div class="codrops-links">
							<!-- <a class="codrops-icon codrops-icon-prev" href="http://tympanus.net/Development/TabStylesInspiration/"><span>Previous Demo</span></a>
							<a class="codrops-icon codrops-icon-drop" href="http://tympanus.net/codrops/?p=20100"><span>Back to the Codrops Article</span></a> -->
						</div>
						<h1 id="discos">Obras de músicos <span>Pilarenses</span></h1>
						<nav class="codrops-demos">
						
						</nav>
						<h1>Discos:</h1>
					</header>
					<section class="main">
						<ul class="ch-grid">
			<!-- <?php 
			// $finales = 0;
			// $con = mysqli_connect('localhost','root','', 'musico_db');//esto se conecta con la base de datos
			// $consulta = "SELECT * FROM disco WHERE 1" ;
			// $query = mysqli_query($con,$consulta);
			// while($row = mysqli_fetch_array($query)){	
			// 	$id=$row['id_disco'];
			// 	$nombre=$row['nombre'];
			// 	$musico=$row['id_musico'];
			// 	$genero=$row['genero'];
			// 	$link = $row['link'];
			// 	$foto = $row['foto'];
			// 	$consulta2 = "SELECT nombre FROM musico WHERE id_musico= '".$musico."' " ;
			// 	if ($sql = mysqli_query($con, $consulta2)) {
			// 		$row = mysqli_fetch_array($sql);
			// 		$musicoo = $row['nombre'];}
			// 	$finales++;
			?> -->
						
							<!-- <?php ?>
							<li>
								<div class="ch-item">	
									<div class="ch-info">
										<h3><?php echo $nombre ?></h3>
										<p>de <?php echo $musicoo; ?> <a href="<?php echo $link; ?>">Escuchar disco</a></p>
									</div>
									<div class="ch-thumb ch-img-2" style="background-image: url(../sesion/act_datos/ajax/product_ajax/images/<?php echo $foto; ?>); "></div>
								</div>
							</li>
							<?php //} ?> -->
							
							
						</ul>
						
					</section>
					<!-- Related demos -->
					<section class="related">
						<p id="musicos">Si te han gustado los discos, aqui puedes ver algunos <strong style="color:green";>artistas</strong></p>
						<?php 
	
			$consulta = "SELECT * FROM musico WHERE 1" ;
			$query2 = mysqli_query($con,$consulta);
			while($row = mysqli_fetch_array($query2)){	
			
				$nombre=$row['nombre'];
				$email=$row['email'];
				$celular=$row['celular'];

				
			?>
						<a href="mailto:<?php echo $email; ?>">
						
							<img src="img/related/sidebartransitions.png" />
							<h3>Nombre: <?php echo $nombre; ?></h3>
							<h3>Correo: <?php echo $email; ?></h3>
							<h3>Celular: <?php echo $celular ; ?></h3>
						</a>
							<?php } ?>
						
					</section>
				</div>
			</div><!-- /content-wrap -->
		</div>/container -->
		<script src="js/classie.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>