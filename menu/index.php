<?php 
session_start();

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

    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>

</head>

<body>
    <div class="container">
        <div class="menu-wrap">
		<nav class="menu">
					<div class="icon-list">
						<a href="#musicos"><i class="material-icons people"></i><span>Artistas</span></a>
						<a href="#discos"><i class="material-icons speaker_group"></i><span>Discos</span></a>
					<?php if ($ban == true) { ?>	<a href="../sesion/act_datos/agg.php"><i class="fa fa-fw fa-bar-chart-o"></i><span>Ver mis discos</span></a>
						<a href="../sesion/act_datos/musica.php"><i class="material-icons playlist_add"></i><span>Agregar un disco</span></a>
						<a href="../sesion/act_datos/musica.php"><i class="material-icons my_library_add"></i><span>Agregar música</span></a>
						<a href="../sesion/act_datos/musica.php"><i class="material-icons queue_music"></i><span>Ver mis musicas</span></a>
						<a href="../sesion/cerrar.php" ><i class="fa fa-fw fa-user"></i><span>Cerrar sesión</span></a><?php } else{ ?>
						<a href="../sesion/login/index.html" ><i class="fa fa-fw fa-user"></i><span>Iniciar sesión</span></a><?php } ?>
					</div>
				</nav>
        </div>
        <button class="menu-button" id="open-button"></button>
        <div class="content-wrap">
            <div class="content">
                <header class="codrops-header">
                    <div class="codrops-links">
                        <!-- <a class="codrops-icon codrops-icon-prev" href="http://tympanus.net/Development/TabStylesInspiration/"><span>Previous Demo</span></a>
							<a class="codrops-icon codrops-icon-drop" href="http://tympanus.net/codrops/?p=20100"><span>Back to the Codrops Article</span></a> -->
                    </div>
                    <h1>Obras de músicos <span>Pilarenses</span></h1>
                    <nav class="codrops-demos">

                    </nav>
                    <p>As seen in the <a href="http://tympanus.net/Development/ButtonComponentMorph/index7.html">Morphing Buttons Concept</a></p>
                </header>
                <section class="main">

                    <ul class="ch-grid">
                        <li>
                            <div class="ch-item">
                                <div class="ch-info">
                                    <h3>Music poster</h3>
                                    <p>by Jonathan Quintin <a href="http://drbl.in/eGjw">View on Dribbble</a></p>
                                </div>
                                <div class="ch-thumb ch-img-1"></div>
                            </div>
                        </li>
                        <li>
                            <div class="ch-item">
                                <div class="ch-info">
                                    <h3>Beer Poster 2</h3>
                                    <p>by Jon Gerlach <a href="http://drbl.in/eFWR">View on Dribbble</a></p>
                                </div>
                                <div class="ch-thumb ch-img-2"></div>
                            </div>
                        </li>
                        <li>
                            <div class="ch-item">
                                <div class="ch-info">
                                    <h3>Devi Tara</h3>
                                    <p>by Kawal Oberoi <a href="http://drbl.in/eFED">View on Dribbble</a></p>
                                </div>
                                <div class="ch-thumb ch-img-3"></div>
                            </div>
                        </li>
                    </ul>

                </section>
                <!-- Related demos -->
                <section class="related">
                    <p>If you enjoyed this demo you might also like:</p>
                    <a href="http://tympanus.net/Development/SidebarTransitions/">
                        <img src="img/related/sidebartransitions.png" />
                        <h3>Transitions for Off-Canvas Navigations</h3>
                    </a>
                    <a href="http://tympanus.net/Development/PerspectivePageViewNavigation/">
                        <img src="img/related/PerspectiveNavigation.png" />
                        <h3>Perspective Page View Navigation</h3>
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