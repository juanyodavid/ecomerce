<?php require_once("conexion.php"); ?>
<div id="editProductModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="edit_product" id="edit_product">
				<div class="modal-header">
					<h4 class="modal-title">Edit</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label>Name of the product</label>

						<input type="text" name="nomap_edit" id="nomap_edit" class="form-control" required>
						<input type="hidden" name="edit_id" id="edit_id">
					</div>
					<div class="form-group">
						<label>Description</label>
						<input type="text" name="desc_edit" id="desc_edit" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="number" name="price_edit" id="price_edit" class="form-control" required>
					</div>
					<!-- TODO:hacer que aparazca seleccionado el que la persona puso -->
					<div class="form-group">
						<label>Category</label>
						<select name="cat_edit"  id="cat_edit" class="form-control" required>
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM category  ");
         						 while ($valores = mysqli_fetch_array($query2)) {
          							echo '<option value="'.$valores['id_category'].'">'.$valores['id_category'].'-'.$valores['name'].' </option>';
          						}
          						?>
      						</select>
					</div>
					
					<div class="modal-footer">

						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
			</form>
		</div>
	</div>
</div>