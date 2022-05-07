<?php require_once("conexion.php"); ?>
<div id="editProductModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="edit_product" id="edit_product">
				<div class="modal-header">
					<h4 class="modal-title">Editar</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					
					<div class="form-group">
						<label>Nombre del disco</label>
						<input type="text" name="nomap_edit" id="nomap_edit" class="form-control" required>
						<input type="hidden" name="edit_id" id="edit_id">
					</div>
					<div class="form-group">
						<label>Nombre del género</label>
						<input type="text" name="genero_edit" id="genero_edit" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Instrumentos usados</label>
						<input type="text" name="inst_edit" id="inst_edit" class="form-control">
					</div>
					<div class="form-group">
						<label>Link para escucharlo</label>
						<input type="text" name="link_edit" id="link_edit" class="form-control">
					</div>
				</div>
				<div class="modal-footer">

					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-info" value="Guardar">
				</div>
			</form>
		</div>
	</div>
</div>