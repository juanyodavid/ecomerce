<?php require_once("conexion.php"); 
if(isset($_SESSION['nombre'])){
	$ban = $_SESSION['nombre'];
}else $ban = '0';
$consulta2 = "SELECT id_musico FROM musico WHERE nombre= '".$ban."' " ;
if ($sql = mysqli_query($con, $consulta2)) {
	$row = mysqli_fetch_array($sql);
	$musicoo = $row['id_musico'];}
?>

<div id="addProductModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="add_product" id="add_product">
				<div class="modal-header">
					<h4 class="modal-title">Agregar</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="nomap_add" id="nomap_add" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Género</label>
						<input type="text" name="genero_add" id="genero_add" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Disco al cual pertenece</label>
						<select name="disco_add"  id="disco_add" class="form-control" required>
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
						<input type="text" name="link_add" id="link_add" class="form-control" required>
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