<?php
include "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['tipodemascota']) || empty($_POST['nombredelamascota']) || empty($_POST['fechaderescate']) || empty($_POST['condiciones']) || empty($_POST['edad']) || empty($_POST['discapacidad']) || empty($_POST['detallesDiscapacidad'])) {
    $alert = '<p class"error">Todo los campos son requeridos</p>';
  } else {
    $idmascota = $_GET['id'];
    $tipodemascota = $_POST['tipodemascota'];
    $nombredelamascota = $_POST['nombredelamascota'];
    $fechaderescate = $_POST['fechaderescate'];
    $condiciones = $_POST['condiciones'];
    $edad = $_POST['edad'];
    $discapacidad = $_POST['discapacidad'];
    $detallesDiscapacidad = $_POST['detallesDiscapacidad'];

    $sql_update = mysqli_query($conexion, "UPDATE registromascotas SET nombredelamascota = '$nombredelamascota', tipodemascota = '$tipodemascota' , fechaderescate = '$fechaderescate', condiciones = '$condiciones', edad = $edad, discapacidad = '$discapacidad', detallesDiscapacidad = '$detallesDiscapacidad' WHERE idmascota = $idmascota");
    $alert = '<div class="alert alert-success" role="alert">Registro Actualizado</div>';

    echo '<script>
            setTimeout(function() {
              window.location.href = "lista_mascotas.php";
            }, 2000);
          </script>';
  }
}

// Mostrar Datos

if (empty($_REQUEST['id'])) {
  header("Location: lista_mascotas.php");
}
$idmascota = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM registromascotas WHERE idmascota = $idmascota");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_mascotas.php");
} else {
  if ($data = mysqli_fetch_array($sql)) {
    $idAnimal = $data['idmascota'];
    $tipodemascota = $data['tipodemascota'];
    $nombredelamascota = $data['nombredelamascota'];
    $fechaderescate = $data['fechaderescate'];
    $condiciones = $data['condiciones'];
    $edad = $data['edad'];
    $discapacidad = $data['discapacidad'];
    $detallesDiscapacidad = $data['detallesDiscapacidad'];
  }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">
      <?php echo isset($alert) ? $alert : ''; ?>
      <form class="" action="" method="post">
        <input type="hidden" name="id" value="<?php echo $idmascota; ?>">
        <div class="form-group">
          <label for="tipodemascota">Tipo de mascota:</label>
          <select name="tipodemascota" id="tipodemascota" class="form-control">
            <?php
            // Consulta SQL para obtener todos los tipos de mascotas
            $query_tipos_mascotas = "SELECT DISTINCT tipodemascota FROM registromascotas";
            $result_tipos_mascotas = mysqli_query($conexion, $query_tipos_mascotas);

            // Iterar sobre los resultados y generar las opciones del select
            while ($row = mysqli_fetch_assoc($result_tipos_mascotas)) {
              $tipo_mascota = $row['tipodemascota'];
              // Comprobar si el tipo de mascota coincide con el almacenado en la base de datos
              $selected = ($tipo_mascota == $tipodemascota) ? 'selected' : '';
              echo "<option value='$tipo_mascota' $selected>$tipo_mascota</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="nombredelamascota">Nombre de la Mascota:</label>
          <input type="text" placeholder="Ingrese nombre de la mascota" name="nombredelamascota" class="form-control" id="nombredelamascota" value="<?php echo $nombredelamascota; ?>">
        </div>
        <div class="form-group">
          <label for="fechaderescate">Fecha de Rescate:</label>
          <input type="date" placeholder="Ingrese fecha de rescate" name="fechaderescate" class="form-control" id="fechaderescate" value="<?php echo $fechaderescate; ?>">
        </div>
        <div class="form-group">
          <label for="condiciones">Condiciones de Rescate:</label>
          <input type="text" placeholder="Ingrese la condición en que fue encontrada" name="condiciones" class="form-control" id="condiciones" value="<?php echo $condiciones; ?>">
        </div>
        <div class="form-group">
          <label for="edad">Edad aproximada:</label>
          <input type="number" placeholder="Ingrese edad" name="edad" class="form-control" id="edad" value="<?php echo $edad; ?>">
        </div>
        <div class="form-group">
          <label for="discapacidad">Discapacidad:</label>
          <input type="text" placeholder="Ingrese discapacidad" name="discapacidad" class="form-control" id="discapacidad" value="<?php echo $discapacidad; ?>">
        </div>
        <div class="form-group">
          <label for="detallesDiscapacidad">Detalles de la Discapacidad:</label>
          <input type="text" placeholder="Ingrese los detalles" name="detallesDiscapacidad" class="form-control" id="detallesDiscapacidad" value="<?php echo $detallesDiscapacidad; ?>">
        </div>

        <div class="text-right">
    <input type="submit" value="Editar Mascota" class="btn btn-primary mr-4">
    <a href="lista_mascotas.php" class="btn btn-success"></i> Cancelar</a>
</div>


      </form>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>