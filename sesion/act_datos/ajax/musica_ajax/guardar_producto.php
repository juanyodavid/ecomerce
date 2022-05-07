<?php
if (empty($_POST['nomap_add'])) {
	$errors[] = "Ingresa el nombre del disco";
} elseif (!empty($_POST['nomap_add'])) {
	require_once("../../conexion.php"); //Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
	
	$nomap = mysqli_real_escape_string($con, (strip_tags($_POST["nomap_add"], ENT_QUOTES)));
	$link = mysqli_real_escape_string($con, (strip_tags($_POST["link_add"], ENT_QUOTES)));
	$disco = mysqli_real_escape_string($con, (strip_tags($_POST["disco_add"], ENT_QUOTES)));
	$genero = mysqli_real_escape_string($con, (strip_tags($_POST["genero_add"], ENT_QUOTES)));
	
	// REGISTER data into database
	$sql3 = "INSERT INTO musica(id_musica,nombre,genero,link,id_disco ) VALUES (null,'$nomap','$genero','$link','$disco')";
// echo $sql3;
					$query = mysqli_query($con, $sql3);
				if ($query) {
					
					$messages[] = "Carga exitosa.";
				} else {
					$errors[] = "Carga fallida.";
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