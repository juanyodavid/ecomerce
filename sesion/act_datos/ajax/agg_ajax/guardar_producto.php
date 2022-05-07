<?php
if (empty($_POST['nomap_add'])) {
	$errors[] = "Ingresa el nombre del disco";
} elseif (!empty($_POST['nomap_add'])) {
	require_once("../../conexion.php"); //Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
	$fotos = $_FILES['imagen']['name'];
	// $fotos =$_FILES['imagen']['name'];
	$archivo = $_FILES ['imagen']['tmp_name'];
	$ruta = "images";
	$ruta = $ruta."/".$fotos;
	move_uploaded_file($archivo,$ruta);
	$nomap = $_REQUEST['nomap_add'];
	$musico = $_REQUEST['musico_add'];
	$link = $_REQUEST['link_add'];
	$inst = $_REQUEST['inst_add'];
	$genero = $_REQUEST['genero_add'];
	
	// $nomap = mysqli_real_escape_string($con, (strip_tags($_POST["nomap_add"], ENT_QUOTES)));
	// $musico = mysqli_real_escape_string($con, (strip_tags($_POST["musico_add"], ENT_QUOTES)));
	// $link = mysqli_real_escape_string($con, (strip_tags($_POST["link_add"], ENT_QUOTES)));
	// $inst = mysqli_real_escape_string($con, (strip_tags($_POST["inst_add"], ENT_QUOTES)));
	// $genero = mysqli_real_escape_string($con, (strip_tags($_POST["genero_add"], ENT_QUOTES)));
	
	// REGISTER data into database
	$sql3 = "INSERT INTO disco(id_disco,nombre,genero,foto,link,instrumento,id_musico ) VALUES (null,'$nomap','$genero','$fotos','$link','$inst','$musico')";

					$query = mysqli_query($con, $sql3);
				if ($query) {
					header('location: ../../agg.php');
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