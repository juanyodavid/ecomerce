<?php
if (empty($_POST['addProduct'])) {
	$errors[] = "Enter the name of the product";
} elseif (!empty($_POST['addProduct'])) {
	require_once("../../conexion.php"); //Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
	
	$product = $_REQUEST['addProduct'];
	$id = $_REQUEST['userid'];


	//TODO: que pasa si no sube una imagen? se redirecciona correctamente?
	// REGISTER data into database
  
	$sql3 = "INSERT INTO cart(id_cart,`state`, `id_user`, `id_product`) VALUES
	 (null,1,$id,$product)";
echo $sql3;
					$query = mysqli_query($con, $sql3);
				if ($query ) {
					header('location: ../index.php');
					$messages[] = "Successful upload.";
				} else {
					$errors[] = "Upload failed.";
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
?> 