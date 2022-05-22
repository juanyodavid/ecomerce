<?php
session_start();
require_once("../conexion.php");
if (isset($_SESSION['nombre'])) {
	$ban = true;
} else $ban = false;
if ($ban) {
	$vendedor = $_SESSION['identification'];

}else{
	$vendedor = -1;
}
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

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

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

	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>

<body>

	<div class="menu-wrap">
		<nav class="menu">
			<div class="icon-list">
				<?php if ($ban == true) { ?>
					<a href="../sesion/act_datos/product.php"><i class="fa fa-list-ul"></i><span>See my products</span></a>
					<a href="../sesion/act_datos/product.php" data-toggle="modal"><i class="fa fa-plus-circle"></i><span>Add a new product</span></a>
					<a href="../sesion/act_datos/shopping.php"><i class="fa fa-credit-card"></i><span>See my purchases</span></a>
					<a href="../sesion/act_datos/sales.php"><i class="fa fa-money"></i><span>See my sales</span></a>
					<a href="../sesion/act_datos/cart.php"><i class="fa fa-shopping-cart"></i><span>See my cart</span></a>
					<a href="../sesion/cerrar.php"><i class="fa fa-sign-out"></i><span>Logout</span></a><?php } else { ?>
					<a href="../sesion/login/index.html#toregister"><i class="fa fa-plus-square"></i><span>Register</span></a>
					<a href="../sesion/login/index.html"><i class="fa fa-sign-in"></i><span>Login</span></a><?php } ?>
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
			<div class="row d-flex justify-content-center">
				<div class="col-md-10">
					<form method="post">
						<div class="row g-3 mt-2">
							<div class="col-md-3">
								<div class="dropdown">
									<select name="category" id="category" class="btn btn-secondary dropdown-toggle" data-toggle="dropd own" aria-expanded="false">
										<option value="">Category</option>
										<?php
										$query2 = mysqli_query($con, "SELECT * FROM category  ");
										while ($valores = mysqli_fetch_array($query2)) {
											echo '<option value="' . $valores['id_category'] . '">' . $valores['id_category'] . '-' . $valores['name'] . ' </option>';
										}
										?>
									</select>

								</div>
							</div>
							<div class="col-md-6">
								<input type="text" name="nameProduct" id="nameProduct" class="form-control" placeholder="Enter the name of the product that you want to search">
							</div>
							<div class="col-md-3">
								<input type="submit" value="Submit my choice" class="btn btn-secondary btn-block" />


							</div>
						</div>
						<div class="mt-3">
							<a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="advanced">
								Advance Search With Filters <i class="fa fa-angle-down"></i>
							</a>
							<div class="collapse" id="collapseExample">
								<div class="card card-body">
									<div class="row">
										<div class="col-md-4">
											<input type="number" placeholder="Maximum price" name="priceProduct" class="form-control">
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control" name="pricemin" placeholder="Minimum price">
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control" name="descriptionsearch" placeholder="Search by description">
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<?php
			$nombre = mysqli_real_escape_string($con, (strip_tags($_REQUEST['nameProduct'], ENT_QUOTES)));
			$categoria = mysqli_real_escape_string($con, (strip_tags($_REQUEST['category'], ENT_QUOTES)));
			$descripcion = mysqli_real_escape_string($con, (strip_tags($_REQUEST['descriptionsearch'], ENT_QUOTES)));
			$sWhere = "product.name LIKE '%" . $nombre . "%'";
			$sWhere1 = "product.id_category LIKE '%" . $categoria . "%'";
			$sWhere4 = "product.description LIKE '%" . $descripcion . "%'";
			if (!empty($_POST['priceProduct'])) {
				$precio = $_REQUEST['priceProduct'];
				$sWhere2 = "product.price < $precio ";
			} else {
				$sWhere2 = "product.price  ";
			}
			if (!empty($_POST['pricemin'])) {
				$precio = $_REQUEST['pricemin'];
				$sWhere3 = "product.price > $precio ";
			} else {
				$sWhere3 = "product.price > 0 ";
			}
			?>

			<section class="main">

				<ul class="ch-grid">

					<?php
					$finales = 0;
					$sWhere5 = "product.id_seller != $vendedor ";
					$sWhere6 = "cart.id_product IS null";
					$consulta = "SELECT * FROM product LEFT JOIN cart ON product.id_product = cart.id_product WHERE $sWhere and $sWhere1 and $sWhere2 and $sWhere3 and $sWhere4 and $sWhere5 and $sWhere6 ";
					// echo $consulta;
					$query = mysqli_query($con, $consulta);
					while ($row = mysqli_fetch_array($query)) {
						$id = $row[0];
						echo "el valor es:";
						echo $id;
						$nombre = $row['name'];
						$seller = $row['id_seller'];
						$price = $row['price'];
						$description = $row['description'];
						$photoQ = "SELECT * FROM `image` where `id_product` = '$id'";
						$query2 = mysqli_query($con, $photoQ);
						$row = mysqli_fetch_array($query2);
						$foto = $row['name'];
						$consulta2 = "SELECT `name` FROM user WHERE id_user= '" . $seller . "' ";
						if ($sql = mysqli_query($con, $consulta2)) {
							$row = mysqli_fetch_array($sql);
							$user = $row['name'];
						}
						$finales++;
					?>



						<li>
							<div ce class="ch-item">
								<div class="ch-info">
									<h3><?php echo $nombre ?></h3>
									<p>by <?php echo $user; ?> 
									<?php if($ban == False){?>
									<a href="../sesion/login/index.html">Add to cart</a></p>
									<?php } else{?>
									<form action="cartForm/guardar_producto.php" method="POST">
										<input type="hidden" id = "addProduct" name="addProduct" value="<?php echo $id; ?>">
										<input type="hidden" id = "userid" name="userid" value="<?php echo $vendedor; ?>">
										<input type="submit" value="Add to cart">
									</form><?php }?> 
								</div>
								<div class="ch-thumb ch-info" style="background-image: url(../sesion/act_datos/ajax/product_ajax/images/<?php echo $foto; ?>); "></div>
							</div>
						</li>
					<?php } ?>
				</ul>

			</section>
			<!-- Related demos -->

		</div>
	</div>
	<!-- /content-wrap -->

	<!-- /container -->
	<script src="js/classie.js"></script>
	<script src="js/main.js"></script>

</body>

</html>