<?php
include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['tipodemascota']) || empty($_POST['nombredelamascota']) || empty($_POST['fechaderescate']) || empty($_POST['condiciones']) || empty($_POST['edad']) || empty($_POST['discapacidad']) || empty($_POST['detallesDiscapacidad'])) {
        $alert = '<div id="alertMsg" class="alert alert-danger" role="alert">Todo los campos son obligatorios</div>';
    } else {
        $tipodemascota = $_POST['tipodemascota'];
        $nombredelamascota = $_POST['nombredelamascota'];
        $fechaderescate = $_POST['fechaderescate'];
        $condiciones = $_POST['condiciones'];
        $edad = $_POST['edad'];
        $discapacidad = $_POST['discapacidad'];
        $detallesDiscapacidad = $_POST['detallesDiscapacidad'];
        $usuario_id = $_SESSION['idUser'];
        $query = mysqli_query($conexion, "SELECT * FROM registromascotas where nombredelamascota = '$nombredelamascota'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">La mascota ya esta registrada</div>';
        } else {


            $query_insert = mysqli_query($conexion, "INSERT INTO registromascotas(tipodemascota,nombredelamascota,fechaderescate,condiciones,edad,discapacidad,detallesDiscapacidad) values ('$tipodemascota', '$nombredelamascota', '$fechaderescate', '$condiciones','$edad', '$discapacidad', '$detallesDiscapacidad')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">Mascota Registrada</div>';
                echo '<script>
                    setTimeout(function() {
                      window.location.href = "lista_mascotas.php";
                    }, 1500);
                  </script>';
            } else {
                $alert = '<div class="alert alert-danger" role="alert">Error al registrar mascota</div>';
            }
        }
    }
}
mysqli_close($conexion);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card-header bg-primary text-white">
                REGISTRO DE MASCOTAS
            </div>
            <hr>
            <i class="fas fa-paw fa-3x d-block mx-auto"></i>
            <hr>


            <div class="card">
                <form action="" autocomplete="off" method="post" class="card-body p-2">
                    <?php echo isset($alert) ? $alert : ''; ?>
                    <div class="form-group">
                        <label for="tipodemascota">Tipo de Mascota:</label>
                        <select name="tipodemascota" id="tipodemascota" class="form-control">
                            <option value="">Selecciona el tipo de mascota</option>
                            <option value="Perro">Perro</option>
                            <option value="Gato">Gato</option>
                            <!-- Agrega más opciones según sea necesario -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nombredelamascota">Nombre de la Mascota:</label>
                        <input type="text" placeholder="Ingrese Nombre de mascota" name="nombredelamascota" id="nombredelamascota" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="fechaderescate">Fecha de Rescate:</label>
                        <input type="date" placeholder="Ingrese Fecha de rescate" name="fechaderescate" id="fechaderescate" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="condiciones">Condiciones de Rescate:</label>
                        <input type="text" placeholder="Ingrese las condiciones en que fue encontrado/a" name="condiciones" id="condiciones" class="form-control">
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="edad">Edad Aproximada:</label>
                        <input type="number" placeholder="Ingrese Edad" name="edad" id="edad" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="discapacidad">Discapacidad:</label>
                        <input type="text" placeholder="Ingrese Discapacidad" name="discapacidad" id="discapacidad" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="detallesDiscapacidad">Detalles de la Discapacidad:</label>
                        <input type="text" placeholder="Ingrese los detalles de la discapacidad" name="detallesDiscapacidad" id="detallesDiscapacidad" class="form-control">
                    </div>

<hr>

                    <div class="text-right">
                        <input type="submit" value="Guardar Mascota" class="btn btn-primary m-3">
                        <a href="index.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
    setTimeout(function() {
        document.getElementById('alertMsg').style.display = 'none';
    }, 3000);
</script>
<?php include_once "includes/footer.php"; ?>