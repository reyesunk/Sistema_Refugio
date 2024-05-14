<?php
include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['tipodesocio']) || empty($_POST['nombredelsocio']) || empty($_POST['fechadenacimiento']) || empty($_POST['dui']) || empty($_POST['edad']) || empty($_POST['direccion']) || empty($_POST['telefono']) || empty($_POST['correo'])) {
        $alert = '<div id="alertMsg" class="alert alert-danger" role="alert">Todo los campos son obligatorios</div>';
    } else {
        $tipodesocio = $_POST['tipodesocio'];
        $nombredelsocio = $_POST['nombredelsocio'];
        $fechadenacimiento = $_POST['fechadenacimiento'];
        $dui = $_POST['dui'];
        $edad = $_POST['edad'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $usuario_id = $_SESSION['idUser'];
        $query = mysqli_query($conexion, "SELECT * FROM registrosocio where nombredelsocio = '$nombredelsocio'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">El socio ya esta registrado</div>';
        } else {


            $query_insert = mysqli_query($conexion, "INSERT INTO registrosocio(tipodesocio,nombredelsocio,fechadenacimiento,dui,edad,direccion,telefono,correo) values ('$tipodesocio', '$nombredelsocio', '$fechadenacimiento', '$dui', '$edad', '$direccion', '$telefono', '$correo')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">Socio Registrado</div>';
                echo '<script>
                    setTimeout(function() {
                      window.location.href = "lista_socio.php";
                    }, 1500);
                  </script>';
            } else {
                $alert = '<div class="alert alert-danger" role="alert">Error al registrar socio</div>';
            }
        }
    }
}
mysqli_close($conexion);
?>

<!-- ------------------------------------------------------------------------------------------------------>


<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card-header bg-primary text-white">
                REGISTRO DE SOCIOS
            </div>
            <hr>
            <i class="fas fa-user-plus fa-3x d-block mx-auto"></i>
            <hr>

            <div class="card">
                <form action="" autocomplete="off" method="post" class="card-body p-2">
                    <?php echo isset($alert) ? $alert : ''; ?>
                    <div class="form-group">
                        <label for="tipodesocio">Tipo de Socio:</label>
                        <select name="tipodesocio" id="tipodesocio" class="form-control">
                            <option value="">Selecciona el tipo de socio</option>
                            <option value="Socio Donante">Socio Donante</option>
                            <option value="Socio Adoptante">Socio Adoptante</option>
                           
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nombredelsocio">Nombre Completo:</label>
                        <input type="text" placeholder="Ingrese Nombre del socio" name="nombredelsocio" id="nombredelsocio" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="fechadenacimiento">Fecha de Nacimiento:</label>
                        <input type="date" placeholder="Ingrese Fecha de nacimiento" name="fechadenacimiento" id="fechadenacimiento" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="dui">DUI:</label>
                        <input type="number" placeholder="Ingrese el numero de DUI" name="dui" id="dui" class="form-control">
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="edad">Edad:</label>
                        <input type="number" placeholder="Ingrese Edad" name="edad" id="edad" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="direcion">Direccion:</label>
                        <input type="text" placeholder="Ingrese Direccion" name="direccion" id="direccion" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="telefono">Telefono:</label>
                        <input type="number" placeholder="Ingrese el numero de telefono" name="telefono" id="telefono" class="form-control">
                    </div>
          
                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input type="text" placeholder="Ingrese el correo" name="correo" id="correo" class="form-control">
                    </div>

                    <div class="text-right">
                        <input type="submit" value="Guardar" class="btn btn-primary m-3">
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