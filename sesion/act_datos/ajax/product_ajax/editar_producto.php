<?php
if (empty($_POST['edit_id'])) {
	$errors[] = "ID está vacío.";
} elseif (!empty($_POST['edit_id'])) {
	require_once("../../conexion.php"); //Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
	$nomap = mysqli_real_escape_string($con, (strip_tags($_POST["nomap_edit"], ENT_QUOTES)));
	$link = mysqli_real_escape_string($con, (strip_tags($_POST["link_edit"], ENT_QUOTES)));
	$inst = mysqli_real_escape_string($con, (strip_tags($_POST["inst_edit"], ENT_QUOTES)));
	$genero = mysqli_real_escape_string($con, (strip_tags($_POST["genero_edit"], ENT_QUOTES)));
	$id = intval($_POST['edit_id']);	// UPDATE data into database
	
	$sql = "UPDATE disco SET nombre='" . $nomap . "',     link='" . $link . "', instrumento='" . $inst . "', genero='" . $genero . "' WHERE id_disco='" . $id . "' ";
	$query = mysqli_query($con, $sql);
	// if product has been added successfully
	if ($query) {
		$messages[] = "Actualización exitosa.";
	} else {
		$errors[] = "Actualización fallida.";
	}
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
		<strong>Concretada.</strong>
		<?php
		foreach ($messages as $message) {
			echo $message;
		}
		?>
	</div>
<?php
}
?>