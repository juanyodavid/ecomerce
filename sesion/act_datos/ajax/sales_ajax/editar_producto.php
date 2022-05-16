<?php
if (empty($_POST['edit_id'])) {
	$errors[] = "ID está vacío.";
} elseif (!empty($_POST['edit_id'])) {
	require_once("../../conexion.php"); //Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
	$nomap = mysqli_real_escape_string($con, (strip_tags($_POST["nomap_edit"], ENT_QUOTES)));
	$desc = mysqli_real_escape_string($con, (strip_tags($_POST["desc_edit"], ENT_QUOTES)));
	$price = mysqli_real_escape_string($con, (strip_tags($_POST["price_edit"], ENT_QUOTES)));
	$cat = mysqli_real_escape_string($con, (strip_tags($_POST["cat_edit"], ENT_QUOTES)));
	$id = intval($_POST['edit_id']);	// UPDATE data into database
	
	$sql = "UPDATE product SET name='" . $nomap . "',     description='" . $desc . "', price='" . $price . "', id_category='" . $cat . "' WHERE id_product='" . $id . "' ";
	$query = mysqli_query($con, $sql);
	// if product has been added successfully
	if ($query) {
		$messages[] = "The update has been successful.";
	} else {
		$errors[] = "The update has failed.";
	}
} else {
	$errors[] = "Unknown.";
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
		<strong>Finished!</strong>
		<?php
		foreach ($messages as $message) {
			echo $message;
		}
		?>
	</div>
<?php
}
?>