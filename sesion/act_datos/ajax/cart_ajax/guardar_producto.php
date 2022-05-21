<?php
if (empty($_POST['firstName'])) {
	$errors[] = "Enter the name of the product";
} elseif (!empty($_POST['firstName'])) {
	require_once("../../conexion.php"); //Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
	

	$id = intval($_POST['buy_add']);



	//TODO: que pasa si no sube una imagen? se redirecciona correctamente?
	// REGISTER data into database
	$sql = "UPDATE cart SET `state` = 0 WHERE id_user='" . $id . "' ";
	// echo $sql;
	$query = mysqli_query($con, $sql);
	// if product has been added successfully
	if ($query) {
		header('location: ../../product.php');

		$messages[] = "Edit successful.";
	} else {
		$errors[] = "Edit failed.";
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
		<strong>Success!</strong>
		<?php
		foreach ($messages as $message) {
			echo $message;
		}
		?>
	</div>
<?php
}
?>