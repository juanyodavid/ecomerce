<?php
	
	/* Connect To Database*/
	require_once ("../../conexion.php");
	session_start();

	if(isset($_SESSION['nombre'])){
		$ban = $_SESSION['nombre'];
	}else $ban = '0';
	$consulta2 = "SELECT id_musico FROM musico WHERE nombre= '".$ban."' " ;
	if ($sql = mysqli_query($con, $consulta2)) {
		$row = mysqli_fetch_array($sql);
		$musicoo = $row['id_musico'];}
	
	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="disco";
	$campos="*";
	$sWhere="disco.nombre LIKE '%".$query."%'";
	$sWhere.=" order by disco.id_disco";
	$constraint=" id_musico = '".$musicoo."'  ";
	
	
	
	include '../pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	//main query to fetch the data
	$consul = "SELECT $campos FROM  $tables where $constraint and $sWhere  LIMIT $offset,$per_page";
	$query = mysqli_query($con,$consul);
	// echo $consul;
	//loop through fetched data
	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			
			<table class="table table-striped table-hover">

				<thead>

					<tr>
						<th class='text-center'>ID del disco</th>  
						<th class='text-center'>Nombre </th>
						<th class='text-center'>Género </th>
						<th class='text-center'>Instrumentos </th>
						<th class='text-center'>Escuchar disco </th>


						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id=$row['id_disco'];
							$nombre=$row['nombre'];
							$genero=$row['genero'];
							$inst = $row['instrumento'];
							$link = $row['link'];
							$finales++;
						?>	
						<tr >
							<td class='text-center'><?php echo $id;?></td>
							<td class='text-center'><?php echo $nombre;?></td>
							<td class='text-center'><?php echo $genero;?></td>
							<td class='text-center'><?php echo $inst;?></td>
							<td class='text-center'><a href="<?php echo $link;?>" target="_blank">Ir</a></td>
							                            
						<td>
							
							 <a href="#"data-target="#editProductModal" class="edit" data-toggle="modal" data-id="<?php echo $id;?>" data-nomap="<?php echo $nombre;?>" data-genero = "<?php echo $genero; ?>"data-inst = "<?php echo $inst; ?>" data-link = "<?php echo $link; ?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
							 
							<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    		</td>
							
							
							
							
							
							
						</tr>
						<?php }?>
						<tr>
							<td colspan='17'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
									echo "Showing $inicios - $finales of $numrows entries";
									echo paginate( $page, $total_pages, $adjacents);
								?>
							</td>
						</tr>
				</tbody>			
			</table>
		</div>	

	
	
	<?php	
	}	
}
?>          