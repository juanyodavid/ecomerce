<?php require_once("conexion.php"); 
if(isset($_SESSION['nombre'])){
	$ban = $_SESSION['nombre'];
}else $ban = '0';
$consulta2 = "SELECT id_musico FROM musico WHERE nombre= '".$ban."' " ;
if ($sql = mysqli_query($con, $consulta2)) {
	$row = mysqli_fetch_array($sql);
	$musicoo = $row['id_musico'];}
?>
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
						<label>Nombre</label>
						<input type="text" name="nomap_edit" id="nomap_edit" class="form-control" required>
						<input type="hidden" name="edit_id" id="edit_id">
					</div>
					<div class="form-group">
						<label>Género</label>
						<input type="text" name="genero_edit" id="genero_edit" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Disco al cual pertenece</label>
						<select name="disco_edit"  id="disco_edit" class="form-control" required>
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM disco where id_musico = '".$musicoo."' ");
         						 while ($valores = mysqli_fetch_array($query2)) {
          							echo '<option value="'.$valores[id_disco].'">'.$valores[id_disco].'-'.$valores[nombre].'</option>';
          						}
          						?>
      						</select>
					</div>
					<div class="form-group">
						<label>Link para la música</label>
						<input type="text" name="link_edit" id="link_edit" class="form-control" required>
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