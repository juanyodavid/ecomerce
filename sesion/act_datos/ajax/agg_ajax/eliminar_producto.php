<?php
	if (empty($_POST['delete_id'])){
		$errors[] = "ID field must not be empty.";
	} elseif (!empty($_POST['delete_id'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $disco=intval($_POST['delete_id']);
	

	// DELETE FROM  database
    $sql = "DELETE FROM  disco WHERE id_disco='$disco'";// dps FROM  va la tabla y dps el campo de la tabla
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "The (disco) has been deleted successfully.";
    } else {
        $errors[] = "Deletion failed. Please try again.";
    }
		
	} else 
	{
		$errors[] = "Unknown.";
	}
if (isset($errors)){
			
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
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Completed.</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>