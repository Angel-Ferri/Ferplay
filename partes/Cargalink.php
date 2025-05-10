<div class="formulario-carga">
    <form method="post" enctype="multipart/form-data">
        <h2>Registra tu link</h2>
        <label>Nombre del link <input type="text" name="nombrelink"></label>
        <br><label>Link <input type="text" name="enlacelink"></label>
        <br><label>Cargar Icono/imagen <input type="file" name="iconolink"></label>
        <br><input type="submit" value="Registra el link" name="registro">
    </form>

    <?php
    if (isset($_POST['registro'])) {
        $nombre = $_POST['nombrelink'];
        $enlace = $_POST['enlacelink'];
        $icono = $_FILES['iconolink'];
        
        $ruta_destino = 'uploads/' . basename($icono['name']);

        if (move_uploaded_file($icono['tmp_name'], $ruta_destino)) {
            $conexion->query("INSERT INTO `recopilacion` (`id`, `email`, `link`, `nombre`, `icono`) 
                              VALUES (NULL, '$email', '$enlace', '$nombre', '$ruta_destino')");

            echo '<script>alert("Se logró guardar")</script>';
        } else {
            echo '<script>alert("Error al subir el archivo")</script>';
        }
    }
    ?>
</div>
