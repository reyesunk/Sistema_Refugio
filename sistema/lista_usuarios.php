﻿<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Usuarios</h1>

		<a href="registro_usuario.php" class="btn btn-primary">NUEVO</a>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>NOMBRE</th>
							<th>CORREO</th>
							<th>USUARIO</th>
							<th>DIRECCIÓN</th>
							<th>ACCIONES</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT u.idusuario, u.nombre, u.correo, u.usuario, r.rol FROM usuario u INNER JOIN rol r ON u.rol = r.idrol");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td><?php echo $data['idusuario']; ?></td>
									<td><?php echo $data['nombre']; ?></td>
									<td><?php echo $data['correo']; ?></td>
									<td><?php echo $data['usuario']; ?></td>
									<td><?php echo $data['rol']; ?></td>
									
									<td>
										<a href="editar_usuario.php?id=<?php echo $data['idusuario']; ?>" href="#" class="btn btn-success float-right"><i class='fas fa-edit'></i> </a>
										<form action="eliminar_usuario.php?id=<?php echo $data['idusuario']; ?>" method="post" class="confirmar d-inline" onsubmit="return confirmarEliminar()">
											
										
										<script>
    				                 	function confirmarEliminar() {
                                     
											return confirm('¿Estás seguro de que deseas eliminar este usuario?'); 
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