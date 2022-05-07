<?php require_once("conexion.php");
$nombre = $_SESSION['nombre'];
$consulta = "SELECT id_musico FROM musico WHERE nombre = '" . $nombre . "'";
if ($sql = mysqli_query($con, $consulta)) {
	$row = mysqli_fetch_array($sql);
	$id = $row['id_musico'];
} ?>

<div id="addProductModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="ajax/agg_ajax/guardar_producto.php" method="POST" enctype="multipart/form-data" name="add_product" id="add_product">
				<div class="modal-header">
					<h4 class="modal-title">Agregar </h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nombre del disco</label>
						<input type="text" name="nomap_add" id="nomap_add" class="form-control" required>
						<input type="hidden" name="musico_add" id="musico_add" value="<?php echo $id; ?>">

					</div>
					<div class="form-group">
						<label>Nombre del género</label>
						<input type="text" name="genero_add" id="genero_add" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Instrumentos usados</label>
						<input type="text" name="inst_add" id="inst_add" class="form-control">
					</div>
					<div class="form-group">
						<label>Link para escucharlo</label>
						<input type="text" name="link_add" id="link_add" class="form-control">
					</div>
					<div class="form-group">
						<label>Foto</label>
						<input type="file" name="imagen" id="imagen" class="form-control">
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Guardar">
					</div>


				</div>
			</form>
		</div>
	</div>
</div>