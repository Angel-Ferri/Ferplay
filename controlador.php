<?php
include 'partes/conexion.php';
session_start();

$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>
    <link rel="stylesheet" href="partes/estilo-controlador.css">
</head>
<body>
    <h1 class="titulo">Panel de control</h1>
<div class="barra">
    <a href="index.php">
        <p>
            INICIO
        </p>
    </a>
    <a href="canal.php">
        <p>
            CANALES
        </p>
    </a>
    <a href="contactos.php">
        <p>
            CONTACTOS
        </p>
    </a>
</div>
<script src="partes/parametro.js"></script>
    <div class="main">
        <?php
            include 'partes/Cargalink.php';
            include 'partes/Listalink-Elimina.php';
        ?>
    </div>
</body>
</html>