<?php include_once "includes/header.php"; ?>

<head>
    <style>
        .bienvenida {
            font-size: 30px;
            margin-top: 20px;
            margin-bottom: 30px;
            color: #1e3c6c;
            /* Espacio superior */
        }

        .img-fluid {
            max-width: 100%;
            /* Ajustar imagen al ancho del contenedor */
            height: auto;
            /* Mantener la proporción de aspecto */
            margin-top: 20px;
            /* Espacio superior */
        }
    </style>
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>
    <link rel="icon" type="image/png" href="img/Refugio PNG.png">
    <!-- Mensaje de bienvenida con el nombre del usuario -->
    <div class="bienvenida text-center">
        <?php
        // Mostrar el nombre del usuario obtenido de la sesión
        echo "Bienvenido/a " . $_SESSION['nombre'];
        ?>
    </div>

    <!-- Contenedor para la imagen centrada -->
    <div class="row justify-content-center">
        <div class="col-6"> <!-- ajusta el tamaño de la columna según sea necesario -->
            <img src="img/Refugio PNG.png" alt="LOGO" class="img-fluid">
        </div>
    </div>

    <?php include_once "includes/footer.php"; ?>