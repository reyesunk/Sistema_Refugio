<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">LISTA DE MASCOTAS</h1>
		<a href="registro_mascotas.php" class="btn btn-primary">NUEVO</a>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>Tipo de Mascota</th>
							<th>Nombre</th>
							<th>Fecha de rescate</th>
                            <th>Edad aproximada</th>
							<th>Discapacidad</th>

							
							<th>ACCIONES</th>
							
						</tr>
					</thead>
					<tbody>
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT * FROM registromascotas");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td><?php echo $data['idmascota']; ?></td>
									<td><?php echo $data['tipodemascota']; ?></td>
									<td><?php echo $data['nombredelamascota']; ?></td>
									<td><?php echo $data['fechaderescate']; ?></td>
									<td><?php echo $data['edad']; ?></td>
									<td><?php echo $data['discapacidad']; ?></td>

									<td>
										<a href="ver_mascotas.php?id=<?php echo $data['idmascota']; ?>" class="btn btn-success"><i class='fas fa-eye'></i> </a>
										
										<form action="eliminar_mascotas.php?id=<?php echo $data['idmascota']; ?>" method="post" class="confirmar d-inline" onsubmit="return confirmarEliminar()">
                
								   <script>
    				                 	function confirmarEliminar() {
                                     
											return confirm('¿Estás seguro de que deseas eliminar esta mascota?'); 
                                                                                                                   }
									</script>

										<button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> </button>
										</form>
									</td>
									
								</tr>
						<?php }
						} ?>
					</tbody>

				</table>
			</div>

		</div>
	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>