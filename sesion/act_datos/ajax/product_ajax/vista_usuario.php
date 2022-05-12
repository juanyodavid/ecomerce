<?php
	
	/* Connect To Database*/
	require_once ("../../conexion.php");
	session_start();

	if(isset($_SESSION['nombre'])){
		$vendedor = $_SESSION['identification'];
	}
	
	
	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="product";
	$campos="*";
	$sWhere="product.name LIKE '%".$query."%'";
	$sWhere.=" order by product.id_product DESC";
	$constraint=" id_seller = '".$vendedor."'  ";
	
	
	
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
						<th class='text-center'>Product ID</th>  
						<th class='text-center'>Name </th>
						<th class='text-center'>Price </th>
						<th class='text-center'>Description </th>
						<th class='text-center'>Category </th>
						<th class='text-center'>Image </th>


						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id=$row['id_product'];
							$nombre=$row['name'];
							$price=$row['price'];
							$desc = $row['description'];
							$cat = $row['id_category'];
							$finales++;

							$consulta = "SELECT `name` FROM category where id_category = ".$cat." ";
							$query2 =mysqli_query($con,$consulta);
							$valores = mysqli_fetch_array($query2);
							$cat = $valores['name'];	

							$consulta = "SELECT `name` FROM `image` where id_product = ".$id." ";
							$query2 =mysqli_query($con,$consulta);
							$valores = mysqli_fetch_array($query2);
							$link =  $valores['name'];
							 
							 
						?>	
						<tr >
							<td class='text-center'><?php echo $id;?></td>
							<td class='text-center'><?php echo $nombre;?></td>
							<td class='text-center'><?php echo $price;?> NT$</td>
							<td class='text-center'><?php echo $desc;?></td>
							<td class='text-center'><?php echo $cat;?></td>
							<td class='text-center'><a href="ajax/product_ajax/images/<?php echo $link;?>">See image</a></td>


							                            
						<td>
							
							 <a href="#"data-target="#editProductModal" class="edit" data-toggle="modal" data-id="<?php echo $id;?>" data-nomap="<?php echo $nombre;?>" data-price = "<?php echo $price; ?>"data-desc = "<?php echo $desc; ?>" data-cat = "<?php echo $cat; ?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
							 
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