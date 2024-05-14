<?php
// Suponiendo que ya tienes iniciada la sesión
function mostrarElementoMenu($rol_permisible, $rol_usuario_actual)
{
	if ($rol_usuario_actual === $rol_permisible) {
		echo 'style="display: block;"';
	} else {
		echo 'style="display: none;"';
	}
}
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
		<div class="sidebar-brand-icon rotate-n-15">
			<img src="img/Refugio PNG.png" class="img-thumbnail">
		</div>
		<div class="sidebar-brand-text mx-3">HUELLITAS URBANAS</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		MENU HUELLITAS URBANAS
	</div>


	<!-- Nav Item - Utilities Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMascota" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-paw"></i> <!-- Icono añadido -->
			<span>REGISTRO DE MASCOTAS</span>
		</a>
		<div id="collapseMascota" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="registro_mascotas.php" <?php mostrarElementoMenu('Administrador', $_SESSION['rol_name']); ?>>NUEVA MASCOTA</a>
				<a class="collapse-item" href="lista_mascotas.php">LISTA DE MASCOTAS</a>
			</div>
		</div>
	</li>



	<!-- Nav Item - Usuarios Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuarios" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-user-plus"></i> <!-- Icono añadido -->
			<span>REGISTRO DE USUARIOS</span>
		</a>
		<div id="collapseUsuarios" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="registro_usuario.php" <?php mostrarElementoMenu('Administrador', $_SESSION['rol_name']); ?>>NUEVO USUARIO</a>
				<a class="collapse-item" href="lista_usuarios.php">LISTA DE USUARIOS</a>
			</div>
		</div>
	</li>


	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSocio" aria-expanded="true" aria-controls="collapseUtilities">
		    <i class="fas fa-user-plus"></i>
			<span>REGISTRO DE SOCIOS</span>
		</a>
		<div id="collapseSocio" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="registro_socio.php" <?php mostrarElementoMenu('Administrador', $_SESSION['rol_name']); ?>>NUEVO SOCIO</a>
				<a class="collapse-item" href="lista_socio.php">LISTA DE SOCIOS</a>
			</div>
		</div>
	</li>

</ul>