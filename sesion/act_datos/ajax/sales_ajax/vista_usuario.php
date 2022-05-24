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

	$tables="cart LEFT JOIN product ON product.id_product = cart.`id_product`";
	$campos="*";
	$sWhere="product.name LIKE '%".$query."%'";
	$sWhere.=" order by cart.id_cart DESC";
	$constraint=" product.id_seller = '".$vendedor."'  ";
	$constraint2 =" cart.state = 0 ";
	
	
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
	$consul = "SELECT $campos FROM  $tables where $constraint and $constraint2 and $sWhere  LIMIT $offset,$per_page";
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
							$id=$row['id_cart'];
							$nombre=$row['name'];
							$price=$row['price'];
							$desc = $row['description'];
							$cat = $row['id_category'];
							$finales++;
						?>	
						<tr >
							<td class='text-center'><?php echo $id;?></td>
							<td class='text-center'><?php echo $nombre;?></td>
							<td class='text-center'><?php echo $price;?> NT$</td>
							<td class='text-center'><?php echo $desc;?></td>
							<td class='text-center'><?php echo $cat;?></td>
							<td class='text-center'><a target="_blank" href="ajax/product_ajax/images/<?php echo $link;?>">See image</a></td>


							                            
						<td>
			
			
							
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