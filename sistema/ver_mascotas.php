<?php
include_once "includes/header.php";
include "../conexion.php";

// Verificar si se ha pasado un ID en la URL
if (isset($_GET['id'])) {
    $idmascota = $_GET['id'];

    // Consultar los detalles del registro de mascotas con el ID proporcionado
    $query = mysqli_query($conexion, "SELECT * FROM registromascotas WHERE idmascota = $idmascota");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        // Mostrar los detalles del registro
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Detalles del registro -->
            <div class="card">
                <div class="card-header text-center" style="background-color: #858796; color: white; font-size: 18px;">
                    Detalles de la Mascota
                </div>
                <div class="card-body row">
                    <div class="col-lg-6">
                        <p><strong>Tipo de Mascota:</strong> <?php echo $data['tipodemascota']; ?></p>
                        <p><strong>Nombre:</strong> <?php echo $data['nombredelamascota']; ?></p>
                        <p><strong>Fecha de Rescate:</strong> <?php echo $data['fechaderescate']; ?></p>
                        <p><strong>Condiciones en que fue encontrado/a:</strong> <?php echo $data['condiciones']; ?></p>
                        <p><strong>Edad aproximada:</strong> <?php echo $data['edad']; ?></p>
                        <p><strong>Discapacidad:</strong> <?php echo $data['discapacidad']; ?></p>
                        <p><strong>Detalles de la discapacidad:</strong> <?php echo $data['detallesDiscapacidad']; ?></p>
                    </div>

                    <div class="col-lg-6 d-none d-lg-block bg-login-image">
                        <img src="img/logo.jpg" class="img-thumbnail border-0">
                    </div>
                </div>
                <div class="text-center">
                    <a href="lista_mascotas.php" class="btn btn-success"><i class='fas fa-arrow-left'></i> Regresar</a>
                    <?php
                    // Verificar el rol del usuario
                    if ($_SESSION['rol_name'] === 'Administrador') {
                        // Mostrar el enlace de editar solo si el usuario es Administrador
                    ?>
                        <a href="editar_mascotas.php?id=<?php echo $data['idmascota']; ?>" class="btn btn-success"><i class='fas fa-edit'></i> Editar Registro</a>
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
    header("Location: lista_mascotas.php");
}

include_once "includes/footer.php";
?>