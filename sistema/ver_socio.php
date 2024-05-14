<?php
include_once "includes/header.php";
include "../conexion.php";

// Verificar si se ha pasado un ID en la URL
if (isset($_GET['id'])) {
    $id_socio = $_GET['id'];

    // Consultar los detalles del registro de mascotas con el ID proporcionado
    $query = mysqli_query($conexion, "SELECT * FROM registrosocio WHERE id_socio = $id_socio");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Detalles del registro -->
            <div class="card">
                <div class="card-header text-center" style="background-color: #858796; color: white; font-size: 18px;">
                    Detalles del Socio
                </div>
                <div class="card-body row">
                    <div class="col-lg-6">
                        <p><strong>Tipo de Socio:</strong> <?php echo $data['tipodesocio']; ?></p>
                        <p><strong>Nombre del Socio:</strong> <?php echo $data['nombredelsocio']; ?></p>
                        <p><strong>Fecha de Nacimiento:</strong> <?php echo $data['fechadenacimiento']; ?></p>
                        <p><strong>DUI:</strong> <?php echo $data['dui']; ?></p>
                        <p><strong>Edad:</strong> <?php echo $data['edad']; ?></p>
                        <p><strong>Direccion:</strong> <?php echo $data['direccion']; ?></p>
                        <p><strong>Telefono:</strong> <?php echo $data['telefono']; ?></p>
                        <p><strong>Correo:</strong> <?php echo $data['correo']; ?></p>
                    </div>

                    <div class="col-lg-6 d-none d-lg-block bg-login-image">
                        <img src="img/Refugio PNG.png" class="img-thumbnail border-0">
                    </div>
                </div>
                <div class="text-center">
                <a href="lista_socio.php" class="btn btn-success"><i class='fas fa-arrow-left'></i> Regresar</a>
                    <?php
                    // Verificar el rol del usuario
                    if ($_SESSION['rol_name'] === 'Administrador') {
                        // Mostrar el enlace de editar solo si el usuario es Administrador
                    ?>
                        <a href="editar_socio.php?id=<?php echo $data['id_socio']; ?>" class="btn btn-success"><i class='fas fa-edit'></i> Editar Registro</a>
                    <?php
                    }
                    ?>





                </div><br>
            </div>

        </div>
        <!-- /.container-fluid -->

<?php
    } else {
        // Si no se encuentra el registro con el ID proporcionado, mostrar un mensaje de error
        echo "<div class='container-fluid'><p class='text-danger'>Registro no encontrado.</p></div>";
    }
} else {
    // Si no se ha proporcionado un ID en la URL, redirigir a la lista de mascotas
    header("Location: lista_socio.php");
}

include_once "includes/footer.php";
?>