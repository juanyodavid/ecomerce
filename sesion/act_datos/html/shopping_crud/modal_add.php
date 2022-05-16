<?php require_once("conexion.php");
$nombre = $_SESSION['nombre'];
$id = $_SESSION['identification'];
?>

<div id="addProductModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="ajax/product_ajax/guardar_producto.php" method="POST" enctype="multipart/form-data" name="add_product" id="add_product">
				<div class="modal-header">
					<h4 class="modal-title">Add product</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Name of the product</label>
						<input type="text" name="nomap_add" id="nomap_add" class="form-control" required>
						<input type="hidden" name="seller_add" id="seller_add" value="<?php echo $id; ?>">

					</div>
					<div class="form-group">
						<label>Description</label>
						<input type="text" name="desc_add" id="desc_add" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="number" name="inst_add" id="inst_add" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Category</label>
						<input type="text" name="cat_add" id="cat_add" class="form-control">
					</div>
					<div class="form-group">
						<label>Photo</label>
						<input type="file" name="imagen" id="imagen" class="form-control">
					</div>
					<div class="form-group">
						<label>Photo description</label>
						<input type="text" name="imagen_desc" id="imagen_desc" class="form-control">
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Save">
					</div>


				</div>
			</form>
		</div>
	</div>
</div>