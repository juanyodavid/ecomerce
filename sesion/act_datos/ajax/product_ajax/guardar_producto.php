<!-- <?php
if (empty($_POST['nomap_add'])) {
	$errors[] = "Enter the name of the product";
} elseif (!empty($_POST['nomap_add'])) {
	require_once("../../conexion.php"); //Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
	
	$nomap = $_REQUEST['nomap_add'];
	$seller = $_REQUEST['seller_add'];
	$category = $_REQUEST['cat_add'];
	$price = $_REQUEST['inst_add'];
	$description = $_REQUEST['desc_add'];
	$fotos = $_FILES['imagen']['name'];


	//TODO: que pasa si no sube una imagen? se redirecciona correctamente?
	// REGISTER data into database
	$sql3 = "INSERT INTO product(id_product,`name`,price,id_category,id_seller,`description` ) VALUES
	 (null,'$nomap',$price,$category,$seller,'$description')";

					$query = mysqli_query($con, $sql3);
				if ($query and !$fotos) {
					header('location: ../../product.php');
					$messages[] = "Successful upload.";
				} elseif(!$fotos) {
					$errors[] = "Upload failed.";
				}

	if ($fotos) {

		// $fotos =$_FILES['imagen']['name'];
		$archivo = $_FILES ['imagen']['tmp_name'];
		$ruta = "images";
		$ruta = $ruta."/".$fotos;
		move_uploaded_file($archivo,$ruta);
		$photo_desc = $_REQUEST['imagen_desc'];
		$prd_pic = 'SELECT `id_product` FROM product
		ORDER BY `id_product` DESC
		LIMIT 1';
		$query = mysqli_query($con, $prd_pic);
		$row = mysqli_fetch_array($query);
		$product_id = $row['id_product'];

		$sql2 = "INSERT INTO `image`(id_image,`name`,tag,id_product ) VALUES
	 (null,'$fotos','$photo_desc',$product_id)";/////TODO: no tiene que ser seller

					$query = mysqli_query($con, $sql2);
				if ($query) {
					header('location: ../../product.php');
					$messages[] = "Successful upload.";
				} else {
					$errors[] = "Upload failed.";
				}
		}
	// if product has been added successfully

} else {
	$errors[] = "desconocido.";
}
if (isset($errors)) {

?>
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Error!</strong>
		<?php
		foreach ($errors as $error) {
			echo $error;
		}
		?>
	</div>
<?php
}
if (isset($messages)) {

?>
	<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Concretada</strong>
		<?php
		foreach ($messages as $message) {
			echo $message;
		}
		?>
	</div>
<?php
}
?> -->