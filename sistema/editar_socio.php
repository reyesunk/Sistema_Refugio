<?php
include "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['tipodesocio']) || empty($_POST['nombredelsocio']) || empty($_POST['fechadenacimiento']) || empty($_POST['dui']) || empty($_POST['edad']) || empty($_POST['direccion']) || empty($_POST['telefono']) || empty($_POST['correo'])) {
    $alert = '<p class"error">Todo los campos son requeridos</p>';
  } else {
    $id_socio = $_GET['id'];
    $tipodesocio = $_POST['tipodesocio'];
    $nombredelsocio = $_POST['nombredelsocio'];
    $fechadenacimiento = $_POST['fechadenacimiento'];
    $dui = $_POST['dui'];
    $edad = $_POST['edad'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];


    $sql_update = mysqli_query($conexion, "UPDATE registrosocio SET nombredelsocio = '$nombredelsocio', tipodesocio = '$tipodesocio' , fechadenacimiento = '$fechadenacimiento', dui = '$dui', edad = $edad, direccion = '$direccion', telefono = '$telefono', correo = '$correo' WHERE id_socio = $id_socio");
    $alert = '<div class="alert alert-success" role="alert">Registro Actualizado</div>';

    echo '<script>
            setTimeout(function() {
              window.location.href = "lista_socio.php";
            }, 2000);
          </script>';
  }
}

// Mostrar Datos

if (empty($_REQUEST['id'])) {
  header("Location: lista_socio.php");
}
$id_socio = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM registrosocio WHERE id_socio = $id_socio");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_socio.php");
} else {
  if ($data = mysqli_fetch_array($sql)) {
    $id_socio = $data['id_socio'];
    $tipodesocio = $data['tipodesocio'];
    $nombredelsocio = $data['nombredelsocio'];
    $fechadenacimiento = $data['fechadenacimiento'];
    $dui = $data['dui'];
    $edad = $data['edad'];
    $direccion = $data['direccion'];
    $telefono = $data['telefono'];
    $correo = $data['correo'];
  }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">
      <?php echo isset($alert) ? $alert : ''; ?>
      <form class="" action="" method="post">
        <input type="hidden" name="id" value="<?php echo $id_socio; ?>">
        <div class="form-group">
          <label for="tipodesocio">Tipo de socio:</label>
          <select name="tipodesocio" id="tipodesocio" class="form-control">
            <?php
            // Consulta SQL para obtener todos los tipos de mascotas
            $query_tipos_socio = "SELECT DISTINCT tipodesocio FROM registrosocio";
            $result_tipos_socio = mysqli_query($conexion, $query_tipos_socio);

            // Iterar sobre los resultados y generar las opciones del select
            while ($row = mysqli_fetch_assoc($result_tipos_socio)) {
              $tipo_socio = $row['tipodesocio'];
              // Comprobar si el tipo de socio coincide con el almacenado en la base de datos
              $selected = ($tipo_socio == $tipodesocio) ? 'selected' : '';
              echo "<option value='$tipo_socio' $selected>$tipo_socio</option>";
            }
            ?>
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
    <input type="submit" value="Editar Socio" class="btn btn-primary mr-4">
    <a href="lista_socio.php" class="btn btn-success"></i> Cancelar</a>
</div>


      </form>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>