<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">LISTA DE SOCIOS</h1>
		<a href="registro_socio.php" class="btn btn-primary">NUEVO</a>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>Tipo de Socio</th>
							<th>Nombre del Socio</th>
							<th>Fecha de Nacimiento</th>
                            <th>Dui</th>
                            <th>Edad</th>
							<th>Direccion</th>
                            <th>Telefono</th>
							<th>Correo</th>


							<th>ACCIONES</th>
							
						</tr>
					</thead>
					<tbody>
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT * FROM registrosocio");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td><?php echo $data['id_socio']; ?></td>
									<td><?php echo $data['tipodesocio']; ?></td>
									<td><?php echo $data['nombredelsocio']; ?></td>
									<td><?php echo $data['fechadenacimiento']; ?></td>
									<td><?php echo $data['dui']; ?></td>
                                    <td><?php echo $data['edad']; ?></td>
									<td><?php echo $data['direccion']; ?></td>
                                    <td><?php echo $data['telefono']; ?></td>
                                    <td><?php echo $data['correo']; ?></td>

									<td>
										<a href="ver_socio.php?id=<?php echo $data['id_socio']; ?>" class="btn btn-success"><i class='fas fa-eye'></i> </a>
										<form action="eliminar_socio.php?id=<?php echo $data['id_socio']; ?>" method="post" class="confirmar d-inline" onsubmit="return confirmarEliminar()">
											
										<script>
    				                 	function confirmarEliminar() {
                                     
											return confirm('¿Estás seguro de que deseas eliminar este socio?'); 
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

</div>

<?php include_once "includes/footer.php"; ?>